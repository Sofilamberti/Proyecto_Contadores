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
                <th scope="col" style="background-color:#FA7564; color:white;">Rubro</th>
                <th scope="col" style="background-color:#FA7564; color:white;">Impuesto</th>
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
                            print('</tr>');
                        }
                        ?>

              </tbody>
          </table>
       
  
 <!--script para  buscar OBLIGACIONES en la tabla -->
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



</script>



