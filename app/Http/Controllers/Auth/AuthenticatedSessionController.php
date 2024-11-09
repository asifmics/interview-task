<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $request->validate([
            'emailOrUsername' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $emailUsername = filter_var($request->input('emailOrUsername'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Attempt login using either 'email' or 'username' with the provided password
        if (Auth::attempt([$emailUsername => $request->input('emailOrUsername'), 'password' => $request->input('password')])) {
            session()->flash('success', 'User login successfully!');
            return response()->json(['redirect' => route('dashboard')]);
        } else {
            session()->flash('failed', 'Invalid login credentials');
           // return response()->json(['status' => 422, 'errors' => ['email' => 'aasd', 'password' =>'password']]);
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
