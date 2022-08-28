<?php

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Agency\ApplicationController;
use App\Http\Controllers\Auth\Agency\ForgotPasswordController;
use App\Http\Controllers\Auth\Agency\RegisterController;
use App\Http\Controllers\Auth\Agency\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UnverifiedController;
use App\Http\Controllers\CountryStateCityController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/new-ui', function () {
    return view('new');
})->name('new');

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::middleware(['auth:web','confirmed_account'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [SubmissionController::class, 'index'])->name('submission'); //admin.submission
    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submission.index'); //admin.submission
    Route::get('/submission/{id}',[SubmissionController::class, 'show'])->whereNumber('id')->name('submission.show'); //admin.submission/show
    Route::post('/submission-update', [SubmissionController::class, 'update'])->name('submission.confirmation');

    Route::get('/agencies/{id}',[AgencyController::class, 'show'])->whereNumber('id')->name('agency.show');
    Route::get('/agencies/', [AgencyController::class, 'index'])->name('agency.index');
    Route::post('/agency-update', [AgencyController::class, 'update'])->name('agency.confirmation');

    Route::get('/agencies/{id}/submissions',[AgencyController::class, 'submissions'])->whereNumber('id')->name('agency.submissions');
});

Route::post('/new-service', [PackageController::class, 'store'])->name('service-submission');

Route::middleware(['auth:agency', 'confirmed_account'])->prefix('agency')->name('agency.')->group(function () {
    /*Route::get('/', [\App\Http\Controllers\Agency\DashboardController::class, 'index'])->name('dashboard');*/
    Route::get('/', [ApplicationController::class, 'index'])->name('application.dashboard');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('application.index');
    Route::post('/new-application', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/new-application', [ApplicationController::class, 'showForm'])->name('application.form');

});


Route::prefix('agency')->name('agency.')->group(function () {
    Route::get('/register', [RegisterController::class, 'showAgencyRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

    Route::get('/login', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'logout'])->name('logout');

    Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset',[ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});


Route::get('/unverified', [UnverifiedController::class, 'index'])->name('unverified');

Route::get('/countries', [CountryStateCityController::class, 'index']);
Route::post('/api/fetch-states', [CountryStateCityController::class, 'fetchState']);
Route::post('/api/fetch-cities', [CountryStateCityController::class, 'fetchCity']);
Route::post('/api/state', [CountryStateCityController::class, 'singleState']);

/*Route::get('/reset-password/{token}/{email}', function ($token, $email) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $email
    ]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware(['guest:agency', 'guest:web'])->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware(['guest:agency', 'guest:web'])->name('password.email');*/
