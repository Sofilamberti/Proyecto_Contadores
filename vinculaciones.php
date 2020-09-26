<?PHP
 session_start ();
  
  
if ($_SESSION['usuario_valido']!="")
   {

   ?>   
    

  <HTML>
<HEAD>
<TITLE>CONTAONLINE </TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?PHP include ("menu.php");
include ("conexion.php");
?>
<style>
	.forma{
  display: inline-block;
  margin: 16px;
}
	#rectangulo {
	width: 400px;
	height: 200px;
	background: #D9D9D9;
   
	
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:35px 10px;
	margin: 60px  50px   15px   50px;
}

#rectangulo > a {
	font-family: sans-serif;
	color: black;
	font-size: 30px;
	font-weight: bold;
}



</style>
</HEAD>
<?php  
	$id=$_SESSION['usuario_valido'];

	 $instruccion = "select * from usuario where id_user='".$id."'";
	 $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
	if($res2['id_rol']==1){
?>
<body>
<div class="container">
	<center>
	<div id="rectangulo"  class="forma" ><a href="/Proyecto_Contadores/vinculacionOxU.php">VINCULACION 
	DE OBLIGACION
	Y USUARIO A 
	CLIENTE
	</a> </div>

	<div  id="rectangulo"  class="forma" > <a a href="/Proyecto_Contadores/vinculacionTxU.php">VINCULACION
	DE TAREAS
	Y USUARIO A
	CLIENTE </a></div>
	</center>
</div>
</body>

<?PHP 
		}
		else{
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

 else
   {
     header("Location: index.html");
        exit();
   }
?>