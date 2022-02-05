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
use App\Http\Controllers\API\AuthController;
use App\Http\Resources\UserResource;

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

//moj profil
Route::middleware('auth:sanctum')->get('/myprofile', function (Request $request) {
    return new UserResource($request->user());
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    //admin
    Route::resource('services', ServiceController::class)->only(['store', 'update', 'destroy']); //radi
    Route::resource('providers', ProviderController::class)->only(['store', 'update', 'destroy']); //radi
    Route::resource('users', UserController::class)->only(['destroy']); //radi
    Route::post('/register', [AuthController::class, 'register']); //radi
    Route::resource('users', UserController::class)->only(['index', 'show']); //radi

    //user
    Route::resource('apprat', AppointmentRatingController::class)->only(['store', 'update', 'destroy']); //radi

    //svi loginovani
    Route::post('/logout', [AuthController::class, 'logout']); //radi
    Route::get('/myapprat', [UserAppointmentRatingController::class, 'myapprat']); //radi
    Route::resource('users', UserController::class)->only(['update']); //radi
    
});

//sve javne rade
Route::resource('services', ServiceController::class)->only(['index', 'show']);

Route::resource('providers', ProviderController::class)->only(['index', 'show']);

Route::resource('apprat', AppointmentRatingController::class)->only(['index', 'show']);

Route::get('/users/{id}/apprat', [UserAppointmentRatingController::class, 'index']);

Route::get('/providers/{id}/apprat', [ProviderAppointmentRatingController::class, 'index']);

Route::get('/services/{id}/apprat', [ServiceAppointmentRatingController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);