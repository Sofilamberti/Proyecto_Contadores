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