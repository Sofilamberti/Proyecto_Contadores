<?PHP
 session_start ();
  include ("conexion.php");
if ($_SESSION['usuario_valido']!="")
   {
  ?>
  <HTML>
<HEAD>
<TITLE>CONTAONLINE</TITLE>

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
	width: 250px;
	height: 80px;
	
   
	
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:25px 10px;
	margin: 20px   40px   15px   40px;
}

#rectangulo > a {
	font-family: sans-serif;
	color: black;
	font-size: 25px;
	font-weight: bold;
}


</style>

<!--  ESTOS  ESTILOS PODRIAN IR EN UN ARCHIVO .CSS  ASI LO IMPORTAMOS Y QUEDA MAS LIMPIO EL PHP

SUPONETE estilosBdd.CSS  -->
</HEAD>
<body>
	<?PHP

?>
<br>
<br>
<div class="container">

	<center>
	<div id="rectangulo"  class="forma" style="background: #D9D9D9;"><a href="/Proyecto_Contadores/estudio.php">ESTUDIO</h1></a>  </div>

	<div  id="rectangulo"  class="forma" style="background: #D9D9D9;"> <a a href="/Proyecto_Contadores/usuarios.php">USUARIOS </a></div>
	
	<div  id="rectangulo"  class="forma" style="background: #D9D9D9;"><a href="/Proyecto_Contadores/clientes.php"> CLIENTES </a> </div>
	<BR>
	<center>
	<div id="rectangulo"   class="forma" style="background: #D9D9D9;"><a a href="/Proyecto_Contadores/oxc.php"> OBLIGACIONES</a> </div>
	
	<div  id="rectangulo"  class="forma" style="background: #D9D9D9;"> <a href="/Proyecto_Contadores/tareas.php">TAREAS  </a></div>
	</center>

</div>
<?php
 }

 else
   {
     header("Location: index.html");
        exit();
   }
?>
</body>