<?php 
$instruccion4 = "select * from cliente where dni='$id_cuenta'";  
$consulta4 = mysqli_query ($conexion, $instruccion4) or die ("Fallo en la consulta");
$filas4 = mysqli_num_rows ($consulta4);




?>


<div class="modal fade" id="modalHonorarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Aumento de honorarios </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
	  </div>
	  
         <div class="modal-body">
           <div class="form-row">
              
                 <div class="form-group col-md-6">
                     <label> Numero de Resolución </label>
             
                     <input type="text"   name="numResolucion" id="numResolucion" class="form-control input-sm">
                  </div>

                  <div class="form-group col-md-6">
                         <label> Mes </label>
             
                          <input type="text"   name="mes" id="mes" class="form-control input-sm">
                   </div>

                   <div class="form-group col-md-6">
                        <label> Consejo Profecional de ciencias Economicas  </label>
             
                        <input type="text"   name="consejoCienciasEconomicas" id="consejoCienciasEconomicas" class="form-control input-sm">
                   </div>

                   <div class="form-group col-md-6">
                        <label> honorarios </label>
             
                         <input type="text"   name="honorarios" id="honorarios" class="form-control input-sm">

                       

                   </div>

                   <div class="form-group col-md-6">
                   <label> valor en letras </label>
                          <input type="text"   name="honorariosLetra" id="honorariosLetra" class="form-control input-sm">
                    </div>
                   <div class="form-group col-md-6">
                         <label>  Nombre Profesional </label>
             
                         <input type="text"   name="nombreProfesional" id="nombreProfesional" class="form-control input-sm">
                   </div>


                   <div class="form-group col-md-6">
                         <label> Profesión/Cargo </label>
             
                        <input type="text"   name="profesion" id="profesion" class="form-control input-sm">
                   </div>



                   <div class="form-group col-md-6">
                         <label> Matrícula </label>
             
                          <input type="text"   name="matricula" id="matricula" class="form-control input-sm">
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
                  

                  
            </div>
           
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="generarHonorarios">
         Generar archivo
        </button>
       
      </div>
    </div>
    
    </div>
</div>


<script type="text/javascript">

    
	 $("#generarHonorarios").click(function(){

	 	dni=$('#dni').val();
    numResolucion=$('#numResolucion').val();
    honorarios='$'+$('#honorarios').val();
    honorariosLetra=$('#honorariosLetra').val();

    nombreProfesional=$('#nombreProfesional').val();
    consejoCienciasEconomicas=$('#consejoCienciasEconomicas').val();
    profesion=$('#profesion').val();
    matricula=$('#matricula').val();
    mes=$('#mes').val();


    nombreProfesional2=$('#nombreProfesional2').val();

    profesion2=$('#profesion2').val();
    matricula2=$('#matricula2').val();

	 	cadena="dni="+dni+"&numResolucion="+numResolucion+"&profesion="+profesion+"&nombreProfesional="+nombreProfesional
     +"&matricula="+matricula+"&profesion2="+profesion2+"&nombreProfesional2="+nombreProfesional2
     +"&matricula2="+matricula2+"&honorarios="+honorarios+"&honorariosLetra"
     +"&mes="+mes+"&consejoCienciasEconomicas="+consejoCienciasEconomicas;

		window.open("honorariosPdf.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
            
});

        




</script>
