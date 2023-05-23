<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ReminderApiController;
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

Route::post('/login', [AuthApiController::class, 'login']);
Route::get('/user/logout', function (){
    \request()->user()->tokens()->delete();
    return response([], 204);
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [ReminderApiController::class, 'index']);
    Route::post('/store', [ReminderApiController::class, 'store']);
    Route::get('/reminders/{id}/edit', [ReminderApiController::class, 'show']);
    Route::put('/reminders/{id}', [ReminderApiController::class, 'update']);
    Route::delete('/reminders/{id}', [ReminderApiController::class, 'destroy']);
});
