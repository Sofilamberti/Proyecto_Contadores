<?PHP
 session_start ();
 if ($_SESSION['usuario_valido']!="")
   {
   	$dni=$_GET['dni'];
  ?>
  <HTML>
<HEAD>
<TITLE>CONTAONLINE </TITLE>



<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
	.forma{
  display: inline-block;

}
	#rectangulo {
	width: 240px;
	height: 120px;
	background: #D9D9D9;
   
	justify-content: center;
	align-items: center;
	text-align: center;
 
  
}

#rectangulo > a {
	font-family: sans-serif;
	color: black;
	font-size: 30px;
	font-weight: bold;
}
#rectangulo > button {
	font-family: sans-serif;
	color: black;
	font-size: 30px;
	font-weight: bold;
	background: #D9D9D9;
border-width: 0px;
}
#rectangle {
	width:200px; 
	height:50px; 
	background: #55D6D2;
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:15px 30px;
	margin: 30px   10px   15px   50px;
}
#rectangle > h2 {
	font-family: sans-serif;
	color: black;
	font-size: 40px;
	font-weight: bold;
}


</style>
</HEAD>
  <?PHP include ("menu.php");

	  include ("conexion.php");
	  $id=$_SESSION['usuario_valido'];
$id_cuenta=$_SESSION['cuenta'];
	 $instruccion = "select * from cliente where dni='".$dni."'";
	 $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);


?>

   
   <div class="container">
    <div class="container">
      <div class="container">
      	<div class="container">
     <div class="col-12">

      <h1><?PHP print(''.$res2['nombre'].' '.$res2['apellido'].'')?></h1></div>
      <br>
      <div class="form-row">
      <div class="form-group col-md-3">
      	
      <h3> Agregar Archivos</h3></div>
      <div class="form-group col-md-3">
      	<form method="POST" action="" enctype="multipart/form-data">
		<input id="archivos" type="file"   name="archivos[]"   multiple="multiple" /></div>
		</div>
		<button class="btn btn-primary" style=" color:white;" id="confirmacion" name="confirmacion"><h5>Confirmar   <i class="fas fa-check-circle"></i></h5></button>
</form>
<BR>

<?PHP

$formato=array('.jpg','.png','.pdf');
if(isset($_POST['confirmacion'])){
	$archivos = $_FILES['archivos'];
    $nombre_archivos = $archivos['name'];
    $ruta_archivos = $archivos['tmp_name'];

	//$extencion= substr($nombre_archivos, strrpos($nombre_archivos, '.'));
	$i = 0;
    
      foreach ($ruta_archivos as $rutas_archivos) {
          
          
      
		if(move_uploaded_file($rutas_archivos, "".$res2['cuit']."/Otra_Doc/".$nombre_archivos[$i].""))//permite subir archvios a la carpeta que quiero 
		{
		 	print("SE SUBIO BIENNN");
		}
		else{
			print("no se pudoo");
		}
		$i++;
	}
}
print("<br>");
	$directorio = opendir("".$res2['cuit']."/Otra_Doc"); //ruta actual

while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
    	print('<a href="'.$res2['cuit'].'/Otra_Doc" download="'.$archivo.'">
    		<h5><i class="fas fa-file-download"></i>  </a>');
    	print('<a href="'.$res2['cuit'].'/Otra_Doc/'.$archivo.'" target="_blank"><i class="far fa-eye"></i></a> ');
        echo $archivo . "<br />";
        //print('<embed src="'.$res2['cuit'].'/Otra_Doc/'.$archivo.'" type="application/pdf" width="100%" height="600px" />');

    }
}
}
?>
</div>
</div>
</div>
</div>
</div>
