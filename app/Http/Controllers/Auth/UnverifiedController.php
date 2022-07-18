<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnverifiedController extends Controller
{
    public function __construct() {
        $this->middleware(['guest:agency', 'guest:web']);
    }

    public function index() {
        return view('auth.unverified');
    }
}
