@extends('layouts.plantilla')

@section('contenido')

<section class="container-cards">
    <div class="card">
        <div class="cabecera">
            <div class="cabecera-text">
                <h2>{{$categoria->nombre}}</h2>
                <p> {{$categoria->descripcion}}</p>
            </div>
        
    
        </div>

</section>
 
    
</div>
@endsection