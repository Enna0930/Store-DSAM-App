<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\QuoteRequest;
use App\Models\QuotePricing;
use App\Models\QuotePricingTier;
use App\Models\DisapprovedAccount;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;
use App\Notifications\ClientAccessConfirmation;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin-login');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'string', 'max:100'],
            'department' => ['required', 'string', 'max:120'],
            'designation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:10', 'confirmed'],
        ]);

        try {
            $user = DB::transaction(function () use ($data) {
                $user = User::create([
                    'name' => $data['full_name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'account_type' => 'admin',
                    'department' => $data['department'],
                    'role_level' => 'staff',
                    'is_approved' => false,
                ]);

                $user->adminProfile()->create([
                    'employee_id' => $data['employee_id'],
                    'job_title' => $data['designation'],
                ]);

                return $user;
            });
        } catch (QueryException $exception) {
            report($exception);

            return response()->json([
                'message' => 'The registration could not be saved. The email or employee ID may already be registered, or the database may be unavailable.',
            ], 422);
        }

        return response()->json([
            'message' => 'Registration submitted for Sonny Mata\'s executive approval.',
            'reference' => 'DSAM-DEPT-' . now()->format('Ymd') . '-' . str_pad((string) $user->id, 3, '0', STR_PAD_LEFT),
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'department' => ['required', 'string', 'max:120'],
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        try {
            $user = User::where(function ($query) use ($credentials) {
                    $query->where('username', $credentials['login'])
                        ->orWhere('email', $credentials['login']);
                })
                ->where('account_type', 'admin')
                ->where('department', $credentials['department'])
                ->first();

            if (! $user || ! $user->is_approved) {
            return back()->withInput($request->only('login', 'department'))
                ->withErrors(['login' => 'This department account is not approved for terminal access.']);
            }

            $loginField = $user->username === $credentials['login'] ? 'username' : 'email';

            if (! Auth::attempt([
                $loginField => $credentials['login'],
                'password' => $credentials['password'],
                'account_type' => 'admin',
                'department' => $credentials['department'],
            ], $request->boolean('remember'))) {
                return back()->withInput($request->only('login', 'department'))
                    ->withErrors(['login' => 'The department credentials are incorrect.']);
            }
        } catch (QueryException $exception) {
            report($exception);

            return back()->withInput($request->only('login', 'department'))
                ->withErrors(['login' => 'The admin database is unavailable. Please start MySQL or check your database settings.']);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function dashboard()
    {
        abort_unless(auth()->user()?->account_type === 'admin', 403);

        $user = auth()->user()->load('adminProfile');
        $pendingAccounts = $user->username === 'sonnymata' || $user->role_level === 'executive'
            ? User::where('is_approved', false)->where('id', '!=', $user->id)->latest()->get()
            : collect();

        $quoteDepartments = [
            'General Management / Executive',
            'Production Staff & Operations',
            'Estimations & Quotation',
            'Production Head / Plant Oversight',
        ];
        $canViewQuotes = $user->role_level === 'executive' || in_array($user->department, $quoteDepartments, true);
        $quoteRequests = $canViewQuotes
            ? QuoteRequest::with(['pricing', 'pricingTiers', 'items.pricing', 'items.pricingTiers'])
                ->where('status', '!=', 'approved')
                ->latest()
                ->limit(50)
                ->get()
            : collect();

        return view('admin-dashboard', compact('user', 'pendingAccounts', 'quoteRequests', 'canViewQuotes'));
    }

    public function quotationReport(Request $request)
    {
        $user = $request->user();
        $quoteDepartments = [
            'General Management / Executive',
            'Production Staff & Operations',
            'Estimations & Quotation',
            'Production Head / Plant Oversight',
        ];

        abort_unless(
            $user?->account_type === 'admin'
                && ($user->role_level === 'executive' || in_array($user->department, $quoteDepartments, true)),
            403
        );

        $period = $request->string('period')->toString();
        $period = in_array($period, ['daily', 'weekly', 'monthly'], true) ? $period : 'daily';
        $now = Carbon::now();
        [$from, $to] = match ($period) {
            'weekly' => [$now->copy()->startOfWeek(), $now->copy()->endOfWeek()],
            'monthly' => [$now->copy()->startOfMonth(), $now->copy()->endOfMonth()],
            default => [$now->copy()->startOfDay(), $now->copy()->endOfDay()],
        };

        $quotes = QuoteRequest::with(['pricing', 'pricingTiers', 'items.pricing', 'items.pricingTiers'])
            ->whereBetween('approved_at', [$from, $to])
            ->where('status', 'approved')
            ->latest()
            ->get();

        $quoteValue = fn ($quote) => $quote->pricing
            ? (float) $quote->pricing->total_estimate
            : $quote->items->sum(fn ($item) => (float) ($item->pricing?->total_estimate ?? 0));
        $quoteQuantity = fn ($quote) => $quote->pricing
            ? (int) $quote->pricing->quantity
            : $quote->items->sum(fn ($item) => (int) ($item->pricing?->quantity ?? 0));
        $totalValue = $quotes->sum($quoteValue);
        $totalQuantity = $quotes->sum($quoteQuantity);
        $dailySummary = $quotes->groupBy(fn ($quote) => $quote->approved_at->format('Y-m-d'))
            ->map(fn ($items, $date) => [
                'date' => $date,
                'count' => $items->count(),
                'value' => $items->sum($quoteValue),
            ])->values();

        return view('admin-quotation-report', compact(
            'user', 'period', 'from', 'to', 'quotes', 'totalValue', 'totalQuantity', 'dailySummary'
        ));
    }

    public function savePricing(Request $request, QuoteRequest $quoteRequest)
    {
        $user = $request->user();
        $allowedDepartments = [
            'General Management / Executive',
            'Estimations & Quotation',
            'Production Staff & Operations',
            'Production Head / Plant Oversight',
        ];

        abort_unless(
            $user?->account_type === 'admin'
                && ($user->role_level === 'executive' || in_array($user->department, $allowedDepartments, true)),
            403
        );

        $data = $request->validate([
            'item_id' => ['nullable', 'integer', 'exists:quote_request_items,id'],
            'quantity_1' => ['required', 'integer', 'min:1', 'max:1000000000'],
            'quantity_2' => ['required', 'integer', 'min:1', 'max:1000000000'],
            'quantity_3' => ['required', 'integer', 'min:1', 'max:1000000000'],
            'discount_1' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount_2' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount_3' => ['required', 'numeric', 'min:0', 'max:100'],
            'material_cost' => ['required', 'numeric', 'min:0'],
            'printing_cost' => ['required', 'numeric', 'min:0'],
            'tooling_cost' => ['required', 'numeric', 'min:0'],
            'labor_cost' => ['required', 'numeric', 'min:0'],
            'delivery_cost' => ['required', 'numeric', 'min:0'],
            'overhead_cost' => ['required', 'numeric', 'min:0'],
            'electricity_cost' => ['required', 'numeric', 'min:0'],
            'waste_cost' => ['required', 'numeric', 'min:0'],
            'markup_percent' => ['required', 'numeric', 'min:0', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        if ($data['quantity_2'] <= $data['quantity_1'] || $data['quantity_3'] <= $data['quantity_2']) {
            return back()->withInput()->withErrors(['quantity_2' => 'Enter three increasing quantity tiers.']);
        }

        $item = null;
        if (!empty($data['item_id'])) {
            $item = $quoteRequest->items()->findOrFail($data['item_id']);
        }

        $unitSubtotal = collect($data)->only([
            'material_cost', 'printing_cost', 'tooling_cost', 'labor_cost', 'delivery_cost', 'overhead_cost', 'electricity_cost', 'waste_cost',
        ])->sum();
        $markupAmount = round($unitSubtotal * ((float) $data['markup_percent'] / 100), 2);
        $unitTotal = round($unitSubtotal + $markupAmount, 2);
        $tiers = collect([1, 2, 3])->map(function (int $tier) use ($data, $unitTotal) {
            $quantity = (int) $data["quantity_{$tier}"];
            $discount = (float) $data["discount_{$tier}"];
            $unitPrice = round($unitTotal * (1 - ($discount / 100)), 2);

            return [
                'tier_number' => $tier,
                'quantity' => $quantity,
                'discount_percent' => $discount,
                'unit_price' => $unitPrice,
                'total_price' => round($unitPrice * $quantity, 2),
            ];
        });
        $totalEstimate = $tiers->first()['total_price'];
        $baseData = collect($data)->only([
            'material_cost', 'printing_cost', 'tooling_cost', 'labor_cost', 'delivery_cost', 'overhead_cost',
            'electricity_cost', 'waste_cost', 'markup_percent', 'notes',
        ])->all();

        $pricing = QuotePricing::updateOrCreate(
            $item
                ? ['quote_request_id' => $quoteRequest->id, 'quote_request_item_id' => $item->id]
                : ['quote_request_id' => $quoteRequest->id, 'quote_request_item_id' => null],
            array_merge($baseData, [
                'reference' => $quoteRequest->reference,
                'quote_request_item_id' => $item?->id,
                'quantity' => $data['quantity_1'],
                'subtotal' => $unitSubtotal,
                'markup_amount' => $markupAmount,
                'total_estimate' => $totalEstimate,
                'currency' => 'PHP',
                'calculated_by' => $user->id,
            ])
        );

        if ($item) {
            $item->pricingTiers()->delete();
            $item->pricingTiers()->createMany(collect($tiers)->map(fn ($tier) => array_merge($tier, [
                'quote_request_id' => $quoteRequest->id,
                'quote_request_item_id' => $item->id,
            ]))->all());
        } else {
            $quoteRequest->pricingTiers()->whereNull('quote_request_item_id')->delete();
            $quoteRequest->pricingTiers()->createMany($tiers->all());
        }

        $allItemsPriced = $quoteRequest->items()->count() <= 1
            ? true
            : $quoteRequest->items()->with('pricing')->whereDoesntHave('pricing')->doesntExist();
        if ($allItemsPriced) {
            $quoteRequest->update(['status' => 'priced']);
        }

        $label = $item ? 'Item ' . $item->item_number : $quoteRequest->reference;
        return back()->with('status', "Pricing saved for {$label}: PHP " . number_format($totalEstimate, 2));
    }

    public function approveQuotation(Request $request, QuoteRequest $quoteRequest)
    {
        abort_unless(
            $request->user()?->username === 'sonnymata' || $request->user()?->role_level === 'executive',
            403
        );

        $items = $quoteRequest->items()->with(['pricing', 'pricingTiers'])->get();
        $complete = $items->count() > 1
            ? $items->every(fn ($item) => $item->pricing && $item->pricingTiers->count() === 3)
            : $quoteRequest->pricing && $quoteRequest->pricingTiers()->whereNull('quote_request_item_id')->count() === 3;
        abort_unless($complete, 422, 'Complete the three pricing tiers for every specification before approval.');

        $quoteRequest->forceFill([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => $request->user()->id,
        ])->save();

        return back()->with('status', "Quotation {$quoteRequest->reference} was approved and added to Summary Reports.");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function approve(User $user)
    {
        abort_unless(auth()->user()?->username === 'sonnymata' || auth()->user()?->role_level === 'executive', 403);

        $user->forceFill([
            'is_approved' => true,
            'approved_at' => now(),
        ])->save();

        Notification::route('mail', $user->email)->notify(new ClientAccessConfirmation());

        return back()->with('status', $user->name . ' has been approved.');
    }

    public function disapprove(Request $request, User $user)
    {
        abort_unless(auth()->user()?->username === 'sonnymata' || auth()->user()?->role_level === 'executive', 403);

        abort_if($user->is_approved, 422, 'Approved accounts cannot be disapproved from the pending queue.');

        $data = $request->validate([
            'reason' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::transaction(function () use ($user, $data) {
            DisapprovedAccount::create([
                'original_user_id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'account_type' => $user->account_type,
                'department' => $user->department,
                'role_level' => $user->role_level,
                'reason' => $data['reason'] ?? null,
                'disapproved_by' => auth()->id(),
                'disapproved_at' => now(),
            ]);

            $user->delete();
        });

        return back()->with('status', $user->name . ' has been disapproved and recorded.');
    }
}
