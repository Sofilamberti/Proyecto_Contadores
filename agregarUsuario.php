<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $usuario= $_GET["usuario"];
   $password= $_GET["password"]; ///aca se haria el hash 
   $rol= $_GET["rol"];
   $email= $_GET["email"];
   $id_cuenta=$_SESSION['cuenta'];

  $instruccion = "insert into usuario (user,password,Cuenta_id,id_rol,email)  values ('$usuario','$password','$id_cuenta','$rol','$email')";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

         
?>

