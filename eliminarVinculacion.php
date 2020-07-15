<?PHP
 session_start ();
 ?>

        <?PHP 
        include ("conexion.php");

    
        $id=$_GET["id"];
         $instruccion2= "select * from oxcxusuario where id_oxcxu='$id'";
          $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("errro al elimianr a la obligacion");
          
          $res = mysqli_fetch_array ($consulta2);
          $ins= "delete from obligacionxcliente where id_oxc='".$res['id_oxc']."'";
		 mysqli_query ($conexion, $ins) or die ("erro al elimianr a la obligacion");

        $instruccion= "delete from oxcxusuario where id_oxcxu='$id'";

        mysqli_query ($conexion, $instruccion) or die ("errro al elimianr a la obligacion");

        mysqli_close ($conexion);      

   ?>   