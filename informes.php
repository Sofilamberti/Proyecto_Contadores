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



<style>
	.forma{
  display: inline-block;
}

#rectangle {
	width:200px; 
	height:50px; 
	background: #D16659;
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


<?PHP 


include ("menu.php");
include ("conexion.php");
//se tendria que poner el id de la cuenta como variable se session
$instruccion = "select * from cliente" ;////FALTA ACLARAR QUE TRAIGA SOLO LOS CLIENTES DE LA CUENTA 
$consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
$filas = mysqli_num_rows ($consulta);

?>


	
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
	margin: 40px   10px   15px   10px;">
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
  
  ?>


<ul class="list-group list-group-flush">
  <li class="list-group-item"><button type="submit" id="crearPDF" name="crearPDF"><a href="">PRESUPUESTO</a></button> </li>
  <li class="list-group-item"><a href="">NOTA AUMENTO HONORARIOS</a></li>
  <li class="list-group-item"><a href="">MODELO BALANCE</a></li>
  <li class="list-group-item"><a href="">OTROS</a></li>
</ul>




<script type="text/javascript">
	 $("#crearPDF").click(function(){
	 	dni=$('#dni').val();
	 	cadena="dni="+dni ;
		 window.open("presupuestoPdf.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
            
});
</script>
