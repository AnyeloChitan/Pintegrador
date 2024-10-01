
@extends('layouts.plantilla')

@section('contenido')
            
     <section class="card-show">
                <!-- productos -->
                 
                    
        <img src="{{asset('img/'.$producto->imagen)}}"  alt="{{$producto->imagen}}">
        
        <h2>{{$producto->nombre}}</h2>
                            
        <p><strong>Descripcion: </strong>{{$producto->descripcion}}</p>                           
        <p><strong>Precio: </strong>{{$producto->precio}}</p>          
        <p><strong>Precio de venta: </strong>{{$producto->precio_venta}}</p> 
        <p><strong>Stock: </strong>{{$producto->stock}}</p>                     
    
     </section>
     @endsection