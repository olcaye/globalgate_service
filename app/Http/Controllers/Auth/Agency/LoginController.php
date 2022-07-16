<?php

namespace App\Http\Controllers\Auth\Agency;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/agency';

    public function __construct()
    {
        $this->middleware(['guest:agency', 'guest:web'])->except('logout');
    }

    public function guard()
    {
        return Auth::guard('agency');
    }
    public function showLoginForm()
    {
        return view('auth.agency.login');
    }
}
