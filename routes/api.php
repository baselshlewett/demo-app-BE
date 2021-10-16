<?php

use App\Http\Controllers\Api\SendLogController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CountriesController;
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

Route::prefix('v1')->group(function() {
    Route::get('/messages-log', [SendLogController::class, 'get']);
    Route::get('/users', [UsersController::class, 'get']);
    Route::get('/countries', [CountriesController::class, 'get']);
});
