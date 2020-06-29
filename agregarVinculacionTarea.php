<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["cuit"];
   $v2= $_GET["usuario"];
   $v3= $_GET["tarea"];
   echo'<script>alert($v1)</script>';
   print($v2)
      $id_cuenta=$_SESSION['cuenta'];
      for($i=0;$i<count($v3);$i++){
        $tarea=$v3[$i];
        $cu=$v1;
   $instruccion ="select * from tareaxcliente where id_cliente='".$cu."' and id_tarea='".$tarea."'";

    $con=mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");
    $resultado = mysqli_fetch_array ($con);
    $id=$resultado['id_txc'];
   $instruccion2 = "insert into txcxusuario (id_txc, id_user, id_cuenta)  values ('$id','$v2','$id_cuenta')";
      mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla");
}
}

         
?>