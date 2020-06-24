<?PHP
 session_start ();
 ?>
  <head>
  
  </head>
 
        <?PHP 
        include ("conexion.php");

       
  
        $v=$_GET["nombre"];

        $instruccion= "delete from grupo where nombre='$v'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

        mysqli_close ($conexion);

      

   ?>