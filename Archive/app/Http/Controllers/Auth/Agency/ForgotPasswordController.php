<?php

namespace App\Http\Controllers\Auth\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    protected $guard = 'agency';

    public function showLinkRequestForm()
    {
        return view('auth.agency.passwords.email');
    }

    public function __construct()
    {
        $this->middleware(['guest:agency', 'guest:web']);
    }

    public function broker(): \Illuminate\Contracts\Auth\PasswordBroker {
        return Password::broker('agencies');
    }
}
