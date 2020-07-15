<?PHP 
session_start ();

      include ("conexion.php");
       $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){
       $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);

      
  ?> 
<style type="text/css">
  #cartel {
  width: 1000px;
  height: 200px;
  background: #D9D9D9;
   
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:35px 10px;
  margin: 60px  50px   15px   50px;
}
</style>



  <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">


            <table class="table table-striped table-hover  "  id="tablaClientes" style="margin-top:10px;" >
            <caption>Lista de  clientes</caption>
             <thead class="thead-light">
              <tr>
                <th scope="col" style="background-color:#FDB813;">Nombre</th>
                <th scope="col" style="background-color:#FDB813;">Apellido</th>
                <th scope="col" style="background-color:#FDB813;">CUIT</th>
                <th scope="col" style="background-color:#FDB813;">Email</th>
                <th scope="col" style="background-color:#FDB813;">Tipo Societario</th>
                <th scope="col" style="background-color:#FDB813;">Editar</th>
                <th scope="col" style="background-color:#FDB813;">Dar de baja</th>
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
                              <td><a style="color:black;" href="/Proyecto_Contadores/editarCliente.php?cuit='.$resultado['cuit'].'" ><i class="fas fa-edit"></i><input type="hidden" value='.$resultado['cuit'].'/> Editar datos </a> </td>
                                  <td> <button class="btn ajs-capture btnElim   " value='.$resultado['cuit'].' id="eliminar"  > <i class="fas fa-trash"></i> Eliminar </button> </div>
                              </td>

                            </tr>');
                        }
                        ?>

              </tbody>
          </table>
<?PHP
            }
            else{
      ?>
      <br>
      <div class="container">
  <center>
  <div id="cartel"  > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px;"> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
</div>
</center>
</div>    
  <?PHP
    }
    ?>
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

  $(document).on("click",".btnElim",function(){

      fila=$(this).closest("tr");
      cuitCliente=fila.find('td:eq(2)').text()
        cadena="cuit="+cuitCliente;

      $.ajax({
          url: "/Proyecto_Contadores/eliminarCliente.php?"+cadena,
        }).done(function(data) {

        $('#tabla').load('tabla.php');
        
        });


    });
   

</script>