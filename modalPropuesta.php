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
                              <option value="PAGO UNICO">Pago Unico </option>
                        </select>
             
                   </div>

                   

                   <div class="form-group col-md-6">
                        <label> Costo total </label>
                        <input type="number"   name="costoTotal" id="costoTotal" class="form-control input-sm">
                       
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

                   <textarea placeholder="Escribir..." class="form-control input-sm"id="input_textarea" style="width: 370px; 
                 height: 150px; 
                 margin-top: 25px; 
                 margin-left: 16px; 
                 margin-right: 16px;
                 word-break: break-all;"></textarea>
                   <!--<div class="form-group col-md-6">
                        <label>  </label>
                        <?php
                         //include ("formularioElementosPropuesta.php");
                         
                        ?>
                       
                   </div>-->

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
    costoTotal=$('#costoTotal').val();
    nombreProfesional=$('#nombreProfesional2').val();
    profesion=$('#profesion2').val();
    matricula=$('#matricula2').val();
		textToWrite = input_textarea.value.replace(/\n/g, "}");
    //alert(textToWrite);
	 	cadena="dni="+dni+"&tipoCosto="+tipoCosto+"&profesion="+profesion+"&nombreProfesional="+nombreProfesional+"&titulo="+titulo+"&idElemento="+idElemento +"&matricula="+matricula +"&costoTotal="+costoTotal +"&textArea="+textToWrite;
    //alert(cadena);
           /* data = new FormData();// creo esto 
            //aca agrego todos los datos para no perder el formato
            data.append("dni",dni);
            data.append("tipoCosto",tipoCosto); 
            data.append("profesion",profesion); 
            data.append("nombreProfesional",nombreProfesional);
            data.append("titulo",titulo);  
            data.append("matricula",matricula); 
            data.append("costoTotal",costoTotal); 
            data.append("textArea",textToWrite); 
            data.append("idElemento",idElemento);
            
            var url = "/Proyecto_Contadores/propuestaPDF.php";
            $.ajax({
 
            url: url,
 
            type:'POST',
 
            contentType:false,
 
            data:data,
 
            processData:false,
 
            cache:false
            
            }).done(function(data) {
              success(window.open("propuestaPDF.php"));
              }).fail(function(jqXHR, textStatus, errorThrown) { 
                
                alertify.error("no se envio  ");
                });*/
		window.open("propuestaPDF.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
   
 
        
});

</script>
