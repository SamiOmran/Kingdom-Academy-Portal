<?php

use App\Http\Controllers\{
    APIController,
    CoachController,
    PlayerController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([], function () {
    Route::apiResource('players', PlayerController::class)->except('store');
    Route::post('register-player', [PlayerController::class, 'store'])
        ->name('guest.storeNewPlayer');
    Route::post('/players/{player}/img', [PlayerController::class, 'storeImg'])
        ->name('players.storeImg');

    Route::apiResource('coaches', CoachController::class);
    Route::post('/coaches/{coach}/img', [CoachController::class, 'storeImg'])
        ->name('coaches.storeImg');
});
