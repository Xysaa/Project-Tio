<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Add debugging
        \Log::info('Login attempt', [
            'email' => $credentials['email'],
            // Don't log passwords!
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            \Log::info('Login successful', [
                'email' => $credentials['email']
            ]);

            return redirect()->intended('dashboard');
        }

        \Log::warning('Login failed', [
            'email' => $credentials['email']
        ]);

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function dashboard()
    {
        // Ensure only authenticated users can access
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('dashboard');
    }
}