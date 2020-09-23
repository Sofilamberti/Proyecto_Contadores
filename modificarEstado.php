<?PHP
 session_start ();
   include ("conexion.php");

$v1= $_GET["id_panel"];
$instruccion = "update  panel_de_control  set estado='Realizado'  where id='$v1' ";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de panel");
  ?>