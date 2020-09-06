<?PHP
 session_start ();
 if ($_SESSION['usuario_valido']!="")
   {
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
<?PHP include ("menu.php");

	  include ("conexion.php");
	  $id=$_SESSION['usuario_valido'];
$id_cuenta=$_SESSION['cuenta'];
	 $instruccion = "select * from usuario where id_user='".$id."'";
	 $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
	if($res2['id_rol']==1){ 
		
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'";  ;////FALTA ACLARAR QUE TRAIGA SOLO LOS CLIENTES DE LA CUENTA 
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
      $filas = mysqli_num_rows ($consulta);
?>

</HEAD>

<body>

<div class="container">
 <div class="form-row">
    <div class="form-group col-md-3">
	<div id="rectangle" ><h2> CLIENTE:</h2> 
	 </div></div>

	  <div class="form-group col-md-3">
	  	<div aling="left">
	  	
	<select id="dni" name="dni"  class="form-control" style="width:200px; 
	height:50px; 
	justify-content: left;
	align-items: left;
	text-align: left;
	margin: 40px   10px   10px   10px;">
                         <?PHP 
                         
                           if($filas>0)
                           {
                            for($i=0; $i<$filas; $i++){
                              $result= mysqli_fetch_array ($consulta);
							  print('<option value="'.$result['dni'].'">'.$result['nombre'].' '.$result['apellido'].'</option>');
							  
                                                      }
                            
                           }
						
						   
						  
print('</select>
		 
	</div>
	</div>
	</div>');
//$d=$_GET['dni'];
	//href="crearPdf.php?dni='.$_GET['dni'].'"
//onchange="this.form.submit()"
?>
<div class="container">
<center>	

	<div id="rectangulo"  class="forma" style="padding:40px 20px; margin: 10px  30px 10px  30px;"> <button type="submit" id="crearPDF" name="crearPDF"><a TARGET=”_blank”> DATOS </a> </button> </div>


	<div  id="rectangulo"  class="forma" style="padding:20px 20px; margin: 10px  30px 10px  30px;" > <a  href=""> DDJJ,VEPS Y ACUSES </a></div>

	<div  id="rectangulo"  class="forma"  style="padding:40px 20px; margin: 10px  30px 10px  30px;">  <button type="submit" id="verDocs" name="verDocs"> OTRA DOC </a> </button> </a></div>

</center>
</div>
</div>
</body>
<?PHP 
		}
		else{
			?>
			<body>

<div class="container">
 <div class="form-row">
    <div class="form-group col-md-3">
	<div id="rectangle" ><h2> CLIENTE:</h2> 
	 </div></div>

	  <div class="form-group col-md-3">
	  	<div aling="left">
	  	
	<select id="dni" name="dni"  class="form-control" style="width:200px; 
	height:50px; 
	justify-content: left;
	align-items: left;
	text-align: left;
	margin: 40px   10px   10px   10px;">
                         <?PHP 
                         $instruccion = "select DISTINCT(cuit_cliente) from (select cuit_cliente from oxcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."' 
                UNION   
                 select cuit_cliente from txcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."')clientes";
					      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 1");

					      $nfilas = mysqli_num_rows ($consulta);
					      for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                   			
                       $instruccion3="select * from cliente where cuit='".$resultado['cuit_cliente']."'";
                      
                      $consulta3 = mysqli_query ($conexion, $instruccion3) or die ("Fallo en la consulta 2");
                       $resultado3 = mysqli_fetch_array ($consulta3);
                          
							  print('<option value="'.$resultado3['dni'].'">'.$resultado3['nombre'].' '.$resultado3['apellido'].'</option>');
							  
                                                      }
                            
                           
						
						   
						  
print('</select>
		 
	</div>
	</div>
	</div>');
//$d=$_GET['dni'];
	//href="crearPdf.php?dni='.$_GET['dni'].'"
//onchange="this.form.submit()"
?>
<div class="container">
<center>	

	<div id="rectangulo"  class="forma" style="padding:40px 20px; margin: 10px  30px 10px  30px;"> <button type="submit" id="crearPDF" name="crearPDF"><a TARGET=”_blank”> DATOS </a> </button> </div>


	<div  id="rectangulo"  class="forma" style="padding:20px 20px; margin: 10px  30px 10px  30px;" > <a  href=""> DDJJ,VEPS Y ACUSES </a></div>

	<div  id="rectangulo"  class="forma" style="padding:40px 20px; margin: 10px  30px 10px  30px;"> <a  href="">  	OTRA DOC </a></div>

</center>
</div>
</div>
</body>
<?PHP	
	}
}
 else
   {
     header("Location: index.html");
        exit();
   }
?>
<script type="text/javascript">
	 $("#crearPDF").click(function(){
	 	dni=$('#dni').val();
	 	cadena="dni="+dni ;
		 window.open("crearPdf.php?"+cadena, '_blank');
		 });
	//	window.location.href="crearPdf.php?"+cadena;
       $("#verDocs").click(function(){
	 	dni=$('#dni').val();
	 	cadena="dni="+dni ;
		 window.location.href="verDocumentos.php?"+cadena;
		 });

</script>

