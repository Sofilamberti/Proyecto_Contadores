<?PHP
 session_start ();
  
 ?>
<?PHP 

    include ("menu.php");
    include ("conexion.php");
       if($_SESSION['usuario_valido']!=""){
    ?>


<head>
<TITLE>CONTAONLINE</TITLE>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>


<body>

  <?PHP 

     $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){
      
    $instruccion = "select * from rol";
    $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
    $filas=mysqli_num_rows ($consulta);


   ?>





<div class="container">
<div class="container">
<div class="container">
  <a href="/Proyecto_Contadores/bdd.php"><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4></a>
    <div class="col-12">
 
        <div id="tablaUsuario"> </div>
        </div>
   </div>
</div>
</div>

</body>


<?PHP


} else{
      ?>
      <div class="container">
  <center>
  <div id="cartel"  class="forma" > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px;"> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
</div>
</center>
</div>
  
  <?PHP
  }
    }
    else {
    header("Location: index.html");
            exit();
    }
    ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaUsuario').load('tablaUsuarios.php');
  });
</script>

<!--FALTARIA hacer un hash a la contraseña  para  seguridad-->
<script>
  $(document).ready(function(){
    $("#agregarUsuario").click(function(){

      usuario=$('#user').val();
      password=$('#password').val();
      rol=$('#id_rol').val();
      email=$('#email').val();
     
      cadena="usuario="+usuario+"&password="+password+"&rol="+rol+"&email="+email;

      $.ajax({
          url: "/Proyecto_Contadores/agregarUsuario.php?"+cadena,
        }).done(function(data){
        $('#tablaUsuario').load('tablaUsuarios.php');
        alertify.success("Usuario agregado con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          alertify.error("No se pudo agregar al nuevo usuario ");
          });


    });
});
</script>

