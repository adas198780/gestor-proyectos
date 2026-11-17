<?php

 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\SaludoController;

Route::get('/saludo/{nombre}', [SaludoController::class, 'saludar']);
