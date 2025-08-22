<?php
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;


Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard + Ekspor, dibuka jika login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ExportController::class, 'dashboard']);
    Route::get('/menus/export/excel', [ExportController::class, 'exportExcel'])->name('menus.export.excel');
    Route::get('/menus/export/pdf', [ExportController::class, 'exportPdf'])->name('menus.export.pdf');

    Route::resource('menus', MenuController::class);
});

