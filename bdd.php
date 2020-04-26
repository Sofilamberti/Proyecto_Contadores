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
	#circulo1 {
	width: 230px;
	height: 230px;
	background: #D16659;
   -moz-border-radius: 125px;
   -webkit-border-radius: 125px;
   border-radius: 150px;
	
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:85px 10px;
	margin: 20px   70px   15px   90px;
}

#circulo1 > a {
	font-family: sans-serif;
	color: black;
	font-size: 40px;
	font-weight: bold;
}

#circulo2 {
 width: 230px;
	height: 230px;
	   background: #FCC839;
   -moz-border-radius: 125px;
   -webkit-border-radius: 125px;
   border-radius: 150px;
	
	justify-content: center;
	align-items: center;
	text-align: center;
	   padding:85px 38px;
	  margin: 20px   100px   10px   200px;
}
#circulo2 > a {
	font-family: sans-serif;
	color: black;
	font-size: 40PX;
	font-weight: bold;
}
</style>

<!--  ESTOS  ESTILOS PODRIAN IR EN UN ARCHIVO .CSS  ASI LO IMPORTAMOS Y QUEDA MAS LIMPIO EL PHP

SUPONETE estilosBdd.CSS  -->
</HEAD>
<body>
	<?PHP
 include ("conexion.php");
if ($_SESSION['usuario_valido']!="")
   {
?>
<div class="col-11">
	<div id="circulo1"  class="forma" ><a href="/Proyecto_Contadores/estudio.php">ESTUDIO</h1></a>  </div>

	<div  id="circulo1"  class="forma" > <a a href="/Proyecto_Contadores/usuarios.php">USUARIOS </a></div>
	
	<div  id="circulo1"  class="forma" ><a href="/Proyecto_Contadores/clientes.php"> CLIENTES </a> </div>
	<BR>
	<div id="circulo2"   class="forma" ><a a href="/Proyecto_Contadores/oxc.php"> OBLIG.</a> </div>
	
	<div  id="circulo2"  class="forma" > <a href="/Proyecto_Contadores/tareas.php">TAREAS  </a></div>
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