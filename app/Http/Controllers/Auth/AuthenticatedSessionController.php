<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
        $request->authenticate();

        $request->session()->regenerate();

        $notification = [
            'message' => 'Login Successfully',
            'alert-type' => 'success'
        ];

        $url = $request->user()->role === 'admin' ? 'admin/dashboard' : '/dashboard';
        return redirect()->intended($url)->with($notification);
    }

    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google and log in or register the user.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            // Retrieve user details from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Find or create a new user based on the Google ID
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('dummy_password') // A dummy password since this is Google login
                ]
            );

            // Log in the user
            Auth::login($user);
            session()->regenerate();

            $notification = [
                'message' => 'Logged in successfully with Google',
                'alert-type' => 'success'
            ];

            $url = $user->role === 'admin' ? 'admin/dashboard' : '/dashboard';
            return redirect()->intended($url)->with($notification);

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Unable to login with Google. Please try again.');
        }
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
