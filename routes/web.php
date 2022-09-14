<?php

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Agency\ApplicationController;
use App\Http\Controllers\Auth\Agency\ForgotPasswordController;
use App\Http\Controllers\Auth\Agency\RegisterController;
use App\Http\Controllers\Auth\Agency\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UnverifiedController;
use App\Http\Controllers\Client\ClientController;
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


Route::get('/unverified', [UnverifiedController::class, 'index'])->name('unverified');

Route::post('/new-service', [PackageController::class, 'store'])->name('service-submission');


Route::get('/flush', function (Request $request) {
    $request->session()->flush();
});

Route::controller(CountryStateCityController::class)->group(function () {
    Route::get('/countries', 'index');
    Route::post('/api/fetch-states', 'fetchState');
    Route::post('/api/fetch-cities', 'fetchCity');
    Route::post('/api/state', 'singleState');
});

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------

*/

Route::prefix('client')->name('client.')->group(function() {
    Route::get('/login', [\App\Http\Controllers\Auth\Client\LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [\App\Http\Controllers\Auth\Client\LoginController::class, 'login'])->name('login.post');

    Route::get('/register', [\App\Http\Controllers\Auth\Client\RegisterController::class, 'showClientRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\Client\RegisterController::class, 'register'])->name('register.post');
});


Route::middleware('client')->prefix('client')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'profile'])->name('profile');
    Route::get('/logout', [\App\Http\Controllers\Auth\Client\LoginController::class, 'logout'])->name('logout');
});



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------

*/

Route::middleware(['auth:web','confirmed_account'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [SubmissionController::class, 'index'])->name('submission'); //admin.submission
    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submission.index'); //admin.submission
    Route::get('/submission/{id}',[SubmissionController::class, 'show'])->whereNumber('id')->name('submission.show'); //admin.submission/show
    Route::post('/submission-update', [SubmissionController::class, 'update'])->name('submission.confirmation');

    Route::get('/agencies/{id}',[AgencyController::class, 'show'])->whereNumber('id')->name('agency.show');
    Route::get('/agencies/', [AgencyController::class, 'index'])->name('agency.index');
    Route::post('/agency-update', [AgencyController::class, 'update'])->name('agency.confirmation');
    Route::get('/agencies/{id}/submissions',[AgencyController::class, 'submissions'])->whereNumber('id')->name('agency.submissions');

    Route::controller(PlanController::class)->prefix('/plans')->name('plans.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->whereNumber('id')->name('show');
        Route::put('/{id}', 'update')->whereNumber('id')->name('update');
    });

});


/*
|--------------------------------------------------------------------------
| Agency Routes
|--------------------------------------------------------------------------

*/

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


