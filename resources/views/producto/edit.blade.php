@extends('layouts.plantilla')

@section('contenido')
<div class= "container-formulario">
<div class="card formulario">
    <h2>Crear Nuevo Producto</h2>
    <form action="{{route('producto.update',$producto->id)}}" enctype="multipart/form-data" method="POST">
        {{-- agregar directica para qu se genere un token --}}
        @csrf
        {{-- agregar metodo patch --}}
        @method('PATCH')
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre de la Producto</label>
            <input type="text" id="nombre" name="nombre"  required value={{$producto->nombre}}>
        </div>
        <!-- Campo Descripción -->
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" >{{$producto->descripcion}}</textarea>
        </div>
        
        <!-- Campo Precio -->
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" required value={{$producto->precio}}>
        </div>
         <!-- Campo Precio Venta -->
         <div class="form-group">
            <label for="precio_venta">Precio de Venta</label>
            <input type="number" id="precio_venta" name="precio_venta" required value={{$producto->precio_venta}}>
        </div>
         <!-- Campo Stock-->
         <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required value={{$producto->stock}}>
        </div>
        <!-- Campo imagen -->
        <div class="form-group">
            <label for="imagen">Imagen</label>
           <input type="file" id="imagen" name= "imagen">
        </div>
        <!-- Campo Categoria -->
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name='id_categoria'id="id_categoria"required>
                <option value={{$producto->id_categoria}}  selected>{{$producto->categoria ? $producto->categoria->nombre : 'Sin categoría'}}</option>
                @foreach($categorias as $cat)
                 <option value={{$cat->id}}> {{ $cat->nombre }}</option>
               @endforeach
             </select>
        </div>
        <!-- Botón Guardar -->
        <div class="form-group">
            <button type="submit">Guardar Producto</button>
        </div>
    </form>
</div>
</div>
@endsection