
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <main class="contenedor">
       
        <div class="contenedor-formulario">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            
            <input type="email" name="email" placeholder="Email: " required >
            <input type="password" name="password" placeholder="Contraseña:">
             <div class="opciones-login">
                <label >
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>

                @if (Route::has('password.request'))               
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
             </div>

            <input class="btn" type="submit" value="Iniciar sesion">

            </form>
            <span> ¿No tienes una cuenta ? <a href="">Regisrate</a></span>
        </div>

        <div class="contenedor-poster">
            <h1>Bienvenido!</h1>
            <p>Unete a nosotros</p>
        </div>

    </main>
</body>
</html>