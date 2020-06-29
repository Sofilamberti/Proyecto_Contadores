<?PHP 
session_start ();

      include ("conexion.php");
      
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select  * FROM txcxusuario where id_cuenta='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 1");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 




  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaVinculacionTarea" style="margin-top:10px;" >
            <caption>Lista de Tareas</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#D16659; color:white;">Cliente</th>
                <th scope="col" style="background-color:#D16659; color:white;">Usuario</th>
                <th scope="col" style="background-color:#D16659; color:white;">Tareas</th>
                <th scope="col" style="background-color:#D16659; color:white;">Eliminar</th>
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                       print('<tr>

                          <td style="display:none " id="'.$resultado['id_txcxu'].'" name="'.$resultado['id_txcxu'].'"></td>');

                      $instruccion2 = "select  * FROM tareaxcliente where id_txc='".$resultado['id_txc']."'"; 
                       $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta 1");
                       $resultado2 = mysqli_fetch_array ($consulta2);
                       $instruccion3="select * from cliente where cuit='".$resultado2['id_cliente']."'";
                      $consulta3 = mysqli_query ($conexion, $instruccion3) or die ("Fallo en la consulta 2");
                       $resultado3 = mysqli_fetch_array ($consulta3);

                      print('<td  id="'.$resultado3['cuit'].'" name="'.$resultado3['cuit'].'">'.$resultado3['nombre'].' ' .$resultado3['apellido'].'</td>');
                      
                     
                      $ins2 = "select * from usuario where id_user='".$resultado['id_user']."'"; 
                      $cons2 = mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta2");
                      $res = mysqli_fetch_array ($cons2);
                      
                      print('<td>'.$res['user'].' </td>');

                       $instruccion4="select * from tarea where id='".$resultado2['id_tarea']."'";
                        $consulta4 = mysqli_query ($conexion, $instruccion4) or die ("Fallo en la consulta 2");
                       $resultado4 = mysqli_fetch_array ($consulta4);

                         print('<td  id="'.$resultado4['id'].'" name="'.$resultado4['id'].'">'.$resultado4['nombre'].'</td>');
                      
                      
                      print('  <div class="btn-group">

                           <td> <button class="btn ajs-capture btnElim" value='.$resultado['id_txcxu'].' nombre="eliminar"  ><i class="fas fa-trash"></i><input type="hidden" value='.$resultado['id_txcxu'].'/> Eliminar </button> </div></td>
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
    $.each($("#tablaGrupo tbody tr"), function() {
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

      nombre=fila.find('td:eq(0)').text()
        cadena="nombre="+nombre;

      $.ajax({
          url:"/Proyecto_Contadores/eliminarGrupo.php?"+cadena,
        }).done(function(data) {
        $('#tablaGrupo').load('tablaGrupo.php');
        });

  });

</script>



