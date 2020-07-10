<?php

   function conectar(){
      $user="root";
      $pass="admin";
      $server="localhost";
      $db="usuarios_bandlab";
      /*$con=mysqli_connect($server,$user,$pass) or die ("error al conecar a la base de datos".mysqli_error());
      mysqli_select_db($db,$con);*/
      $link=mysqli_connect($server,$user,$pass) or die ("error al conecar a la base de datos".mysqli_error());
      mysqli_select_db($db,$link);

      //return $con;
      return $link;
   }

   /*
   //Definir variables

   # Nombre del servidor 
   define('DB_SERVER', 'localhost');

   # Nombre del usuario para ingresar al servidor 
   define('DB_USERNAME','root');

   # Nombre de la variable que almacena la contraseña para ingresar al servidor 
   define('DB_PASSWORD', '');

   # Nombre de la base de datos a la cual se conecta la aplicacion 
   define('DB_NAME', 'usuarios');

   #conexion base de daos 
   $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   if ($link === false ) {
      # code...
      die("ERROR EN LA CONEXION" . mysqli_connect_error());
   }

   */
  

?>