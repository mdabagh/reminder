<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReminderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/user/create', [AuthController::class, 'create'])->name('create');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::post('/language/switch', function(Request $request) {
    $locale = $request->input('locale');
    if (! in_array($locale, ['en', 'fa'])) {
        abort(400, 'Invalid language selection');
    }
    Cookie::queue('locale', $locale, 60*24*30); // ذخیره کوکی با نام locale و مقدار زبان انتخاب شده به مدت 30 روز
    app()->setLocale($locale);
    return redirect()->back();
})->name('language.switch');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [ReminderController::class, 'index'])->name('reminder.index');
    Route::post('/store', [ReminderController::class, 'store'])->name('reminder.store');
    Route::get('/reminders/{reminder}/edit', [ReminderController::class, 'edit'])->name('reminder.edit');
    Route::put('/reminders/{reminder}', [ReminderController::class, 'update'])->name('reminder.update');
    Route::delete('/reminders/{reminder}', [ReminderController::class, 'destroy'])->name('reminder.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
});