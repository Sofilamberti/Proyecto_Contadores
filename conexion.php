<?php 
    $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
      mysqli_select_db ($conexion,"contadores") or die ("No se puede seleccionar la base de datos");
       

 ?>