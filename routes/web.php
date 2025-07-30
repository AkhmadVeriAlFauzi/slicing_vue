<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Inertia\Inertia;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', function () {
    return Inertia::render('Invoicing',['title'=> 'Invoicing']);
});

Route::get('/invoicing', function () {
    return Inertia::render('Invoicing',['title'=> 'Invoicing']);
});