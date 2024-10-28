<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller


{
    //

    
    public function welcome(){        

                 
        $productos = Producto::select('nombre','imagen', 'descripcion', 
        'precio_venta', 'stock','id_categoria') 
                     ->orderBy('id', 'ASC')
                     ->paginate(10);
       
        return view('bienvenida',compact('productos'));
    }

    
    public function  show($id)
    {
        //
          // Encuentra la categoría por su ID
          $producto = Producto::findOrFail($id);

          // Retorna una vista y pasa la categoría a la vista
          return view('producto.show', compact('producto'));
    }


  
}
