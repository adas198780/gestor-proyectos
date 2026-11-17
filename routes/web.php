<?php

 use Illuminate\Support\Facades\Route;

 Route::get('/saludo/{nombre}', function ($nombre) {
     return "Hola, $nombre";
 });
