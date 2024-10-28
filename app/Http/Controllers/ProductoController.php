<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos= Producto::orderBy('id','ASC')->paginate(5);

        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias=Categoria::orderBy('id','DESC')
        ->select('categorias.id','categorias.nombre')
        ->get();
        return view('producto.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
              //validacion
                 $request->validate([
                    'nombre'=>'required',
                    'descripcion' => 'nullable',
                    'imagen'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'precio' => 'required',
                    'precio_venta' => 'required',
                    'stock' => 'required',
                ]);

         //procesar imagen
         if($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombreImagen=time().'.'.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('img'),$nombreImagen);
        }  

        $producto= new Producto;
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->imagen=$nombreImagen;
        $producto->precio=$request->precio;
        $producto->precio_venta=$request->precio_venta;
        $producto->stock=$request->stock;
        
        $producto->id_categoria=$request->id_categoria;

        $producto->save();

        return redirect()->route('producto.index');
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
          // Encuentra la categoría por su ID
          $producto = Producto::findOrFail($id);

          // Retorna una vista y pasa la categoría a la vista
          return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categorias=Categoria::orderBy('id','DESC')
        ->select('categorias.id','categorias.nombre')
        ->get();

        $producto=Producto::findOrFail($id);
        return view('producto.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //validacion
        $request->validate([
            'nombre'=>'required',
            'descripcion' => 'nullable',
            'imagen'=>'|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required',
            'precio_venta' => 'required',
            'stock' => 'required',
        ]);
$producto=Producto::findOrFail($id);
 //procesar imagen
 if($request->hasFile('imagen')){
    // Verificar si el producto ya tiene una imagen guardada
    if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
        // Eliminar la imagen vieja
        unlink(public_path('img/' . $producto->imagen));
    }
    $imagen=$request->file('imagen');
    $nombreImagen=time().'.'.$imagen->getClientOriginalExtension();
    $imagen->move(public_path('img'),$nombreImagen);
}  else{
    $nombreImagen=$producto->imagen;
}


$producto->nombre=$request->nombre;
$producto->descripcion=$request->descripcion;
$producto->imagen=$nombreImagen;
$producto->precio=$request->precio;
$producto->precio_venta=$request->precio_venta;
$producto->stock=$request->stock;

$producto->id_categoria=$request->id_categoria;

$producto->save();

return redirect()->route('producto.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);
         // Eliminar la imagen asociada al producto
        if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
           
            unlink(public_path('img/' . $producto->imagen));
        }
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
