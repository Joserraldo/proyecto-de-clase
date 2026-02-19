<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return "LISTA DE PRODUCTOS";
    }

    public function create()
    {
        return "CREAR NUEVO PRODUCTO";
    }

    public function show ($producto){
        return "DETALLE DEL: $producto";
    }
}

