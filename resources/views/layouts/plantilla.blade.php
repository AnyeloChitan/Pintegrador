<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos-tablas.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos-formularios.css')}}">
</head>
<body>
  <!-- slidebar   -->
   <aside class="slidebar" id="slidebar">
    <h2>Mi tienda</h2>
    <!-- PERFIL -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="img/face2.jpg" alt="avatar"></span>
         <p>Admin</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Perfil</a>
            <a href="">Logout</a>

        </div>
    </div>
    <!-- categorias-->
    
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="{{asset('img/icono1.png')}}" alt="Product"></span>
         <p>Categorias</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{route('categoria.index')}}">Todos</a>
            <a href="{{route('categoria.create')}}">Agregar</a>

        </div>
    </div>
    <!-- Productos -->
    
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="img/rokrt.png" alt="Product"></span>
         <p>Productos</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{route('productos')}}">Todos</a>
            <a href="{{url ('/productos/agregar')}}">Agregar</a>

        </div>
    </div>
    <!-- Provedores -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="img/provedores.png" alt="Provedor"></span>
         <p>Provedores</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Todos</a>
            <a href="">Agregar</a>

        </div>
    </div>
    <!-- Compras -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="img/compras.png" alt="Product"></span>
         <p>Compras</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Todos</a>
            <a href="">Agregar</a>

        </div>
    </div>
        <!-- Ventas -->
        <div class="element-slidebar">
            <div class="element-slidebar-btn">
             <span><img src="img/ventas.png" alt="ventas"></span>
             <p>Ventas</p>
            </div>
            <div class="element-slidebar-content">
                <a href="">Todos</a>
                <a href="">Agregar</a>
    
            </div>
        </div>
    </div>
   </aside>

   <!-- main -->
   <main class="main">
    <!-- header -->
    <header class="header">
        <h2>Dasboard</h2>
        <button id="menu-toggle" class="menu-hamburger">☰</button>
    </header>
    {{-- aqui se coloca todos los elmentos cambiantes --}}
      
      @yield('contenido')

   </main>
    <script src="{{asset ('js/script.js')}}"></script>
</body>
</html>