<?PHP
 session_start ();
 ?>

        <?PHP 
        include ("conexion.php");

    
        $id=$_GET["id"];

        $instruccion= "delete from obligacion where id='$id'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr a la obligacion");

        mysqli_close ($conexion);      

   ?>   
  	   