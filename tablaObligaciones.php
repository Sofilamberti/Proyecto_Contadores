<?PHP 
session_start ();

      include ("conexion.php");
      
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from obligacion "; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 




  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaObligacion" style="margin-top:10px;" >
            <caption>Lista de Obligaciones</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#D16659; color:white;">Rubro</th>
                <th scope="col" style="background-color:#D16659; color:white;">Impuesto</th>
                 <th scope="col" style="background-color:#D16659; color:white;">Editar</th>
                <th scope="col" style="background-color:#D16659; color:white;">Eliminar</th>
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                          <td style="display:none" id="'.$resultado['id'].'" name="'.$resultado['id'].'">'.$resultado['id'].'</td>
                          <td>'.$resultado['rubro'].'</td>
                          <td >'.$resultado['impuesto'].'</td>');

                    
                          print('  <div class="btn-group">
                            <td><a style="color:black;" href="/Proyecto_Contadores/editarObligacion.php?id='.$resultado['id'].'" ><i class="fas fa-edit"></i><input type="hidden" value='.$resultado['id'].'/> Editar </a> </td>

                           <td> <button class="btn ajs-capture btnElim" value='.$resultado['id'].' id="eliminar"  ><i class="fas fa-trash"></i><input type="hidden" value='.$resultado['id'].'/> Eliminar </button> </div></td>
                            ');
                    

                            print('</tr>');
                        }
                        ?>

              </tbody>
          </table>

                
  
 <!--script para  buscar clientes en la tabla -->
<script>
  $(document).ready(function(){
   $("#search").keyup(function(){
     _this = this;
    $.each($("#tablaObligacion tbody tr"), function() {
    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
    else
        $(this).show();
      });
    });
});
</script>


  <!--script para  dar de baja un usuario en la tabla -->
<!--<script>
  $(document).ready(function(){
    $("#eliminar").click(function(){
      alert($('#eliminar').val());
        id_user=$('#eliminar').val();
        cadena="id_user="+id_user;

      $.ajax({
          url:"/Proyecto_Contadores/eliminarUsuario.php?"+cadena,
        }).done(function(data) {
        $('#tablaUsuario').load('tablaUsuarios.php');
        alertify.success("El usuario fue dado de baja con exito! ");
        });
    });
});
</script>-->
<!-- para eliminar-->
<script type="text/javascript">

  $(document).on("click",".btnElim",function(){

      fila=$(this).closest("tr");

      id=fila.find('td:eq(0)').text()
        cadena="id="+id;

      $.ajax({
          url:"/Proyecto_Contadores/eliminarObligacion.php?"+cadena,
        }).done(function(data) {
        $('#tablaObligacion').load('tablaObligaciones.php');
        });

  });

</script>



