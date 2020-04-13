<?PHP
 session_start ();
  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?PHP include ("menu.php");
?>
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
</HEAD>
<body>
	<?PHP
 include ("conexion.php");
if ($_SESSION['usuario_valido']!="")
   {
   	$id_cuenta=$_SESSION['cuenta'];
   	$instruccion = "select * from cuenta where id='$id_cuenta'" ;
      $consulta = mysqli_query ($conexion, $instruccion)  or die ("Fallo en la consulta");
       $resultado = mysqli_fetch_array ($consulta);
?>

		<br>
<a href="/Proyecto_Contadores/bdd.php" ><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>


			<center>
	<div class="col-7">
	
<form ACTION="" METHOD="POST">

    <div class="form-row">
    <div class="form-group col-md-6">
  		<div id="rectangle" style="background-color:#27B8CB;"><h3>Nombre</h3></div>
    <!--<label for="inputCuit" style="background-color:#FCC839;"><h3>Nombre/Razon social</h3></label>-->
    <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="<?php print($resultado['nombre_cuenta']);?>">
  </div>
  <div class="form-group col-md-6">
  		<div id="rectangle" style="background-color:#27B8CB;"><h3>Titular</h3></div>
    <!--<label for="inputCuit" style="background-color:#FCC839;"><h3>Nombre/Razon social</h3></label>-->
    <input type="text" class="form-control" id="inputTitular" name="inputTitular" value="<?php print($resultado['titular']);?>">
  </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <div id="rectangle" style="background-color:#D16659;"><h3>Email</h3></div>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php print($resultado['email']);?>">
    </div>
    <div class="form-group col-md-6" >
      <div id="rectangle"style="background-color:#D16659;"><h3>Cuit</h3></div>
      <input type="text" class="form-control" id="inputPassword4" name="inputCuit" value="<?php print($resultado['cuit']);?>" readonly>
    </div>
  </div>
  
  <div class="form-row">
  	<div class="form-group col-md-6">
    <div id="rectangle" style="background-color: #FCC839;"><h3>Direccion</h3> </div>
    <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="<?php print($resultado['direccion']);?>">
  </div>
  <div class="form-group col-md-6">
    
      <div id="rectangle" style="background-color: #FCC839;"><h3>Telefono</h3></div>
      <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" value="<?php print($resultado['telefono']);?>">
    </div>
</div>
  
  <input  type="submit" class="btn btn-primary"  id="guardar" name="guardar" value=" Guardar Cambios">
       
        </button>
</form>
	</div>
	</center>
	<?php
	if (isset($_POST['guardar'])) {

		$val1=$_POST['inputNombre'];
		$val2=$_POST['inputEmail'];
		$val3=$_POST['inputCuit'];
		$val4=$_POST['inputDireccion'];
		$val5=$_POST['inputTelefono'];
		$val8=$_POST['inputTitular'];
		$id_cuenta=$_SESSION['cuenta'];

			$ins= "update  cuenta  set nombre_cuenta='$val1', direccion='$val4',telefono='$val5',titular='$val8', cuit='$val3',email='$val2' where id='$id_cuenta'" ;
			
		        $cons6 = mysqli_query ($conexion, $ins) or die ("Fallo en la consulta de agregar");
		        echo '<script language="javascript">alert("Se han guradado los Cambios con exito");window.location.href="estudio.php"</script>';

 }
}
 else
   {
     header("Location: index.html");
        exit();
   }
?>
</body>