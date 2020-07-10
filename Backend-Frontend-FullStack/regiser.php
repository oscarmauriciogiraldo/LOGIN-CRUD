<?php 

    // conexion al archivo back para este formulario 
    // tambien es posible realizarlo aca en este mismo archivo 
    
    include 'code-register.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
</body>

 <!--contenedor de toda la estructura del proyect-->
 <div class="container-all">
    <!--container form - contenedor del formulario -->
    <div class="ctn-form">
        <img src="img/BandLab_logo.svg.png" alt="" class="log">
        <!--<a title="pagina oficial" href="https://www.bandlab.com/"><img src="img/BandLab_logo.svg.png" alt="" class="log"></a>-->
        <h1 class="title">Crear una Cuenta</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="">Nombre de Usuario</label>
            <input type="text" name="username" id="">
            <span class="mensage-error"> <?php echo $username_error; ?> </span>

            <label for="">Email</label>
            <input type="email" name="email" id="">
            <span class="mensage-error"> <?php echo $email_error; ?> </span>

            <label for="">Contraseña</label>
            <input type="password" name="password" id="">
            <span class="mensage-error"> <?php echo $password_error; ?> </span>

            <button type="submit">Registrar</button>
            
            <!--boton para iniciar sesión-->
            <!--<input type="button" value="Registrar">-->
            
            <!--
                <input type="submit" value="sss">
            <input type="submit" value="Iniciar Sesión">
            -->

        </form>

        <span class="text-footer">¿Aun no tienes una cuenta? 
            <a href="">Registrate</a> 
        </span>
    </div>
    
    <!-- Contenedor del texto o descripcion de la plataforma -->
    <div class="ctn-text">
        <div class="capa"></div>
        <h1 class="title-description">BandLab</h1>
        <p class="text-description">
            BandLab es la plataforma social de creación
            de música fácil de usar todo en uno.
            <br>
            La plataforma en la nube donde músicos y fanáticos crean música, 
            colaboran y se relacionan entre sí en todo el mundo.
        </p>

    </div>
</div>
</html>