<?PHP
 session_start ();


if ($_SESSION['usuario_valido']!="")
   {

  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">

  .forma{
  display: inline-block;

}
  
#rectangle {
  width:900px; 
  height:30px; 

  justify-content: left;
  align-items: left;
  text-align: left;
 
  padding:22px 50px;
  margin: 10px   10px   20px   10px;
}
#rectangle > h3 {
  font-family: sans-serif;
  color: black;
  font-size: 28px;
  font-weight: bold;
  text-align: left;
}


</style>
<?PHP include ("menu.php");
 include ("conexion.php");
 $id_cuenta=$_SESSION['cuenta'];
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);
      $instruccion2 = "select * from usuario where cuenta_id='$id_cuenta'"; 
      
       
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");

      $nfilas2 = mysqli_num_rows ($consulta2);

 ?>
 <center>

    <div class="col-10">
       <BR>
                <div  id="rectangle" style="background: #27B8CB" align="left"><h3>VINCULACION  DE OBLIGACION Y USUARIO A CLIENTE</h3></div>
                <table class="table table-striped table-hover  "  id="tablaVinculaciones" style="margin-top:10px;" >
                  <thead class="thead-light">
                <tr>
                <th scope="col" style="background-color:#E7E7E7;">Cliente</th>
                <th scope="col" style="background-color:#E7E7E7;">Obligacion</th>
                <th scope="col" style="background-color:#E7E7E7;">Usuario</th>
                <th scope="col" style="background-color:#E7E7E7;">Vincular</th>
              </tr>
            </thead>
               <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                        <td>'.$resultado['nombre'].' '.$resultado['apellido'].'</td>
                        <td><select id="obligacion" name="obligacion" class="form-control" style="height: 50px;overflow: auto;" multiple>');
                        $in2 = "select Obligacion_id from obligacionxcliente where CLiente_cuit=".$resultado['cuit']." order by Obligacion_id" ;
                         $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
                         $nf = mysqli_num_rows ($cons2);
                          for($h=0;$h<$nf;$h++){
                          $res4 = mysqli_fetch_array ($cons2);
                            $in5="select * from obligacion where id=".$res4['Obligacion_id']." order by id";
                              $cons5 = mysqli_query ($conexion, $in5) or die ("Fallo en la consulta 4");
                              $nf4 = mysqli_num_rows ($cons5);
                          $res5 = mysqli_fetch_array ($cons5);
                               print('<option value="'.$res5['id'].'">'.$res5['impuesto'].'</option>');

                        }
                       print(' </td>
                        <td>  <select id="usuario" name="usuario" class="form-control">');
                        for($j=0;$j<$nfilas2;$j++){
                          $res3 = mysqli_fetch_array ($consulta2);
                          print('<option value="'.$res3['id'].'">'.$res3['user'].'</option>');
                        }
                         print(' </td>
                          <td> <button value="vincular"  class="btn btn-primary btn-cargar" id="'.$resultado['cuit'].'" aling="right">
                              <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            </button></td>
                        </tr>');
                      }
                       ?> 
                     </tbody>
                   </table>

              </div>
            </center>

<?PHP
}
?>