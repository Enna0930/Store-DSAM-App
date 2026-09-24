<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Services\QuoteRequestPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'clientName' => ['required', 'string', 'max:255'],
            'clientEmail' => ['required', 'email', 'max:255'],
            'clientPhone' => ['required', 'string', 'max:50'],
            'clientAddress' => ['nullable', 'string', 'max:255'],
            'items' => ['required', 'array', 'min:1', 'max:10'],
            'items.*.productCategory' => ['required', 'string', 'max:255'],
            'items.*.materialType' => ['nullable', 'string', 'max:255'],
            'items.*.targetQuantity' => ['nullable', 'string', 'max:255'],
            'items.*.dimensionsSize' => ['nullable', 'string', 'max:255'],
            'items.*.thicknessGauge' => ['nullable', 'string', 'max:255'],
            'items.*.printType' => ['nullable', 'string', 'max:100'],
            'items.*.otherNotes' => ['nullable', 'string', 'max:5000'],
            'sampleFile' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:25600'],
        ]);

        [$reference, $quote] = DB::transaction(function () use ($data, $request) {
            $items = array_values($data['items']);
            $firstItem = $items[0];
            $date = now()->format('Ymd');
            $prefix = "DSAM-{$date}-";
            $nextNumber = QuoteRequest::where('reference', 'like', "{$prefix}%")
                ->lockForUpdate()
                ->count() + 1;
            $reference = $prefix . str_pad((string) $nextNumber, 3, '0', STR_PAD_LEFT);

            $quote = QuoteRequest::create([
                'reference' => $reference,
                'user_id' => auth()->id(),
                'client_name' => $data['clientName'],
                'client_email' => $data['clientEmail'],
                'client_phone' => $data['clientPhone'],
                'client_address' => $data['clientAddress'] ?? null,
                'product_category' => $firstItem['productCategory'],
                'material_type' => $firstItem['materialType'] ?? null,
                'target_quantity' => $firstItem['targetQuantity'] ?? null,
                'dimensions_size' => $firstItem['dimensionsSize'] ?? null,
                'thickness_gauge' => $firstItem['thicknessGauge'] ?? null,
                'print_type' => $firstItem['printType'] ?? null,
                'other_notes' => $firstItem['otherNotes'] ?? null,
                'sample_file_path' => $request->hasFile('sampleFile')
                    ? $request->file('sampleFile')->store('quote-samples')
                    : null,
                'status' => 'submitted',
            ]);

            foreach ($items as $index => $item) {
                $quote->items()->create([
                    'item_number' => $index + 1,
                    'product_category' => $item['productCategory'],
                    'material_type' => $item['materialType'] ?? null,
                    'target_quantity' => $item['targetQuantity'] ?? null,
                    'dimensions_size' => $item['dimensionsSize'] ?? null,
                    'thickness_gauge' => $item['thicknessGauge'] ?? null,
                    'print_type' => $item['printType'] ?? null,
                    'other_notes' => $item['otherNotes'] ?? null,
                ]);
            }

            return [$reference, $quote];
        });

        return redirect()->route('request-a-quote')->with(
            'quote_status',
            "Quotation request {$reference} was submitted successfully and routed to the DSAM quotation and production teams."
        );
    }

    public function downloadPdf(QuoteRequest $quoteRequest, QuoteRequestPdf $pdf)
    {
        $quoteRequest->load(['pricingTiers', 'pricing', 'items.pricing', 'items.pricingTiers']);
        $user = auth()->user();
        $allowedDepartments = [
            'General Management / Executive',
            'Production Staff & Operations',
            'Estimations & Quotation',
            'Production Head / Plant Oversight',
        ];

        abort_unless(
            $user?->account_type === 'admin'
                && ($user->role_level === 'executive' || in_array($user->department, $allowedDepartments, true)),
            403
        );

        return response($pdf->render($quoteRequest), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $quoteRequest->reference . '.pdf"',
            'Cache-Control' => 'private, max-age=0, must-revalidate',
        ]);
    }

    public function sample(QuoteRequest $quoteRequest)
    {
        $user = auth()->user();
        $allowedDepartments = [
            'General Management / Executive',
            'Production Staff & Operations',
            'Estimations & Quotation',
            'Production Head / Plant Oversight',
        ];

        abort_unless(
            $user?->account_type === 'admin'
                && ($user->role_level === 'executive' || in_array($user->department, $allowedDepartments, true)),
            403
        );

        abort_unless($quoteRequest->sample_file_path && Storage::disk('local')->exists($quoteRequest->sample_file_path), 404);

        return response()->file(Storage::disk('local')->path($quoteRequest->sample_file_path));
    }
}
