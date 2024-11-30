<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlobPostController;

Route::get('/', function () {
    return view('login');
});

Route::get('/show-login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/show-register', [LoginController::class, 'showRegister']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/blob', [BlobPostController::class, 'showMainPage']);
Route::post('/blob/post', [BlobPostController::class, 'createBlob']);


