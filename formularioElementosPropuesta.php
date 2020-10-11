<?php
 

 $instruccionElemento = "select * from elemento where id_cuenta='$id_cuenta'";  
 $consultaElemento = mysqli_query ($conexion, $instruccionElemento) or die ("Fallo en la consulta");
 $filasElemento = mysqli_num_rows ($consultaElemento);
 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script> <!--sin este link no se carga la tabla -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Elemento</label>
    <select id="elemento" name="elemento"  class="form-control" style="width:200px;  height:50px; 	justify-content: left; 	align-items: left; text-align: left; margin: 40px   10px   15px   10px;">
                         <?PHP 
                         
                           if($filasElemento>0)
                           {
                            for($i=0; $i<$filasElemento; $i++){
                              $result= mysqli_fetch_array ($consultaElemento);
							  print('<option value="'.$result['id_elemto'].'">'.$result['nombre'].'</option>');
							  
                                                     }
                            
                           }
						
						   
						  
print('</select>');
     ?>
  </div>

  <div class="form-group">
    <label for="detalles">Agregue una tarea</label>
    <input type="text" class="form-control" name="detalles" id="detalles" placeholder="Another input">
    <button type="button" class="btn btn-primary" name="guardarTarea" id="guardarTarea">
        agregar tarea
    </button>
  </div>
 
</form>



<script type="text/javascript">

$(document).ready(function(){
    
$("#guardarTarea").click(function(){
  
      elementoId=$('#elemento').val();
      descripcionDetalles=$('#detalles').val();


    
      cadena="idElemento="+elementoId+"&descripcionDetalles="+descripcionDetalles;
      //window.location.href="/Proyecto_Contadores/guardarTarea.php?"+cadena;

     $.ajax({
          url: "/Proyecto_Contadores/guardarTarea.php?"+cadena,
        }).done(function(data) {

        alertify.success("tarea agregada con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          
          alertify.error("error al  agregar tarea  ");
          });


    });
});

</script>

