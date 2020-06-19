<?PHP
 session_start ();
 ?>
        <?PHP 
        include ("menu.php");
        include ("conexion.php");


        $id=$_GET["id"];
    
    

        $instruccion= "select * from tarea where id='$id'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr al usuario"); 
  
        ?>

 <head>
     <link rel="stylesheet" type="text/css" href="alertify.css" >
    <link rel="stylesheet" type="text/css" href="semantic.css" >
    <link rel="stylesheet" type="text/css" href="default.css" >

    <script src="alertify/alertify.js"></script>

    <script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
  .forma{
  display: inline-block;

}
  
#rectangle {
  width:180px; 
  height:42px; 
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:20px 30px;
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

    

<center>
  <div class="col-7">
    <h3>Edicion de Tarea</h3>

      <form method="POST" id="formdata"> 
  <?PHP
           $tarea = mysqli_fetch_array ($consulta);
           print('<input type="hidden"  value="'.$tarea['id'].'" name="id" id="id"  class="form-control input-sm">
           <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#27B8CB;"><h3>Nombre</h3></div> <br>
            <input type="text"  value="'.$tarea['nombre'].'" name="nombre" id="nombre" class="form-control input-sm"></div>
            
            
             <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#D16659;"><h3>Contraseña</h3></div>
                <input type="text" value="'.$tarea['descripcion'].'"  name="descripcion" id="descripcion"  class="form-control""> 
                </div>
                <div class="form-group col-md-6">
                <div id="rectangle" style="background-color: #FCC839;"><h3>Vencimiento</h3> </div>
                  <input type="date"  value="'.$tarea['vencimiento'].'" id="vencimiento" name="vencimiento" class="form-control input-sm"/></div>
                  ');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Datos" />
    </form> 
  </div>
</center>
<?PHP
if (isset($_POST['submit'])) {

  $id=$_POST["id"];
   $nombre= $_POST["nombre"];
   $descripcion= $_POST["descripcion"]; ///aca se haria el hash 
   $vencimiento= $_POST["vencimiento"];
  

  $instruccion = "update  tarea  set nombre='$nombre', descripcion='$descripcion', vencimiento='$vencimiento' where id='$id'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

    echo '<script language="javascript">alert("Se han editado los datos con exito");window.location.href="tareas.php"</script>';
  }
?>