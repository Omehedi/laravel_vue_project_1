<?php

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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupportController;



use App\Http\Controllers\ManageController;
use App\Http\Controllers\ProfileImageController;
use App\Http\Controllers\PostController;


Route::apiResource('posts', PostController::class);

Route::post('/upload-profile-image', [ProfileImageController::class, 'upload']);
Route::get('/get-profile-image', [ProfileImageController::class, 'getProfileImage']);

Route::get('/leaves', [ManageController::class, 'index']);
Route::put('/leaves/{id}', [ManageController::class, 'update']);



Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);







