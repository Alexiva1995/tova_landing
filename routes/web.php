<?php

use App\Http\Controllers\DemoRequestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Ruta principal para renderizar la Landing Page con Vue 3 a través de Inertia
Route::get('/', function () {
    return Inertia::render('Landing');
});

// Ruta para recibir y registrar las solicitudes de acceso a la demo
Route::post('/demo-requests', [DemoRequestController::class, 'store'])->name('demo-requests.store');
