<?php

use App\Http\Controllers\ReminderApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function () {
    Route::get('/', [ReminderApiController::class, 'index']);
    Route::post('/store', [ReminderApiController::class, 'store']);
    Route::get('/reminders/{reminder}/edit', [ReminderApiController::class, 'edit']);
    Route::put('/reminders/{reminder}', [ReminderApiController::class, 'update']);
    Route::delete('/reminders/{reminder}', [ReminderApiController::class, 'destroy']);
});