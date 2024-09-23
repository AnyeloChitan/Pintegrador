@extends('layouts.plantilla')

@section('contenido')
    
<section class="container-tabla">
    <h2 class="titulo-tabla"> Categorias</h2>
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Status</th>               
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>                
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td> {{$categoria->descripcion}}</td>
                <td>{{$categoria->status}}</td>
                
                <td >
                 <a href="{{route('categoria.show',[$categoria->id])}}">
                    <img src="img/view.png" alt="">
                 </a>
                 <a href="{{route('categoria.edit',[$categoria->id])}}">
                    <img src="img/edit.png" alt="">
                 </a>
                 <a href="{{route('categoria.destroy',[$categoria->id])}}">
                    
                 </a>
                 <form action="{{route('categoria.destroy',[$categoria->id])}}" method="POST" onsubmit="return confimarEliminacion()">

                    {{-- permite gemrar el token para enviar por post --}}
                    @csrf
                    {{-- agregar metodo delete --}}
                    @method('DELETE')
                    <input type="image"src="img/delete.png"></input>

                 </form>
                 <script>
                    function confimarEliminacion() {
                        return confirm('¿Seguro deseas eliminar?'); // Muestra el mensaje de confirmación
                    }
                </script>
                </td>                                
            </tr>
            @endforeach           
        </tbody>
    </table>

   </section>

@endsection