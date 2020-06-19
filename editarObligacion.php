<?PHP
 session_start ();
 ?>
        <?PHP 
        include ("menu.php");
        include ("conexion.php");


        $id=$_GET["id"];
    
    

        $instruccion= "select * from obligacion where id='$id'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al editar obli"); 
       
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
  width:140px; 
  height:42px; 
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:20px 40px;
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
    <h3>Edicion Obligacion</h3>

      <form method="POST" id="formdata"> 
  <?PHP
           $obli = mysqli_fetch_array ($consulta);
           print('<input type="hidden"  value="'.$obli['id'].'" name="id" id="id"  class="form-control input-sm">
           <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#27B8CB;"><h3>Rubro</h3></div> <br>
            <input type="text"  value="'.$obli['rubro'].'" name="rubro" id="rubro" class="form-control input-sm"></div>
            
            
             <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#D16659;"><h3>Contraseña</h3></div>
                <input type="text" value="'.$obli['impuesto'].'"  name="impuesto" id="impuesto"  class="form-control""> 
                </div>
               
                  ');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Cambios" />
    </form> 
  </div>
</center>
<?PHP
if (isset($_POST['submit'])) {

  $id=$_POST["id"];
   $rubro= $_POST["rubro"];
   $impuesto= $_POST["impuesto"]; ///aca se haria el hash 
   

  $instruccion = "update  obligacion  set rubro='$rubro', impuesto='$impuesto' where id='$id'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de obligaciones");

    echo '<script language="javascript">alert("Se han editado los datos con exito");window.location.href="oxc.php"</script>';
  }
?>