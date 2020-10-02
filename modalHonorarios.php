



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
                 <label> honorarios </label>
             
                  <input type="text"   name="honorarios" id="honorarios" class="form-control input-sm">

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

        dniCliente=$('#dni').val();

        
    

	 $("#generarHonorarios").click(function(){

	 	dni=$('#dni').val();

    numResolucion=$('#numResolucion').val();

    honorarios='$'+$('#honorarios').val();

    honorariosLetra=$('#honorariosLetra').val();

    nombreProfesional=$('#nombreProfesional').val();

    profesion=$('#profesion').val();
    matricula=$('#matricula').val();

		costo="$"+$('#costoNumero').val();
    costoEscrito=$('#costoEscrito').val();
        
	 	cadena="dni="+dni+"&numResolucion="+numResolucion+  "&profesion="+profesion+
        "&nombreProfesional="+nombreProfesional+"&matricula="+matricula+
        "&honorarios="+honorarios+"&honorariosLetra"+
   
        "&costo="+costo+"&costoEscrito="+costoEscrito+"&honorariosLetra="+honorariosLetra;

		window.open("honorariosPdf.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
            
});

        




</script>
