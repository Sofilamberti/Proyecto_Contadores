<?PHP
   session_start ();
 

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Si se ha enviado el formulario
   if (isset($usuario) && isset($clave))
   {
      include ("conexion.php");
   // Comprobar que el usuario está autorizado a entrar
      $instruccion = "select * from usuario where user = '$usuario'"." and password = '$clave'";
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
      mysqli_close ($conexion);

   // Los datos introducidos son correctos
      if ($nfilas > 0)
      {
         $usuario_valido = $usuario;
         $_SESSION['usuario_valido']=$usuario;
     
      }
   }
?>
<HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

<?PHP include ("menu.php");?>

</HEAD>
<BODY>

<?PHP
if ($_SESSION['usuario_valido']==$usuario)
   {
?>

<FORM NAME="home" ACTION="" METHOD="POST">
  <?PHP
  print(' <div class="jumbotron jumbotron-fluid">');
  print(' <div class="container">');
    print(' <h1 class="display-4">Bienvenido !</h1>');
     print('<p class="lead">Aca apareceran las obligaciones que vencen hoy! </p>');
   print('</div>');
 print('</div>');
 print(' <input type="hidden"  id="usuario" name="usuario" value="'.$usuario.'">');
 }

// Intento de entrada fallido
   else
   {
     header("Location: index.html");
        exit();
   }
  ?>
</BODY>
</HTML>