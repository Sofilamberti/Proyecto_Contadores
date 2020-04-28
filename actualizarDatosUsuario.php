<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");

$id_user=$_GET["id_user"]
   $usuario= $_GET["usuario"];
   $password= $_GET["password"]; ///aca se haria el hash 
   $rol= $_GET["rol"];
   $email= $_GET["email"];
  $cuenta=$_SESSION['cuenta'];

  $instruccion = "update  usuario  set user='$usuario', password='$password', Cuenta_id='$cuenta', id_rol='$rol',email='$email' where id_user='$id_user'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

        
			
?>

