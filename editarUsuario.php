<?PHP
 session_start ();
 ?>
        <?PHP 
        include ("menu.php");
        include ("conexion.php");
        if($_SESSION['usuario_valido']!=""){
           $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){

        $id_user=$_GET["id_user"];
    
    

        $instruccion= "select * from usuario where id_user='$id_user'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr al usuario"); 
       




        $instruccion2 = "select * from rol";
         $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
           $filas=mysqli_num_rows ($consulta2);
        ?>

 <head>
  <TITLE>CONTAONLINE</TITLE>
     <link rel="stylesheet" type="text/css" href="alertify.css" >
    <link rel="stylesheet" type="text/css" href="semantic.css" >
    <link rel="stylesheet" type="text/css" href="default.css" >

    <script src="alertify/alertify.js"></script>

    <script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style type="text/css">
      #cartel {
  width: 1000px;
  height: 200px;
  background: #D9D9D9;
   
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:35px 10px;
  margin: 60px  50px   15px   50px;
}
  .forma{
  display: inline-block;

}
  
#rectangle {
  width:140px; 
  height:42px; 
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:20px 50px;
  margin: 10px   50px   20px   50px;
}
#rectangle > h3 {
  font-family: sans-serif;
  color: black;
  font-size: 25px;
  font-weight: bold;
  text-align: center;
}


</style>
 </head>       

    <?PHP
      
    ?>

<center>
  <div class="col-7">
    <h3>Edicion de datos de Usuario</h3>

      <form method="POST" id="formdata"> 
  <?PHP
           $usuario = mysqli_fetch_array ($consulta);
           print('<input type="hidden"  value="'.$usuario['id_user'].'" name="id_user" id="id_user"  class="form-control input-sm">
           <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#55D6D2;"><h3>Nombre Usuario</h3></div> <br>
            <input type="text"  value="'.$usuario['user'].'" name="user" id="user" class="form-control input-sm"></div>
            
            
             <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#FA7564;"><h3>Contraseña</h3></div>
                <input type="password" value="'.$usuario['password'].'"  name="password" id="password"  class="form-control""> 
                </div>
                <div class="form-group col-md-6">
                <div id="rectangle" style="background-color: #FDB813;"><h3>Rol</h3> </div>
                <select id="id_rol" name="id_rol" class="form-control" >
                   <option  disabled> Seleccione un rol </option>');
                        for($i=0; $i<$filas; $i++){
                              $arregloRol= mysqli_fetch_array ($consulta2);
                    print('<option value="'.$arregloRol['id_rol'].'">'.$arregloRol['descripcion_rol'].'</option>');
                                                }           
                           
                        
                 print('</select>
                       </div>
                         <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#55D6D2;"><h3>Email</h3></div> <br>
                  <input type="email"  value="'.$usuario['email'].'" id="email" name="email" class="form-control input-sm"/></div>
                  ');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Datos" />
    </form> 
  </div>
</center>
<?PHP
if (isset($_POST['submit'])) {

  $id_user=$_POST["id_user"];
   $usuario= $_POST["user"];
   $password= $_POST["password"]; ///aca se haria el hash 
   $rol= $_POST["id_rol"];
   $email= $_POST["email"];
  $cuenta=$_SESSION['cuenta'];

  $instruccion = "update  usuario  set user='$usuario', password='$password', Cuenta_id='$cuenta', id_rol='$rol',email='$email' where id_user='$id_user'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

    echo '<script language="javascript">alert("Se han editado los datos con exito");window.location.href="usuarios.php"</script>';
  }


} else{
      ?>
      <br>
      <div class="container">
  <center>
  <div id="cartel" > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px; "> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
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




	
