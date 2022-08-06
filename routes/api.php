<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\AdminRideController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\RideController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin/statistics')->group(function () {
    Route::get('rides', [AdminDashboardController::class, 'getRideStats']);
    Route::get('bills', [AdminDashboardController::class, 'getBillStats']);
    Route::get('drivers', [AdminDashboardController::class, 'getTopDrivers']);
    Route::get('riders', [AdminDashboardController::class, 'getTopRiders']);
});

Route::get('mark-read/{user_id}', [AdminNotificationController::class, 'markRead'])->name('markRead');

Route::post('location', [AdminRequestController::class, 'getGeoLocation']);
