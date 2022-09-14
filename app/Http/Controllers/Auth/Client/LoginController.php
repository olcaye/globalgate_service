<?php

namespace App\Http\Controllers\Auth\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/client';

    public function __construct()
    {
        $this->middleware(['guest:agency', 'guest:web'])->except('logout');
    }

    public function guard()
    {
        return Auth::guard('client');
    }
    public function showLoginForm()
    {
        return view('auth.client.login');
    }
}
