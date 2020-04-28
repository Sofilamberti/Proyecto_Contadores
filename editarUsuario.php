<?PHP
 session_start ();
 ?>
        <?PHP 
        include ("menu.php");
        include ("conexion.php");


        $id_user=$_GET["id_user"];
    
    

        $instruccion= "select * from usuario where id_user='$id_user'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr al usuario"); 
       




        $instruccion2 = "select * from rol";
         $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
           $filas=mysqli_num_rows ($consulta2);
        ?>

 <head>
     <link rel="stylesheet" type="text/css" href="alertify.css" >
    <link rel="stylesheet" type="text/css" href="semantic.css" >
    <link rel="stylesheet" type="text/css" href="default.css" >

    <script src="alertify/alertify.js"></script>

    <script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </head>       

    

<div   class="container-fluid"   style="width: 18rem;" >
<div class="card text-center">
  <div class="card-header">
    Edicion de datos de usuario
  </div>
  <div class="card-body" name="userData" id="userData">
      <form method="GET" id="formdata"> 
  <?PHP
           $usuario = mysqli_fetch_array ($consulta);
           print('<input type="hidden"  value="'.$usuario['id_user'].'" name="id_user" id="id_user"  class="form-control input-sm">
            <label>Nombre de usuario</label>
            <input type="text"  value="'.$usuario['user'].'" name="user" id="user" class="form-control input-sm">
                <label>contrseña</label>
                <input type="text" value="'.$usuario['password'].'"  name="password" id="password"  class="form-control"">
                <label>Rol</label>
                <select id="id_rol" name="id_rol" style="display:block;width:250px;">
                   <option  disabled> Seleccione un rol </option>');
                        for($i=0; $i<$filas; $i++){
                              $arregloRol= mysqli_fetch_array ($consulta2);
                    print('<option value="'.$arregloRol['id_rol'].'">'.$arregloRol['descripcion_rol'].'</option>');
                                                }           
                           
                        
                 print('</select>
                       <label>email</label>
                  <input type="email"  value="'.$usuario['email'].'" id="email" name="email" class="form-control input-sm"/>
                  ');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Datos" />
    </form> 
  </div>
  <div class="card-footer ">
  
       
  </div>
</div>

</div>
<?PHP
if (isset($_GET['submit'])) {

  $id_user=$_GET["id_user"];
   $usuario= $_GET["user"];
   $password= $_GET["password"]; ///aca se haria el hash 
   $rol= $_GET["id_rol"];
   $email= $_GET["email"];
  $cuenta=$_SESSION['cuenta'];

  $instruccion = "update  usuario  set user='$usuario', password='$password', Cuenta_id='$cuenta', id_rol='$rol',email='$email' where id_user='$id_user'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

    echo '<script language="javascript">alert("Se han editado los datos con exito");window.location.href="usuarios.php"</script>';
  }
?>
<!--<script>
    $(document).ready(function(){
     $("#guardarDatos").click(function(){
      id_user=$('#id_user').val()
      usuario=$('#user').val();
      password=$('#password').val();
      rol=$('#id_rol').val();
      email=$('#email').val();
     
      cadena= "id_user="+id_user+"&usuario="+usuario+"&password="+password+"&rol="+rol+"&email="+email;
      alert(cadena);
      $.ajax({
          url:"/Proyecto_Contadores/actualizarDatosUsuario.php?"+cadena,
        }).done(function(data) {

    
        alertify.success("Los cambios se realizaron con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          alertify.error("No se pudo realizar cambios al usuario ");
          });


    });
});
    
 
</script>-_>



	
