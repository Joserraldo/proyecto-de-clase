<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $categories = \App\Models\Category::all();
        $featuredProducts = \App\Models\Product::orderBy('id', 'desc')->take(10)->get();
        return view('landing', compact('categories', 'featuredProducts'));
    }
}
