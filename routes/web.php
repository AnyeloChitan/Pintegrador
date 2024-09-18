<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){
 return view("layouts.plantilla");
});

Route::get('/productos',[ProductController::class,'index'])->name("productos");
Route::get('/productos/agregar',[ProductController::class,'agregar'])->name("productosagregar");

//ruta tipo resource

Route::resource('categoria',CategoriaController::class);