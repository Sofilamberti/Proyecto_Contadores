<?PHP 
session_start ();

      include ("conexion.php");
      
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from usuario where cuenta_id='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 




  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaClientes" style="margin-top:10px;" >
            <caption>Lista de Usuarios</caption>
             <thead class="thead-light">
              <tr>
               
                <th scope="col" style="background-color:#55D6D2;">Usuario</th>
                <th scope="col" style="background-color:#55D6D2;">Rol</th>
                <th scope="col" style="background-color:#55D6D2;">Email</th>
            
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                        <td style="display:none;">'.$resultado['id_user'].'</td>
                              <td >'.$resultado['user'].'</td>');

                     $instruccion2 = "select descripcion_rol from rol where id_rol=".$resultado['id_rol'].";";
                     $consultaNombreRol = mysqli_query ($conexion, $instruccion2) or die ("ocurrio u nerror al buscar el nombre del rol");
                     $nombreRol = mysqli_fetch_array ($consultaNombreRol);
                          
                     print('<td>'.$nombreRol['descripcion_rol'].'</td>
                            <td >'.$resultado['email'].'</td>  
                            </tr>');
                        }
                        ?>

              </tbody>
          </table>

                
  
 <!--script para  buscar clientes en la tabla -->
<script>
  $(document).ready(function(){
   $("#search").keyup(function(){
     _this = this;
    $.each($("#tablaClientes tbody tr"), function() {
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
<script type="text/javascript">

  $(document).on("click",".btnElim",function(){

      fila=$(this).closest("tr");

      id_user=fila.find('td:eq(0)').text()
        cadena="id_user="+id_user;

      $.ajax({
          url:"/Proyecto_Contadores/eliminarUsuario.php?"+cadena,
        }).done(function(data) {
        $('#tablaUsuario').load('tablaUsuarios.php');
        });

  });

</script>



