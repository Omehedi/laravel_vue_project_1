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
Route::get('/leaves', [ManageController::class, 'index']);
Route::put('/leaves/{id}', [ManageController::class, 'update']);
Route::post('/upload-profile-images',[\App\Http\Controllers\ProfileImageController::class, 'upload']);


Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);







