<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


#Rutas estaticas

Route::get('/', [HomeController::class]);

Route::prefix ('product')->controller(ProductController::class) ->group(function(){

Route::get('/', 'index');
Route::get('/create', 'create');
//RUTAS DINAMICAS - siempre se escriben al final de las rutas estaticas
Route::get('/{producto}', 'show');

});



