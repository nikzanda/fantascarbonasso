<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
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

Route::group(['prefix' => 'team'], function () {
    Route::get('', [TeamController::class, 'index']);
    Route::get('/{team}', [TeamController::class, 'show']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('/{category}', [CategoryController::class, 'show']);
});

Route::group(['prefix' => 'event'], function () {
    Route::get('', [EventController::class, 'index']);
    Route::get('/{event}', [EventController::class, 'show']);
    Route::post('', [EventController::class, 'store']);
    Route::delete('/{event}', [EventController::class, 'destroy']);
});
