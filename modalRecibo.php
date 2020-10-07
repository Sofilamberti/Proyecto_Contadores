

<div class="modal fade" id="modalRecibo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> recibo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
	  </div>
	  
         <div class="modal-body">
           <div class="form-row">
              
    
                   <div class="form-group col-md-6">
                        <label> importe </label>
             
                         <input type="text"  name="importe" id="importe" class="form-control input-sm">

                        <label> importe en letras </label>
                          <input type="text"   name="importeLetra" id="importeLetra" class="form-control input-sm">

                   </div>

                   
                   <div class="form-group col-md-6">
                        <label> concepto </label>
             
                         <input type="text"   name="importe" id="importe" class="form-control input-sm">


                   </div>

                   

            </div>
           
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="generarRecibo">
         Generar recibo
        </button>
       
      </div>
    </div>
    
    </div>
</div>


<script type="text/javascript">

    
	 $("#generarRecibo").click(function(){

	 	dni=$('#dni').val();
      
         importeLetra=$('#honorariosLetra').val();
        


	 	//cadena="dni="+dni+"&numResolucion="+numResolucion+"&profesion="+profesion+"&nombreProfesional="+nombreProfesional+"&matricula="+matricula+"&honorarios="+honorarios+"&honorariosLetra"+"&mes="+mes+"&consejoCienciasEconomicas="+consejoCienciasEconomicas+"&costo="+costo+"&costoEscrito="+costoEscrito+"&honorariosLetra="+honorariosLetra;

		window.open("reciboPdf.php?"+cadena, '_blank');
	//	window.location.href="crearPdf.php?"+cadena;
            
});
</script>da
        
