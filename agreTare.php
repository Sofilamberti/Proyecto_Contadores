<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $data = json_decode($_POST['data']);
$v1 = $data[0]['nombre'];
$v2= $data[1]['Descripcion'];

echo ''.$v1.' + '.$v2.'';
   //$instruccion1="select * from tarea";
    //$consulta = mysqli_query ($conexion, $instruccion1)  or die ("Fallo en la consulta");
     // $nfilas = mysqli_num_rows ($consulta);
   $instruccion = "insert into tarea ( nombre,descripcion)  values (,'$v1','$v2')";
      mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla");

         
?>
