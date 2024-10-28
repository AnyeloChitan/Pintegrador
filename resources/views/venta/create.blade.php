@extends('layouts.plantilla')

@section('contenido')

<div class="venta-container">
    <h1 class="venta-h1"> Nueva Venta</h1>
    <!-- Div que almacena el array de productos como atributo data -->
    <div id="productos-data" data-productos='@json($productos)'></div>
    
    <form action="{{route('venta.store')}}" method="POST" class="needs-validation" >
        @csrf

        <div class="venta-form-group">
            <label for="cliente_id" class="venta-form-label">Cliente:</label>
            <select id="cliente_id" name="cliente_id" class="venta-form-select" required>
                <option value="">Seleccionar Cliente</option>
                @foreach($clientes as $cli)
                <option value={{$cli->id}}> {{ $cli->nombre }}</option>
              @endforeach
            </select>
        </div>
        <h2>Totales de Venta</h2>
        <div class="venta-form-group">
            <label for="descuento" class="venta-form-label">Descuento:</label>
            <input type="number" id="descuento" name="descuento" class="venta-form-control" value="0" min="0" step="5">
        </div>

        <div class="venta-total-container">
            <div>
                <span>Subtotal:</span>
                <span id="subtotal">0.00</span>
            </div>
            <div>
                <span>Total:</span>
                <span id="total">0.00</span>
            </div>
        </div>

        <div class="venta-detalle">
            <button type="submit" class="venta-btn">Generar Venta</button>
        </div>
        <h2>Detalles de Venta</h2>
        
        <div id="detalles">
            <table class="venta-table">
                <thead>
                    <tr>
                        <th class="venta-th">Producto</th>
                        <th class="venta-th">Cantidad</th>
                        <th class="venta-th">Precio de venta</th>
                        <th class="venta-th">Subtotal</th>
                        <th class="venta-th">Acciones</th>
                    </tr>
                </thead>
                <tbody id="detalle-body">
                    <tr class="venta-detalle">
                        <td>
                            <select  class="venta-form-select" id='producto-select' >
                                <option value="">Seleccionar Producto</option>
                                @foreach($productos as $producto)
                                <option value={{$producto->id}}> {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        
                        
                           
                        </td>
                        <td>
                            <input type="number" id="cantidad" class="venta-form-control" required min="1" value="1">
                        </td>
                        <td>
                            <p id="precio-venta">0.0</p>
                            
                        </td>
                        <td class="venta-subtotal">
                            
                            <p id="subtotal-agregar">0.0</p>
                        </td>
                        <td>
                            <button type="button" id="agregar-detalle" class="venta-btn venta-btn-secondary">Agregar</button>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

       
        
    </form>
</div>

@endsection