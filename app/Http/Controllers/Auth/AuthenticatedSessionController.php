<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $email = $request->email;
        $password = $request->password;

        // Cek apakah email terdaftar
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar.',
            ]);
        }

        // Attempt login
        if (!Auth::attempt(['email' => $email, 'password' => $password], $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'password' => 'Kata sandi salah.',
            ]);
        }

        $request->session()->regenerate();

        // Redirect based on user role
        if (Auth::user()->role === 'admin') {
            return redirect()->intended('admin/dashboard');
        } else if (Auth::user()->role === 'user') {
            return redirect()->intended('user/dashboard');
        }

        // Fallback redirect
        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
