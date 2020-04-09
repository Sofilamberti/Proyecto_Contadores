<?PHP
 
   session_start ();


  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
</HEAD>
<BODY>
<?PHP
if ($_SESSION['usuario_valido']!="")
   {
		if (isset($_POST['submit'])) {
		  	//Para ejecutar PHP script en Submit
			if(!empty($_POST['check_list'])){
				$cuit=$_POST['in1'];
				$conexion = mysqli_connect ("localhost", "root", "")
		         or die ("No se puede conectar con el servidor");
		        mysqli_select_db ($conexion,"contadores")
		         or die ("No se puede seleccionar la base de datos");
			// Bucle para almacenar y mostrar los valores de la casilla de verificación comprobación individual.
			foreach($_POST['check_list'] as $selected){
				$in2 = "delete from obligacionxcliente where CLiente_cuit=".$cuit."and Obligacion_id=".$selected."" ;
		          $cons2 = mysqli_query ($conexion, $in2)
		         or die ("Fallo en la consulta de eliminacion");
				}
				header("Location: oxc.php");
		        exit();
		}
		else{
			header("Location: oxc.php");
		        exit();
		}
		}
	}
else
	else
   {
     header("Location: index.html");
        exit();
   }
  ?>
</BODY>
