<?PHP 
session_start ();

      include ("conexion.php");
      
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select  DISTINCT (nombre) FROM grupo where id_cuenta='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta1");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 




  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaGrupo" style="margin-top:10px;" >
            <caption>Lista de Obligaciones</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#D16659; color:white;">Nombre</th>
                <th scope="col" style="background-color:#D16659; color:white;">Clientes</th>
                <th scope="col" style="background-color:#D16659; color:white;">Eliminar</th>
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                          <td  id="'.$resultado['nombre'].'" name="'.$resultado['nombre'].'">'.$resultado['nombre'].'</td>');
                      $nom=$resultado['nombre'];
                     $ins2 = "select cuit from grupo where nombre='".$nom."'"; 
       
                      $cons2 = mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta2");
                      
                      $nfilas2 = mysqli_num_rows ($cons2);
                      print('<td>');
                     for($n=0; $n<$nfilas2; $n++)
                     {
                      $res = mysqli_fetch_array ($cons2);
                       $ins = "select * from cliente where cuit=".$res['cuit']." "; 
      
       
                      $cons = mysqli_query ($conexion, $ins) or die ("Fallo en la consulta3");
                      $res1 = mysqli_fetch_array ($cons);
                   
                      
                          print(''.$res1['nombre'].' '.$res1['apellido'].' <BR>');
                        }
                        print(' </td>');
                      /*for($i=0; $i<$nfilas2; $i++)
                     {
                      $res = mysqli_fetch_array ($cons2);
                       $ins = "select * from cliente where cuit=".$res['cuit']." "; 
      
       
                      $cons = mysqli_query ($conexion, $ins) or die ("Fallo en la consulta3");
                      $res1 = mysqli_fetch_array ($cons);
                   
                      
                          print('<td>'.$res1['nombre'].' '.$res1['apellido'].' </td>');
                        }*/
                    
                          print('  <div class="btn-group">

                           <td> <button class="btn ajs-capture btnElim" value='.$resultado['nombre'].' nombre="eliminar"  ><i class="fas fa-trash"></i><input type="hidden" value='.$resultado['nombre'].'/> Eliminar </button> </div></td>
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



