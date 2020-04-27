<?PHP
 session_start ();
 ?>

        <?PHP 
        include ("conexion.php");

    
        $id_user=$_GET["id_user"];

        $instruccion= "delete from usuario where id_user='$id_user'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr al usuario");

        mysqli_close ($conexion);      

   ?>   
  	    
	
