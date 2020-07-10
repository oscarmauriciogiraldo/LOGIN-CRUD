<?php

   // incluir el archivo conexion.php conexion a la base de datos 
   require_once "conexion.php";

   // Definir variables e inicializarlas con valores vacios 

   $username = $email = $password = "";
   //variables de error 
   // muestran el error cuando los campos del formulario estan vacios 
   $username_error = $email_error = $password_error = "";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       //validar cada uno de los campos

       //Validando input nombre de usuario 
       if(empty(trim($_POST["username"]))){
        $username_error = "Por favor, ingrese un nombre de usuario";
        }else {
           # code...
           // ya esta validado el nombre de usuario 
           //ahora si el imput tiene valor entonces se prepara para alamecenarse en la base de datos 
           //preparar una declaracion de seleccion 
           $sql = "SELECT id FROM usuarios_bandlab WHERE usuario = ?";
           
           //condicion con statement mysqli prepara la conexion y se pasa la variable de conexion a mysql
           if ($stmt = mysqli_prepare($link, $sql)) {
               # code...
               mysqli_stmt_bind_param($stmt, "s", $param_username);

               //se establecen los parametros 
               $param_username = trim($_POST["username"]);

               if(mysqli_stmt_execute($stmt)) {
                   # code...
                   mysqli_stmt_store_result($stmt);

                   if (mysqli_stmt_num_rows($stmt) == 1) {
                       # code...
                       $username_error = "Este nombre de usuario ya existe";
                   }else {
                       # code...
                       $username = trim($_POST["username"]);
                   }
               }else {
                   # code...
                   echo "Algo salió mal, vuelve a inténtarlo mas tarde";
               }

           }
        }



       //Validando input nombre de email
       if (empty(trim($_POST["email"]))) {
        # code...
        $email_error = "Ingresar un correo electronico valido";
       }else {
        # code...
        // ya esta validado el nombre de usuario 
        //ahora si el imput tiene valor entonces se prepara para alamecenarse en la base de datos 
        //preparar una declaracion de seleccion 
        $sql = "SELECT id FROM usuarios_bandlab WHERE email = ?";
        
        //condicion con statement mysqli prepara la conexion y se pasa la variable de conexion a mysql
        if ($stmt = mysqli_prepare($link, $sql)) {
            # code...
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            //se establecen los parametros 
            $param_email = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                # code...
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    # code...
                    $email_error = "Este correlo electronico ya existe";
                }else {
                    # code...
                    $email = trim($_POST["email"]);
                }
            }else {
                # code...
                echo "Algo salió mal, vuelve a inténtarlo mas tarde";
            }

        }
       }


        //validacion contraseña 
        if (empty(trim($_POST["password"]))) {
            # code...
            $password_error = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["password"])) < 4){
            $password_error = "La contraseña debe tener al menos 4 caracteres";
        }else {
            # code...
            $password = trim($_POST["password"]);
        }

        // comprobando errores de entrada antes de incertar los datos en la base de datos
        if (empty($username_error) && empty($email_error) && empty($password_error)) {
            # code...
            //se prepara la sentencia 
            $sql = "INSERT INTO usuario (email_usuario, nombre_usuario, contraseña_usuario ) VALUES (?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                # code...
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                //estableciendo parametros 
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA

                if (mysqli_stmt_execute($stmt)) {
                    # code...
                    header("location: login.php");
                }else {
                    # code...
                    echo "algo salio mal, intentalo mas tarde";
                }
            }
        }

        //cierra el proceso 
        mysqli_close($link);


   }

?>