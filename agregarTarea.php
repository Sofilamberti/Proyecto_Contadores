<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $nombre= $_GET["nombre"];
   $descripcion= $_GET["descripcion"]; 
   $vencimiento= $_GET["vencimiento"];
   $id_cuenta=$_SESSION['cuenta'];

  $instruccion = "insert into tarea (nombre,descripcion,vencimiento,id_cuenta)  values ('$nombre','$descripcion','$vencimiento','$id_cuenta')";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de tarea");

         
?>