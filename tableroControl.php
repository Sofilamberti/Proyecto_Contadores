<?PHP
 session_start ();
  ?>

<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?PHP include ("menu.php");
      include ("conexion.php");
  

      $instruccion = "select * from panel_de_control ";////FALTA ACLARAR QUE TRAIGA SOLO LOS CLIENTES DE LA CUENTA 
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");///obtengo todos las filas de tablero de control
      $filas = mysqli_num_rows ($consulta);
        
      for($n=0;$n<$nfilas;$n++)
      {
        $idObligacionXcliente= mysqli_fetch_array ($consulta);
        $idObligacionXcliente=$idObligacionXcliente['id_oxc'];//obtengo un id de oxc
 
        $instruccion2 = "select obligacion_id from obligacionxcliente where id_oxc='.$idObligacionXcliente.' ";///con ese id busco el id de todas las obligaciones
        $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");

        $idObligacion= mysqli_fetch_array ($consulta2);//
        $idObligacion=$idObligacion['Obligacion_id'];

        $instruccionNombreInpuesto = "select impuesto from obligacion where id='$idObligacion' ";///con el id de onligaciones busco los nombres de esos impuestos
        $consulta3 = mysqli_query ($conexion, $instruccionNombreInpuesto) or die ("Fallo en la consulta");

        $Obligacion= mysqli_fetch_array ($consulta3);
        
        $obligaciones[$n]=$Obligacion['impuesto'];///los guardo en un vector(los nombres obviamente se repiten  se podria evitar poniendo que n ose repitan en la consulta 1)
        
            
         

      }
     
       

      


     

if ($_SESSION['usuario_valido']!="")
   {
     


?>


<div class="container">
    <div class="col-11">
      <table class="table table-striped"  style="float:center; height:20%;" > 
            <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">#</th>
                      <th scope="col">cuota</th>
                      <th scope="col">anticipo</th>
                      <th scope="col">periodo</th>
                      <th scope="col">estado</th>
                      <th scope="col">comentarios</th>
                  </tr>
            </thead>
            <tbody>
                   <tr>
                     <th scope="row">aca iria el impuesto</th>
      <?PHP
     /* for($n=0;$n<$nfilas;$n++){
        $resultado= mysqli_fetch_array ($consulta);*/
       print('<td>persona</td>
              <td>  </td>
              <td>@mdo</td>
              <td>persona</td>
              <td>Otto</td>
              <td>@mdo</td>
           ');

      //}
      
      ?>
                    </tr>

            </tbody>
    </table>
  </div>
</div>
<?PHP
   }
else
   {
     header("Location: index.php");
        exit();
   }
  ?>

