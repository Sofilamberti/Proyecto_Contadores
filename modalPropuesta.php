<?php 
$instruccion4 = "select * from cliente where dni='$id_cuenta'";  
$consulta4 = mysqli_query ($conexion, $instruccion4) or die ("Fallo en la consulta");
$filas4 = mysqli_num_rows ($consulta4);




?>


<div class="modal fade" id="modalPropuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Propuesta </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
	  </div>
	  
         <div class="modal-body">
           <div class="form-row">
              
                 <div class="form-group col-md-6">
                     <label> Titulo </label>
             
                     <input type="text"   name="Titulo" id="Titulo" class="form-control input-sm">
                  </div>

                
                   <div class="form-group col-md-6">
                        <label> Costo </label>
                            <select name="tipoCosto" id="tipoCosto">
                              <option value="MENSUAL">Mensual</option> 
                              <option value="ANUAL" selected>Anual</option>
                              <option value="PAGO ÚNICO">Pago Unico </option>
                        </select>
             
                   </div>

                   

                   <div class="form-group col-md-6">
                        <label> Costo total </label>
                        <input type="text"   name="costoTotal" id="costoTotal" class="form-control input-sm">
                       
                   </div>


                   <div class="form-group col-md-6">
                         <label>  Nombre Profesional </label>
             
                         <input type="text"   name="nombreProfesional2" id="nombreProfesional2" class="form-control input-sm">
                   </div>


                   <div class="form-group col-md-6">
                         <label> Profesión/Cargo </label>
             
                        <input type="text"   name="profesion2" id="profesion2" class="form-control input-sm">
                   </div>

                   <div class="form-group col-md-6">
                         <label> Matrícula </label>
             
                          <input type="text"   name="matricula2" id="matricula2" class="form-control input-sm">
                   </div>


                   <div class="form-group col-md-6">
                        <label>  </label>
                        <?php
                         include ("formularioElementosPropuesta.php");
                         
                        ?>
                       
                   </div>
            </div>
           
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="generarPropuesta">
         Generar archivo
        </button>
       
      </div>
    </div>
    
    </div>
</div>


<script type="text/javascript">

$("#generarPropuesta").click(function(){
	 
    dni=$('#dni').val();
    tipoCosto=$('#tipoCosto').val();
    titulo=$('#Titulo').val();
    idElemento=$('#elemento').val();

    nombreProfesional=$('#nombreProfesional2').val();
    profesion=$('#profesion2').val();
    matricula=$('#matricula2').val();
		

	 	cadena="dni="+dni+"&tipoCosto="+tipoCosto+"&profesion="+profesion+"&nombreProfesional="+nombreProfesional+"&titulo="+titulo+"&idElemento="+idElemento +"&matricula="+matricula;

		window.open("propuestaPDF.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
   
 
        
});

</script>
