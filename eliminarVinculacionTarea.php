<?PHP
 session_start ();
 ?>

        <?PHP 
        include ("conexion.php");

    
        $id=$_GET["id"];
         $instruccion2= "select * from txcxusuario where id_txcxu='$id'";
          $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("errro al elimianr a la obligacion");
          
          $res = mysqli_fetch_array ($consulta2);
          $ins= "delete from tareaxcliente where id_tarea='".$res['id_tarea']."' and id_cliente='".$res['cuit_cliente']."'";
		 mysqli_query ($conexion, $ins) or die ("erro al elimianr a la obligacion");

        $instruccion= "delete from txcxusuario where id_txcxu='$id'";

        mysqli_query ($conexion, $instruccion) or die ("errro al elimianr a la obligacion");

        mysqli_close ($conexion);      

   ?>  
