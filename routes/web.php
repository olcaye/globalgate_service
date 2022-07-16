<?php

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Auth\Agency\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::middleware(['auth','confirmed_account'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [SubmissionController::class, 'index'])->name('submission'); //admin.submission
    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submission.index'); //admin.submission
    Route::get('/submission/{id}',[SubmissionController::class, 'show'])->whereNumber('id')->name('submission.show'); //admin.submission/show
    Route::post('/submission-update', [SubmissionController::class, 'update'])->name('submission.confirmation');

    Route::get('/agencies/{id}',[AgencyController::class, 'show'])->whereNumber('id')->name('agency.show');
    Route::get('/agencies/', [AgencyController::class, 'index'])->name('agency.index');

    Route::get('/agencies/{id}/submissions',[AgencyController::class, 'submissions'])->whereNumber('id')->name('agency.submissions');
});

Route::post('/new-service', [PackageController::class, 'store'])->name('service-submission');

Route::middleware(['auth:agency','agency', 'confirmed_account'])->prefix('agency')->name('agency.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Agency\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/applications', [\App\Http\Controllers\Agency\ApplicationController::class, 'index'])->name('application.index');
    Route::post('/new-application', [\App\Http\Controllers\Agency\ApplicationController::class, 'store'])->name('application.store');
    Route::get('/new-application', [\App\Http\Controllers\Agency\ApplicationController::class, 'showForm'])->name('application.form');

});


Route::prefix('agency')->name('agency.')->group(function () {
    Route::get('/register', [\App\Http\Controllers\Auth\Agency\RegisterController::class, 'showAgencyRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\Agency\RegisterController::class, 'register'])->name('register.post');

    Route::get('/login', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [\App\Http\Controllers\Auth\Agency\LoginController::class, 'logout'])->name('logout');
});
