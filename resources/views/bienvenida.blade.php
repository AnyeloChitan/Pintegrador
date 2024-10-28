<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tienda de ropa</title>
    <link rel="icon" href="img/icono1.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/estilos-bienvenida.css">
<link rel="stylesheet" href="css/styles.css">


</head>
<body>
    <header>
        <input type="checkbox" id="menu">
        <label for="menu" class="hamburger">
            <span class="barras">≡</span>
            <span class="equis">x</span>
        </label>
        <section class="contenedor-nav">
           <div class="logo-nav">
             <img src="img/cangrejo.png" alt="logo">
             <span>Logo</span>
           </div>
           <nav>
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Productos</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
           </nav>
        </section>
        <section class="textos-header">
          <h1>Mi Tienda de Ropa</h1>
          <h2>Viste Siempre a la Moda</h2>
          <a href="#productos" >Comprar ahora</a>
        </section>
    </header>
    <!-- productos -->
     <section id="productos" class="productos">
        <h2>Nuestros productos</h2>
        <div class="productos-grid">
        
            @foreach($productos as $producto)
            <div class="producto">
                <img src="{{asset('img/'.$producto->imagen)}}" alt="{{$producto->imagen}}">
                <h3>{{$producto->nombre}}</h3>
                <p>{{$producto->precio_venta}}</p>
            </div>
           @endforeach
           

        </div>
        <div class="nav-botones">
            <!-- elegir una platilla de paginacion de vendor/pagination -->
              {{ $productos->links('vendor.pagination.default') }} 
            </div>
     </section>
     
     
    
     <!-- nuestro producto -->
      <section class="contenedor ">
        <h2 class="titulo">Nuestro Producto</h2>
        <div class="contenedor-sobre-nosotros">
            <img class="img-nuestro-producto" src="img/about.jpg" alt="acerca de nosotros">
            <div class="contenido-textos">
                <h3><span>1</span>los mejores productos</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad asperiores dignissimos totam quas! Laboriosam, harum. Quod, officiis. Alias eos odio sit adipisci? Quidem illum dicta nisi debitis odio blanditiis voluptatum.</p>
                <h3><span>2</span>los mejores productos</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad asperiores dignissimos totam quas! Laboriosam, harum. Quod, officiis. Alias eos odio sit adipisci? Quidem illum dicta nisi debitis odio blanditiis voluptatum.</p>
            </div>
        </div>

      </section>

      <!-- testimonios -->
       <section class="testimonios">
        <h2>Lo que dicen nuestro clientes</h2>
        <div class="carrusel">
            <div class="carrusel-track">
                <div class="testimonio">
                    <p>"Exelentes productos y gran atencioin al cliente , totalmente recomendable"</p>
                    <cite> Juan Perez</cite>
                </div>
                <div class="testimonio">
                    <p>" gran atencioin al cliente Exelentes productos  , totalmente recomendable"</p>
                    <cite> Maria garcia</cite>
                </div>
                <div class="testimonio">
                    <p>" totalmente recomendable Exelentes productos y gran atencioin al cliente ,"</p>
                    <cite> Monica suares</cite>
                </div>
                <div class="testimonio">
                    <p>"Exelentes productos y gran atencioin al cliente , totalmente recomendable"</p>
                    <cite> Juan Perez</cite>
                </div>
            </div>
        </div>
       </section>
     <!-- footer****** -->
      <footer>
        <p>&copy;2024 Mi Tienda de ropa. Todos los derechos reservados </p>
        <div class="footer-links">
            <a href="">Politica de Privacidad</a>
            <a href="">Terminos y condiciones</a>
            <a href="">Contacto</a>

        </div>
      </footer>
</body>
</html>