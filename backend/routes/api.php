<?php

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
    Route::get('', [TeamController::class, 'index']);
    Route::get('/{category}', [TeamController::class, 'show']);
});
