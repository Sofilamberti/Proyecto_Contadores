<?PHP   
 session_start ();
  include ("conexion.php");

if ($_SESSION['usuario_valido']!="")
   {
     
    
   $idElemento= $_GET["idElemento"];
   $descripcionDetalles= $_GET["descripcionDetalles"];
   $idCuenta= $_SESSION['cuenta'];




   $instruccionElemento = "insert into detalle (descripcion, id_elemento ,id_cuenta)  values ('$descripcionDetalles','$idElemento','$idCuenta')";
   mysqli_query($conexion, $instruccionElemento) or die ("Fallo en insertar  en la tabla");
}
?>



