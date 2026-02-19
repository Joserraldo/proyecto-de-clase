<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


#Rutas estaticas

Route::get('/', [HomeController::class]);

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create']);



//RUTAS DINAMICAS - siempre se escriben al final de las rutas estaticas

Route::get('/product/{producto}', [ProductController::class, 'show']);

