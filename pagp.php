<?PHP
 session_start ();
  
 ?>
<html>
<head>


<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<script src="http://code.jquery.com/jquery-latest.js"></script> <!--sin este link no se carga la tabla -->
<?PHP

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


</HEAD>
<BODY>

<?PHP
if ($_SESSION['usuario_valido']==$id_user)
   {
?>
</head>
<body style="background-color:#D3D3D3;">
<div class="card-deck">
  <div class="card" style="background-color:#E7E7E7;" >

    <div class="card-body" >
      <h4 class="card-title"><center>Inicio  </center></h4>
    
    <a href="/Proyecto_Contadores/home1.php"><img src="/Proyecto_Contadores/men1.png"   width="210" height="210" class="card-img-top" alt="..." ></a>

    </div>
    
  </div>
  <div class="card" style="background-color:#E7E7E7;">
    <center></center>
    <div class="card-body">

      <h4 class="card-title"><center> Base de Datos  </center></h4>
      <a href="/Proyecto_Contadores/bdd.php"><img src="/Proyecto_Contadores/men2.png"  width="210" height="210" class="card-img-top" alt="..."></a>
  </center>
    </div>
    
  </div>
  <div class="card"style="background-color:#E7E7E7;">
    
    <div class="card-body">
      <h4 class="card-title"><center> Vinculaciones  </center></h4>
    <a href="/Proyecto_Contadores/vinculaciones.php"> <img src="/Proyecto_Contadores/men3.png" width="210" height="210" class="card-img-top" alt="..."></a>
    </div>
    
  </div>
  <div class="card" style="background-color:#E7E7E7;">
    
    <div class="card-body">
      <h4 class="card-title"><center> Tablero de Control   </center></h4>
     <a href="/Proyecto_Contadores/tabcont.php"><img src="/Proyecto_Contadores/men4.png" width="210" height="210" class="card-img-top" alt="..."></a>
    </div>
    </center>
  </div>
</div>
<BR>
<div class="card-deck">
  <div class="card" style="background-color:#E7E7E7;">
      <a href="/Proyecto_Contadores/archivos.php"><img src="/Proyecto_Contadores/men5.png" width="210" height="210" class="card-img-top" alt="..."></a>
    <div class="card-body">
   <h4 class="card-title"><center> Archivos  </center></h4>
      
    </div>
  
  </div>
  <div class="card" style="background-color:#E7E7E7;">
     <a href="/Proyecto_Contadores/comunicacion.php"> <img src="/Proyecto_Contadores/men6.png" width="210" height="210"  class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h4 class="card-title"><center>Comunicacion  </center></h4>
      
    </div>
  </div>
  <div class="card" style="background-color:#E7E7E7;">
      <a href="/Proyecto_Contadores/informes.php"><img src="/Proyecto_Contadores/men7.png" width="210" height="210"  class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h4 class="card-title"> <center> Informes  </center></h4>
    </div>
   
  </div>
  <div class="card" style="background-color:#E7E7E7;">
     <a href="/Proyecto_Contadores/normativa.php"> <img src="/Proyecto_Contadores/men8.png" width="210" height="210" class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h4 class="card-title"> <center> Normativa   </center></h4>
      
    </div>
    
  </div>
</div>
<?PHP
}
// Intento de entrada fallido
   else
   {
     header("Location: index.html");
        exit();
   }
  ?>
</body>