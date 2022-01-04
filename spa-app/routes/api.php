<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentRatingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAppointmentRatingController;
use App\Http\Controllers\ProviderAppointmentRatingController;
use App\Http\Controllers\ServiceAppointmentRatingController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('services', ServiceController::class);

Route::resource('providers', ProviderController::class);

Route::resource('apprat', AppointmentRatingController::class);

Route::resource('users', UserController::class)->only(['index', 'show']);

Route::get('/users/{id}/apprat', [UserAppointmentRatingController::class, 'index']);

Route::get('/providers/{id}/apprat', [ProviderAppointmentRatingController::class, 'index']);

Route::get('/services/{id}/apprat', [ServiceAppointmentRatingController::class, 'index']);
