<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/encrypt', [CryptoController::class, 'encryptForm']);
Route::post('/encrypt', [CryptoController::class, 'encrypt']);

Route::get('/decrypt', [CryptoController::class, 'decryptForm']);
Route::post('/decrypt', [CryptoController::class, 'decrypt']);
