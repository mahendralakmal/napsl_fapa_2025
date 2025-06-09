<?php

use App\Http\Controllers\ExhibitionEntriesController;
use App\Http\Controllers\FapaInternationalAwardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentController;
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

Auth::routes();

Route::get('/', function (){ return view('index');})->name('root');
Route::get('/entry-rules', function (){ return view('rules');})->name('entry-rules');
Route::get('/payments', function (){ return view('payments.payments');})->name('payments');
Route::get('/contact', function (){ return view('contact');})->name('contact');
Route::resource('status', StatusController::class)->names('status');

//Update User Details
Route::group(['middleware' => 'auth'], function () {
    Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/profile', [FapaInternationalAwardsController::class, 'showProfile'])->name('profile.show');
    Route::resource('user_profile', FapaInternationalAwardsController::class)->names('user_profile');
    Route::get('/user-entries', [ExhibitionEntriesController::class, 'userEntries'])->name('user_entries');
    Route::resource('upload_image', ExhibitionEntriesController::class)->names('exhibition_entries');


    Route::post('/payment/initiate', [PaymentController::class,'showPaymentPage'])->name('payment.initiate');
    Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
    Route::get('/payment/return', [PaymentController::class, 'handleReturn'])->name('payment.return');
    Route::get('/payment/cancel', [PaymentController::class, 'handleCancel'])->name('payment.cancel');
});

Route::get('{any}', [HomeController::class, 'index'])->name('index');
