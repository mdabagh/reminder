<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ReminderController::class)->group(function () {
    Route::get('/', 'index')->name('reminder.index');
    Route::post('/store', 'store')->name('reminder.store');
    Route::get('/reminders/{reminder}/edit', 'edit')->name('reminder.edit');
    Route::put('/reminders/{reminder}', 'update')->name('reminder.update'); // اضافه کردن روت برای متد update
    Route::delete('/reminders/{reminder}', 'destroy')->name('reminder.destroy');
});


Route::controller(CategoryController::class)->group(function () {
    Route::post('/categorie/store', 'store')->name('categories.store');
});
