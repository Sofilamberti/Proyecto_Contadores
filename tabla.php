<?PHP 
session_start ();

      include ("conexion.php");
      
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 




  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaClientes" style="margin-top:10px;" >
            <caption>Lista de  clientes</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#27B8CB;">Nombre</th>
                <th scope="col" style="background-color:#27B8CB;">Apellido</th>
                <th scope="col" style="background-color:#27B8CB;">CUIT</th>
                <th scope="col" style="background-color:#27B8CB;">Email</th>
                <th scope="col" style="background-color:#27B8CB;">Tipo Societario</th>
                <th scope="col" style="background-color:#27B8CB;">Operaciones</th>
               </tr>
              </thead>
              <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                              <td >'.$resultado['nombre'].'</td>
                              <td >'.$resultado['apellido'].'</td>
                              <td >'.$resultado['cuit'].'</td>
                              <td >'.$resultado['email'].'</td>
                              <td >'.$resultado['TipoSocietario_tipo_societario'].'</td>
                              <td><button class="btn ajs-capture  btn-warning " value='.$resultado['cuit'].' id="edit"  ><i class="fas fa-edit"></i> Editar </button>  
                                   <button class="btn ajs-capture " value='.$resultado['cuit'].' id="eliminar"  > <i class="fas fa-trash"></i> Eliminar </button> 
                              </td>

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


  <!--script para  eliminar clientes en la tabla -->
<script>
  $(document).ready(function(){
    $("#eliminar").click(function(){
      cuitCliente=$('#eliminar').val();
      cadena="cuit="+cuitCliente;
      $.ajax({
          url: "/Proyecto_Contadores/eliminarCliente.php?"+cadena,
        }).done(function(data) {

        $('#tabla').load('tabla.php');
        alertify.success("cliente eliminado con exito  ");
        });


    });
});
</script>