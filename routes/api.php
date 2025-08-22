<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuApiController;

Route::get('/menus', [MenuApiController::class, 'index']);
Route::post('/menus', [MenuApiController::class, 'store']);
Route::put('/menus/{menu}', [MenuApiController::class, 'update']);
Route::delete('/menus/{menu}', [MenuApiController::class, 'destroy']);

Route::get('/cek-api', fn() => response()->json(['status' => 'API terbaca']));

