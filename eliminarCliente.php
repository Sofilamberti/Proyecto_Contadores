<?PHP
 session_start ();
 ?>
  <head>
  
  </head>
 
        <?PHP 
        include ("conexion.php");

       
  
        $v=$_GET["cuit"];

        $instruccion= "delete from cliente where cuit='$v'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

        mysqli_close ($conexion);

      

   ?>   
  	    
	




