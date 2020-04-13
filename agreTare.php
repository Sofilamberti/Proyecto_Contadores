<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["nombre"];
   $v2= $_GET["descripcion"];
echo ''.$v1.' + '.$v2.'';
   $instruccion1="select * from tarea";
    $consulta = mysqli_query ($conexion, $instruccion1)  or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
   $instruccion = "insert into tarea (id, nombre,descripcion)  values ('$nfilas','$v1','$v2')";
      mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla");

         
?>
