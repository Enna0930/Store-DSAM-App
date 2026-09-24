<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClientAccessConfirmation;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            $user = \App\Models\User::where('email', $credentials['email'])->first();

            if ($user && ! $user->is_approved) {
                return back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => 'Your account is awaiting executive approval.']);
            }

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                Notification::route('mail', $user->email)->notify(new ClientAccessConfirmation());

                return redirect()->intended(route('client.dashboard'));
            }
        } catch (QueryException $exception) {
            report($exception);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'The account database is unavailable. Please start MySQL or check your database settings.']);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    public function register(Request $request)
    {
        if ($request->has('pkg_types') && ! $request->has('pkg_types.0')) {
            $request->merge(['pkg_types' => [$request->input('pkg_types')]]);
        }

        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_person' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'tax_number' => ['required', 'string', 'max:100'],
            'monthly_volume' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pkg_types' => ['nullable', 'array'],
        ]);

        try {
            if (\App\Models\User::where('email', $data['email'])->exists()) {
                return back()->withInput()->withErrors([
                    'registration' => 'An account already exists for this email address.',
                ]);
            }

            DB::transaction(function () use ($data) {
                $user = \App\Models\User::create([
                    'name' => $data['contact_person'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'account_type' => 'client',
                    'role_level' => 'client',
                    'is_approved' => false,
                ]);

                $user->clientProfile()->create([
                    'company_name' => $data['company_name'],
                    'contact_person' => $data['contact_person'],
                    'phone' => $data['phone'],
                    'tax_number' => $data['tax_number'],
                    'monthly_volume' => $data['monthly_volume'],
                    'preferred_packaging' => $data['pkg_types'] ?? [],
                ]);
            });
        } catch (QueryException $exception) {
            report($exception);

            return back()->withInput()->withErrors([
                'registration' => 'The account database is unavailable. Please start MySQL or check your database settings.',
            ]);
        }

        return redirect()->route('login')->with('registration_status', 'Your registration was submitted for executive approval. You will receive an email when you can log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
