<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\RideController;
use App\Http\Controllers\Web\UserController;

use App\Http\Controllers\Web\WelcomeController;

use App\Http\Middleware\CheckAdmin;
use App\Models\Model;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', CheckAdmin::class])->group(function () {
    require_once __DIR__ . '/admin.php';
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('welcome', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('login', [EntryController::class, 'login'])->name('login');
Route::post('login', [EntryController::class, 'processLogin'])->name('loginUser');
Route::get('register', [EntryController::class, 'register'])->name('registerForm');
Route::post('register', [EntryController::class, 'processRegister'])->name('registerUser');
Route::get('logout', [EntryController::class, 'logout'])->name('logoutUser');
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile_user');
    Route::get('update', [UserController::class, 'update_profile'])->name('update_profile');
    Route::post('update', [UserController::class, 'saveuser'])->name('saveuser');
    Route::get('delete', [UserController::class, 'form_comfim_password'])->name('form_comfim_password');
    Route::post('delete', [UserController::class, 'delete_user'])->name('delete_user');
    Route::prefix('license')->group(function () {
        Route::get('create', [UserController::class, 'updateLicense'])->name('updateLicense');
        Route::post('save', [UserController::class, 'saveLicense'])->name('saveLicense');
    });
    Route::prefix('car')->group(function () {
        Route::get('create', [UserController::class, 'createCar'])->name('updateCar');
        Route::post('store', [UserController::class, 'storeCar'])->name('storeCar');
    });
    Route::prefix('ride')->group(function () {
        Route::get('create', [RideController::class, 'create'])->name('createRide');
        Route::post('store', [RideController::class, 'store'])->name('storeRide');
        Route::get('detail/{id}', [RideController::class, 'detail'])->name('detailRide');
        Route::get('cancel/{id}', [RideController::class, 'cancel'])->name('cancelRide');
        Route::get('complete/{id}', [RideController::class, 'complete'])->name('completeRide');
    });
    Route::prefix('request')->group(function () {
        Route::get('create', [RequestController::class, 'create'])->name('createRequest');
        Route::post('create', [RequestController::class, 'store'])->name('storeRequest');
        Route::get('detail/{id}', [RequestController::class, 'detail'])->name('detailRequest');
        Route::get('cancel/{id}', [RequestController::class, 'cancel'])->name('cancelRequest');
    });
    Route::prefix('match')->group(function () {
        Route::get('book/{id}', [RequestController::class, 'book'])->name('bookMatch');
        Route::get('cancel/{id}', [RequestController::class, 'cancelMatch'])->name('cancelMatch');
    });
    Route::prefix('contact')->group(function () {
        Route::get('', [FeedbackController::class, 'create'])->name('createFeedback');
        Route::post('store-feedback', [FeedbackController::class, 'storeFeedback'])->name('storeFeedback');
        Route::get('thank-you', [FeedbackController::class, 'thankYou'])->name('thankYouFeedback');
        Route::get('detail/{id}', [FeedbackController::class, 'detail']);
    });
});

Route::get('403',function (){
   return view('web/403');
});

Route::get('/rules', function () {
    return view('web/rules');
})->name('rules');
