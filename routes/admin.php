<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminModelController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\AdminRideController;
use \App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\RideController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/dashboard', [AdminDashboardController::class, 'list'])->name('dashboard');
Route::get('/date-range-ride', [AdminDashboardController::class, 'getRideStats'])->name('getRideStats');
Route::get('/date-range-bill', [AdminDashboardController::class, 'getBillStats'])->name('getBillStats');
Route::get('/date-range-top-drivers', [AdminDashboardController::class, 'getTopDrivers'])->name('getTopDrivers');
Route::get('/date-range-top-riders', [AdminDashboardController::class, 'getTopRiders'])->name('getTopRiders');

Route::prefix("models")->group(function () {
    Route::get('', [AdminModelController::class, 'list'])->name('listModel');
    Route::get('create', [AdminModelController::class, 'create'])->name('createModel');
    Route::post('create', [AdminModelController::class, 'store'])->name('storeModel');
    Route::get('update/{id}', [AdminModelController::class, 'update'])->name('updateModel');
    Route::post('update/{id}', [AdminModelController::class, 'save'])->name('saveModel');
    Route::get('delete/{id}', [AdminModelController::class, 'delete'])->name('deleteModel');
});

Route::prefix('users')->group(function () {
    Route::get('', [AdminUserController::class, 'list'])->name('listUser');
    Route::get('show', [AdminUserController::class, 'show'])->name('show_approve_drivers');
    Route::get('show/{id}', [AdminUserController::class, 'set'])->name('set');
    Route::get('create', [AdminUserController::class, 'create'])->name('createUser');
    Route::post('create', [AdminUserController::class, 'store'])->name('storeUser');
    Route::get('update/{id}', [AdminUserController::class, 'update'])->name('updateUser');
    Route::post('update/{id}', [AdminUserController::class, 'save'])->name('saveUser');
    Route::get('delete/{id}', [AdminUserController::class, 'delete'])->name('deleteUser');
});

Route::prefix("feedbacks")->group(function () {
    Route::get('', [AdminFeedbackController::class, 'list'])->name('listFeedback');
    Route::get('delete/{id}', [AdminFeedbackController::class, 'delete'])->name('deleteFeedback');
    Route::get('read/{id}', [AdminFeedbackController::class, 'read'])->name('readFeedback');
});

Route::prefix("rides")->group(function () {
    Route::get('', [AdminRideController::class, 'list'])->name('listRide');
    Route::get('match/{id}', [AdminRideController::class, 'list'])->name('findMatch');
    Route::get('setRide/{id}', [AdminRideController::class, 'setRide'])->name('setStatus');
    Route::get('upcoming',[AdminRideController::class,'upcomingRide'])->name('upcomingRide');
});

Route::prefix("requests")->group(function () {
    Route::get('', [AdminRequestController::class, 'list'])->name('listRequest');
});

Route::prefix("match")->group(function() {
    Route::get('find/{id}', [AdminRideController::class, 'findMatch'])->name('findMatch');
    Route::get('set/{ride_id}/{request_id}/{duration}', [AdminRideController::class, 'setMatch'])->name('setMatch');
});

Route::prefix("notifications")->group(function () {
    Route::get('create', [AdminNotificationController::class, 'createMassNotifications'])->name('createMassNotifications');
    Route::post('store', [AdminNotificationController::class, 'storeMassNotifications'])->name('storeMassNotifications');
});
