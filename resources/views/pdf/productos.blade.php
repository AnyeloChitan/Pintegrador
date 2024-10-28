<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Productos</title>
    <link rel="stylesheet" href="{{ public_path('css/tabla-pdf.css') }}">  
  
</head>
<body>
    <div class="header">
        
        <div class="header-left">
            <h1>Reportes de Productos</h1>
        </div>
        
        
        <div class="header-right">
            <img src="{{ public_path('img/cangrejo.png') }}" alt="Logo de la Empresa">
            <h3>Mi Tienda</h3> 
    </div>

    <section class="container-tabla pdf">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Precio de venta</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody class="tabla-productos">
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>
                        @if ($producto->categoria)
                            {{ $producto->categoria->nombre }}
                        @else
                            Sin categoría
                        @endif
                    </td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->precio_venta }}</td>
                    <td>{{ $producto->stock }}</td>
                </tr>
                @endforeach  
            </tbody>
        </table>
    </section>

    <div class="footer">
        Fecha del reporte: {{ date('d/m/Y') }} <!-- Pie de página con la fecha -->
    </div>
</body>
</html>
