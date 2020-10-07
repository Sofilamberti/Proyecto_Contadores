<?PHP
 session_start ();
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
 $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){
 $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'";  
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
  </div>'



);
  
include ("modalHonorarios.php");
  
include ("modalPropuesta.php");

  ?>


<ul  >
  <li class="list-group-item">
    <div >
    <caption>
        <button class="btn btn-primary" style="background-color:#FA7564; color:white;" data-toggle="modal" data-target="#modalPresupuesto">
	       PRESUPUESTO
         <span class="glyphicon glyphicon-plus"></span>
        </button>
     </caption>
    </div> 
  </li>

  <li class="list-group-item">
    <div >
    <caption>
        <button class="btn btn-primary" style="background-color:#FA7564; color:white;" data-toggle="modal" data-target="#modalPropuesta">
	       Propuesta
         <span class="glyphicon glyphicon-plus"></span>
        </button>
     </caption>
    </div> 
  </li>



  <li class="list-group-item">
    <caption>
       <button class="btn btn-primary" style="background-color:#FA7564; color:white;" data-toggle="modal" data-target="#modalHonorarios" >
          NOTA AUMENTO HONORARIOS
          <span class="glyphicon glyphicon-plus"></span>
      </button>
     </caption>
  </li>


  <li class="list-group-item">
  <div >
    <caption>
      <button class="btn btn-primary" style="background-color:#FA7564; color:white;" data-toggle="modal" data-target="#modalRecibo">
	        Recibo
      <span class="glyphicon glyphicon-plus"></span>
      </button>
     </caption>
   </div>
 </li>




  <li class="list-group-item">

  <caption>
      <button class="btn btn-primary" style="background-color:#FA7564; color:white;">
        <a href="excel/MODELOBALANCE.xls" download="MODELOBALANCE.xls">
          MODELO BALANCE  </a>
          <span class="glyphicon glyphicon-plus"></span>
      </button>
   </caption>
  
    </li>
  <li class="list-group-item">
    <caption>
      <button class="btn btn-primary" style="background-color:#FA7564; color:white;" >
        <a  href="excel/CALCULADORA DE GANANCIA 4TA.xls" download="CALCULADORA DE GANANCIA 4TA.xls" >
         CALCULADORA DE GANANCIA 4TA
         <span class="glyphicon glyphicon-plus"></span>
                          </a>
       </button>
     </caption>

</li>
  
  
  </li>
  <li class="list-group-item"><caption>
      <button class="btn btn-primary" style="background-color:#FA7564; color:white;" >
   otros
      <span class="glyphicon glyphicon-plus"></span>
      </button>
</caption>

</li>
</ul>




<!-- modal para agregar los datos de un cliente nuevo-->
   
<div class="modal fade" id="modalPresupuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Costo De presupuesto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
	  </div>
	  
         <div class="modal-body">
           <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Costo</label>
                  <input type="text"   name="costoNumero" id="costoNumero" class="form-control input-sm">
                </div>
                <div class="form-group col-md-6">
                <label>Valor del costo (escrito)</label>
             
                  <input type="text"   name="costoEscrito" id="costoEscrito" class="form-control input-sm">
                   </div>
            </div>

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="generarPresupuesto">
         Generar Presupuesto
        </button>
       
      </div>
    </div>
    
    </div>
</div>
<?PHP
 }
            else{
      ?>
      <br>
      <div class="container">
  <center>
  <div id="cartel"  > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px;"> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
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
    
<script type="text/javascript">
	 $("#generarPresupuesto").click(function(){
	 	dni=$('#dni').val();

		costo="$"+$('#costoNumero').val();
		costoEscrito=$('#costoEscrito').val();
	 	cadena="dni="+dni+"&costoNumero="+costo+"&costoEscrito="+costoEscrito;
		window.open("presupuestoPdf.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
            
});
</script>
