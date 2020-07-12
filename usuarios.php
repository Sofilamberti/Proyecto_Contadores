<?PHP
 session_start ();
  
 ?>
<?PHP 
    include ("menu.php");
    include ("conexion.php");
    ?>


<head>

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
   if($_SESSION['usuario_valido']!=""){
   
      
    $instruccion = "select * from rol";
    $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
    $filas=mysqli_num_rows ($consulta);


   ?>





<div class="container">
<div class="container">
<div class="container">
  <a href="/Proyecto_Contadores/bdd.php"><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4></a>
    <div class="col-12">
 <div style="float:right;">
<caption>
      <button class="btn btn-primary" style="background-color:#55D6D2; color:white;" data-toggle="modal" data-target="#modalUsuario">
        Agregar nuevo Usuario
      <span class="glyphicon glyphicon-plus"></span>
      </button>
</caption>
</div>

        <div id="tablaUsuario"> </div>
        </div>
   </div>
</div>
</div>
   <!-- modal para agregar los datos de un usuario nuevo-->
   
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
         <div class="modal-body">
                <label>Nombre de usuario</label>
                  <input type="text"   name="" id="user" class="form-control input-sm">
                <label>Contrseña</label>
                  <input type="password"   name="" id="password" class="form-control input-sm">
                <label>Rol</label>
                <select id="id_rol" name="id_rol" class="form-control">
                   <option value='' disabled>Seleccione un rol</option>
                         <?PHP 
                           if($filas>0)
                           {
                            for($i=0; $i<$filas; $i++){
                              $arregloRol= mysqli_fetch_array ($consulta);
                               print('<option value="'.$arregloRol['id_rol'].'">'.$arregloRol['descripcion_rol'].'</option>');
                                                      }           
                           }
                          ?>
                  </select>    
  
                <label>Email</label>
                  <input type="email"   name="" id="email" class="form-control input-sm">

            
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarUsuario">
        Agregar usuario
        </button>
       
      </div>
    </div>
    
    </div>
</div>
</body>


<?PHP
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

