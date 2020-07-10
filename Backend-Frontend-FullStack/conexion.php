<?php

   #Definir variables

   # Nombre del servidor 
   define('DB_SERVER', 'localhost');

   # Nombre del usuario para ingresar al servidor 
   define('DB_USERNAME','root');

   # Nombre de la variable que almacena la contraseña para ingresar al servidor 
   define('DB_PASSWORD', '');

   # Nombre de la base de datos a la cual se conecta la aplicacion 
   define('DB_NAME', 'usuarios_bandlab');

   #conexion base de daos 
   $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   #mensaje de error por si no resulta bien la conexion 
   if ($link === false) {
       # code...
       die("ERROR En LA CONEXION" . mysqli_connect_error());
   }


?>