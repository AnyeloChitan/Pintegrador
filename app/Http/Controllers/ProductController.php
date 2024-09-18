<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return view('productos.productosIndex');
    }

    public function agregar(){
        return view('productos.productosagregar');
    }
}
