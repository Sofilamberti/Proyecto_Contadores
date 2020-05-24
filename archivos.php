<?PHP
 session_start ();
  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>


<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?PHP include ("menu.php");

	  include ("conexion.php");
	  
	  $instruccion = "select * from cliente " ;
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
      $filas = mysqli_num_rows ($consulta);
?>
<style>
	.forma{
  display: inline-block;

}
	#circulo1 {
	width: 300px;
	height: 300px;
	background: #27B8CB;
   -moz-border-radius: 150px;
   -webkit-border-radius: 150px;
   border-radius: 150px;
	
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:100px 20px;
	margin: 10px  40px 10px  70px;
}

#circulo1 > a {
	font-family: sans-serif;
	color: black;
	font-size: 40px;
	font-weight: bold;
}
#rectangle {
	width:200px; 
	height:50px; 
	background: #27B8CB;
	justify-content: center;
	align-items: center;
	text-align: center;
 
  padding:15px 30px;
	margin: 30px   50px   15px   50px;
}
#rectangle > h2 {
	font-family: sans-serif;
	color: black;
	font-size: 40px;
	font-weight: bold;
}

</style>
</HEAD>



	
<div class="col-12">
	<div id="rectangle"><h2> CLIENTE:</h2> 
	<select id="cliente" name="cliente" class="form-control">
                         <?PHP 
                           if($filas>0)
                           {
                            for($i=0; $i<$filas; $i++){
                              $result= mysqli_fetch_array ($consulta);
                              print('<option value="'.$result['dni'].'">'.$result['nombre'].'</option>');
                                                      }
                            
                           }
						  ?>
	</select>  
	
	
	
	 </div>

	<div id="circulo1"  class="forma" id="crearPDF" > <a href="crearPdf.php"> DATOS </a> </div>

	<div  id="circulo1"  class="forma" > <a a href=""> DDJJ,VEPS Y ACUSSES </a></div>

	<div  id="circulo1"  class="forma" > <a a href="">  	OTRA DOC </a></div>

</div>
</body>


<script>

    $("#crearPDF").click(function(){

      dni=$('#dni').val();

     alert (dni);


      cadena="dni="+dni ;
      $.ajax({
          url: "/Proyecto_Contadores/crearPdf.php?"+cadena,
        }).done(function(data) {

       
        alertify.success("agregado con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          
          alertify.error("agregado con exito  ");
          });


    });

</script>

