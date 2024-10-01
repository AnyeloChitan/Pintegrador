<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function __construct()
    {
        $this->middleware('can:categoria.create')->only(['create','store']);
        $this->middleware('can:categoria.edit')->only(['edit', 'update']);
        $this->middleware('can:categoria.index')->only('index');
        $this->middleware('can:categoria.destroy')->only('destroy');

    }
    public function index()
    {
        //
        $categorias=Categoria::orderBy('id','ASC')->paginate(5);

        return view ('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validar los datos del formulario
         $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'status' => 'required|boolean',
        ]);

        // Crear una nueva instancia de Categoria
        $categoria = new Categoria();
        $categoria->nombre = $validatedData['nombre'];
        $categoria->descripcion = $validatedData['descripcion'];
        $categoria->status = $validatedData['status'];

        // Guardar la categoría en la base de datos
        $categoria->save();    
        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categoria.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        return view("categoria.edit",["categoria"=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'status' => 'required|boolean',
        ]);

        //buscar el registro que se va actualizar

        $categoria=Categoria::findOrFail($id);
        $categoria->nombre = $validatedData['nombre'];
        $categoria->descripcion = $validatedData['descripcion'];
        $categoria->status = $validatedData['status'];

        // Guardar la categoría en la base de datos
        $categoria->save();    
        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categoria.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index');


    }
}
