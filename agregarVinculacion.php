<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["cuit"];
   $v2= $_GET["usuario"];
   $v3= $_GET["obligacion"];
   echo'<script>alert($v1)</script>';
   print($v2)
      $id_cuenta=$_SESSION['cuenta'];
      for($i=0;$i<count($v3);$i++){
        $ob=$v3[$i];
        $cu=$v1;
   $instruccion ="select * from obligacionxcliente where Cliente_cuit='".$cu."' and Obligacion_id='".$ob."'";

    $con=mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");
    $resultado = mysqli_fetch_array ($con);
    $id=$resultado['id_oxc'];
   $instruccion2 = "insert into oxcxusuario (id_oxc, id_user, id_cuenta)  values ('$id','$v2','$id_cuenta')";
      mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla");
}
}

         
?>