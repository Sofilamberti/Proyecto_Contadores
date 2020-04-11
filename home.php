<?PHP
   session_start ();
 

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$cuit=$_POST['cuit/cuil'];

// Si se ha enviado el formulario
   if (isset($usuario) && isset($clave) && isset($cuit))
   {
      include ("conexion.php");
   // Comprobar que el usuario está autorizado a entrar
      $inst="select * from cuenta where cuit='$cuit'";
       $consulta = mysqli_query ($conexion, $inst) or die ("Fallo en la consulta 1");
       $res= mysqli_fetch_array ($consulta);
        $nfilas1 = mysqli_num_rows ($consulta);
        $id=$res ['id'];
        if($nfilas1>0){
      $instruccion = "select * from usuario where Cuenta_id='$id'"." and user = '$usuario'"." and password = '$clave'";
      $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $nfilas = mysqli_num_rows ($consulta2);
      $res2= mysqli_fetch_array ($consulta2);
      $id_user=$res2['id_user'];
      mysqli_close ($conexion);

   // Los datos introducidos son correctos
      if ($nfilas > 0)
      {
         $usuario_valido = $usuario;
         $_SESSION['usuario_valido']=$id_user;
         $_SESSION['cuenta']=$id;
     
      }
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
if ($_SESSION['usuario_valido']==$id_user)
   {
?>

<FORM NAME="home" ACTION="" METHOD="POST">
  
  <?PHP
  print(' <div class="jumbotron jumbotron-fluid">');
  print(' <div class="container">');
    print(' <h1 class="display-4">Bienvenido '.$usuario.'!</h1>');
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