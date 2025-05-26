<?php

use App\Http\Controllers\ExhibitionEntriesController;
use App\Http\Controllers\FapaInternationalAwardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
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

//Update User Details
Route::group(['middleware' => 'auth'], function () {
    Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');


    Route::get('/profile', [FapaInternationalAwardsController::class, 'showProfile'])->name('profile.show');
    Route::resource('user_profile', FapaInternationalAwardsController::class)->names('user_profile');
    // Route::resource('user_profile', UserProfileController::class)->names('user_profile');
    // Route::post('upload_image/{id}', [ExhibitionEntriesController::class, 'update'])->name('upload_image.update');
    Route::get('/user-entries', [ExhibitionEntriesController::class, 'userEntries'])->name('user_entries');
    Route::resource('upload_image', ExhibitionEntriesController::class)->names('exhibition_entries');
    // Route::post('upload_image', [ExhibitionEntriesController::class, 'store'])->name('upload_image');
});

Route::get('{any}', [HomeController::class, 'index'])->name('index');
