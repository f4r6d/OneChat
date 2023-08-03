<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $this->validateForm($request);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            session()->regenerate();
            return redirect()->intended();
        } else {
            return back()->with('failed', 'Wrong password..');
        }

    }

    protected function validateForm(Request $request)
    {
        $request->validate([
             'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:8'],
        ]);
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect()->intended()->with('success', 'Logged out..');
    }
}
