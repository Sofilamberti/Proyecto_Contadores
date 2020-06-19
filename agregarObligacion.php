<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $rubro= $_GET["rubro"];
   $impuesto= $_GET["impuesto"]; 
   

  $instruccion = "insert into obligacion (rubro,impuesto,grupo)  values ('$rubro','$impuesto','')";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de obligacion");

         
?>