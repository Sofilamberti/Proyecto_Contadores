<?PHP 
session_start ();
include ("conexion.php");
if($_SESSION['usuario_valido']!=""){

     $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
      $id_cuenta=$_SESSION['cuenta'];
        $in2 = "select * from tarea where id_cuenta='$id_cuenta'" ;
        $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);
  if($res2['id_rol']==1){
      
          
 ?>         
<input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaTarea" style="margin-top:10px;" >
            <caption>Lista de Tareas</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#FA7564; color:white;">Nombre</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Descripcion</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Vencimiento</th>
                 <th scope="col" style="background-color:#FA7564; color:white;">Editar</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Eliminar</th>
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nf; $i++)
                     {
                      $resultado = mysqli_fetch_array ($cons2);
                      print('<tr>
                          <td style="display:none" id="'.$resultado['id'].'" name="'.$resultado['id'].'">'.$resultado['id'].'</td>
                          <td>'.$resultado['nombre'].'</td>
                          <td >'.$resultado['descripcion'].'</td>
                          <td >'.$resultado['vencimiento'].'</td>');

                    
                          print('  <div class="btn-group">
                            <td><a style="color:black;" href="/Proyecto_Contadores/editarTarea.php?id='.$resultado['id'].'" ><i class="fas fa-edit"></i><input type="hidden" value='.$resultado['id'].'/> Editar </a> </td>

                           <td> <button class="btn ajs-capture btnElim" value='.$resultado['id'].' id="eliminar"  ><i class="fas fa-trash"></i><input type="hidden" value='.$resultado['id'].'/> Eliminar </button> </td></div>
                            ');
                    

                            print('</tr>');
                        }
                        ?>

              </tbody>
          </table>

<?PHP
} else{
      ?>
      <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaTarea" style="margin-top:10px;" >
            <caption>Lista de Tareas</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#FA7564; color:white;">Nombre</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Descripcion</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Vencimiento</th>
               
              </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nf; $i++)
                     {
                      $resultado = mysqli_fetch_array ($cons2);
                      print('<tr>
                          <td style="display:none" id="'.$resultado['id'].'" name="'.$resultado['id'].'">'.$resultado['id'].'</td>
                          <td>'.$resultado['nombre'].'</td>
                          <td >'.$resultado['descripcion'].'</td>
                          <td >'.$resultado['vencimiento'].'</td>');
                            print('</tr>');
                        }
                        ?>

              </tbody>
          </table>
  
  <?PHP
  }
    }
    else {
    header("Location: index.html");
            exit();
    }
    ?>     
  
 <!--script para  buscar clientes en la tabla -->
<script>
  $(document).ready(function(){
   $("#search").keyup(function(){
     _this = this;
    $.each($("#tablaTarea tbody tr"), function() {
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
          url:"/Proyecto_Contadores/eliminarTarea.php?"+cadena,
        }).done(function(data) {
        $('#tablaTarea').load('tablaTareas.php');
        });

  });

</script>



