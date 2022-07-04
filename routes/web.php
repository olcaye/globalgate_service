<?php

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\SubmissionController;
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
    Route::get('/submission', [SubmissionController::class, 'index'])->name('submission.index'); //admin.submission
    Route::get('/submission/{id}',[SubmissionController::class, 'show'])->whereNumber('id')->name('submission.show'); //admin.submission/show
    Route::post('/submission-update', [SubmissionController::class, 'update'])->name('submission.confirmation');
});

Route::post('/new-service', [PackageController::class, 'store'])->name('service-submission');

