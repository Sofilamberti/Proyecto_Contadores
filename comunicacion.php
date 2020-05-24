<?PHP
 session_start ();


if ($_SESSION['usuario_valido']!="")
   {

  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

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

}
	#circulo1 {
	width: 300px;
	height: 300px;
	background: #FCC839;
   -moz-border-radius: 150px;
   -webkit-border-radius: 150px;
   border-radius: 150px;

	text-align: center;
 
  padding:90px 20px;
	margin: 100px  50px 50px  70px;
}

#circulo1 > a {
	font-family: sans-serif;
	color: black;
	font-size: 40px;
	font-weight: bold;
	text-align: center;
}
#circulo2 {
	width: 300px;
	height: 300px;
	background: #FCC839;
   -moz-border-radius: 150px;
   -webkit-border-radius: 150px;
   border-radius: 150px;

	text-align: center;
 
  padding:60px 20px;
	margin: 100px  50px 50px  70px;
}
#circulo2 > a {
	font-family: sans-serif;
	color: black;
	font-size: 35px;
	font-weight: bold;
}

</style>
</HEAD>

<body>	
	
<div class="col-12">
	
	<div id="circulo1"  class="forma" ><a href="/Proyecto_Contadores/mensajeMasivo.php" > MENSAJES MASIVOS
	</a> </div>
	

	<div  id="circulo2"  class="forma" > <a href="/Proyecto_Contadores/mensajeGrupo.php" > MENSAJES PARA GRUPO DE CLIENTES
 </a></div>

	<div  id="circulo1"  class="forma" > <a a href="/Proyecto_Contadores/mensajeInterno.php">MENSAJES INTERNOS
	 </a></div>

<?PHP
}

 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

