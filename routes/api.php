<?php

use App\Http\Controllers\Api\CertifiedUserController;
use App\Http\Controllers\Api\LocationUserController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user', UserController::class)->only(['show', 'store', 'update', 'destroy']);

Route::apiResource('certified_user', CertifiedUserController::class)->only(['show', 'store', 'update', 'destroy']);

Route::apiResource('location_user', LocationUserController::class)->only(['show', 'store', 'update', 'destroy']);

