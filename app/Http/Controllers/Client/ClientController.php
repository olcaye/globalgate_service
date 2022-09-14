<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    public function showLoginForm() {
        return view('auth.client.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request): \Illuminate\Http\RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('client.profile');
        }

        throw ValidationException::withMessages([
            $request->input('email') => [trans('auth.failed')],
        ]);
    }

    public function profile() {
         return view('client.profile');
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
