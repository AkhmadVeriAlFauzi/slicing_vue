<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;

Route::get('/tabungan', [TabunganController::class, 'index']);
Route::post('/tabungan', [TabunganController::class, 'store']);
Route::put('/tabungan/{id}', [TabunganController::class, 'update']);
Route::delete('/tabungan/{id}', [TabunganController::class, 'destroy']);
