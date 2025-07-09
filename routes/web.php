<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExhibitionEntriesController;
use App\Http\Controllers\ExhibitionPaymentController;
use App\Http\Controllers\FapaInternationalAwardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\JudgersPanelController;
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
Route::get('/contact', function (){ return view('contact');})->name('contact');

//Update User Details
Route::group(['middleware' => 'auth'], function () {
    Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/profile', [FapaInternationalAwardsController::class, 'showProfile'])->name('profile.show');
    Route::resource('user_profile', FapaInternationalAwardsController::class)->names('user_profile');
    Route::get('/user-entries', [ExhibitionEntriesController::class, 'userEntries'])->name('user_entries');
    Route::resource('upload_image', ExhibitionEntriesController::class)->names('exhibition_entries');

    Route::resource('status', StatusController::class)->names('status');

    Route::get('/payments', function (){ return view('payments.payments');})->name('payments');
    Route::post('/payment/initiate', [PaymentController::class,'showPaymentPage'])->name('payment.initiate');
    Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
    Route::post('/send-finish-email', [ExhibitionEntriesController::class, 'sendFinishEmail'])->name('send.finish.email');
    Route::post('/impersonate/stop', [ImpersonateController::class, 'stop'])->name('impersonate.stop');
});

Route::get('/payment/return', [PaymentController::class, 'handleReturn'])->name('payment.return');
Route::get('/payment/cancel', [PaymentController::class, 'handleCancel'])->name('payment.cancel');
Route::get('{any}', [HomeController::class, 'index'])->name('index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('allow.impersonate');
    Route::post('/payments/store', [ExhibitionPaymentController::class, 'store'])->name('payments.store')->middleware('allow.impersonate');;
    Route::post('/impersonate/{user}', [ImpersonateController::class, 'impersonate'])->name('impersonate.start');
});
Route::get('/stop-impersonate', [ImpersonateController::class, 'stopImpersonate'])->name('stop.impersonate');

Route::middleware(['auth', 'judger'])->group(function () {
    Route::get('/judging/index', [JudgersPanelController::class, 'index'])->name('judging.index');
    Route::get('/judging/marking-carousel', [JudgersPanelController::class, 'markingCarousel'])->name('judging.marking-carousel');

});
