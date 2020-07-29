<?PHP
 session_start ();
  ?>
  <?php
if ($_SESSION['usuario_valido']!="")
   {
     
     ?>
<HEAD>
<TITLE>CONTAONLINE</TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




<style type="text/css">
  .forma{
  display: inline-block;

}
  #rectangulo {
  width: 90px;
  height: 25px;
   
  justify-content: center;
  align-items: center;
  text-align: center;
 
  
}

#rectangulo > h5{
  font-family: sans-serif;
  color: black;
  font-size: 5px;
  font-weight: bold;
}
</style>
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
     
       

      


     



?>


<div class="container">
  <div class="container">
    <center>
    <div class="col-11">
      <table class="table table-striped"  style="float:center; height:20%;" > 
            <thead>
                  <tr>
                      <th scope="col">Cliente</th>
                      <th scope="col">Obligacion</th>
                      <th scope="col">Cuota</th>
                      <th scope="col">Anticipo</th>
                      <th scope="col">Periodo</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Comentario</th>
                      <th scope="col">Modificar estado de la obligacion</th>
                  </tr>
            </thead>
            <tbody>
                   
                  
      <?PHP
     /* for($n=0;$n<$nfilas;$n++){
        $resultado= mysqli_fetch_array ($consulta);*/
        $ins="select * from obligacionxcliente";
          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");///obtengo todos las filas de tablero de control
      $nfilas = mysqli_num_rows ($cons);

        for ($i=0; $i < $nfilas; $i++) {
        print('<tr>');
          $res= mysqli_fetch_array ($cons);
          $ins1="select * from cliente where cuit='".$res['Cliente_cuit']."'";
          $cons1= mysqli_query ($conexion, $ins1) or die ("Fallo en la consulta");
          $res1= mysqli_fetch_array ($cons1);
          print(' <td>'.$res1['nombre'].' '.$res1['apellido'].'</td>');
           $ins2="select * from obligacion where id='".$res['Obligacion_id']."'";
          $cons2= mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta");
          $res2= mysqli_fetch_array ($cons2);
           print('<td id="impuesto"> '.$res2['rubro'].' | '.$res2['impuesto'].'</td>');
          $cuit=substr("".$res['Cliente_cuit']."", -1);;
          print('<td>--</td>
              <td>--</td>');
         $ins3="select * from vencimientos where id_obligacion='".$res['Obligacion_id']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);
         setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_anterior = date('F', strtotime('-1 month'));//para tener el mes anterior el %B es para tener el nombre del mes entero para tener "julio" en vez de "jul"
           print('<td style="height:10px">' .$res3[''.strftime("%B").''].' / '.strftime("%B").'<BR>' .$res3[''.strftime("%B", strtotime($mes_anterior)).''].' / '.strftime("%B",strtotime($mes_anterior)).' </td>
                  
           <td id="rectangulo"  class="forma" style="background:#55D6D2;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>Presentado</h6> </td>
           <td id="rectangulo"  class="forma" style="background:#FA7564;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Vencido</h6> </td> 
           <td id="rectangulo"  class="forma" style="background:#FDB813;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Vencido</h6> </td> 
           

              <td><button value=" " class="btn btn-primary" name="" > <i class="fas fa-plus-circle"></i></button></td>

              <td> <button value="'.$res1['nombre'].'"  id="abrirModal"  class="btn btn-primary openBtn" name="" > <i class=" fa fa-wrench"></i></button>  </td>

              </tr>');

        }
       

      //}
      
    ?>
                   
            </tbody>
    </table>





  </div>


  </center>





</div>
</div>




<!-- MODAL -->



<div class="modal fade" id="modalTableroControl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modificar estado de una obligacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
         <div class="modal-body">
                <label id="nombreCliente" > - </label>
                <label id="impuesto" ></label>




                <div class="card" style="width:50%; height:30%;">
                  <div class="card-header">  Archivos adjuntos </div>
                <div class="card-body">
               <blockquote class="blockquote sm-0">
                 <p>DDJJ</p>
                 <p>Ticket</p>
                 <p>VEP</p>
                 <p>Compensacion</p>
                 <p>Archivos Opcionales</p>
                 <footer class="blockquote-footer"> </footer>
                </blockquote>
               </div>
              </div>
                

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarUsuario">
       
        </button>
       
      </div>
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




<script>
  $(document).ready(function(){
    $("#abrirModal").click(function(){

      cliente=$('#abrirModal').val();
      impuesto=$('#impuesto').val();
     

        $("#nombreCliente").append(cliente);
        $("#impuesto").append(impuesto);///esto muestra nada
        $("#modalTableroControl").modal("show");

    });
});

</script>
<!-- 
<script>
$('.openBtn').click(function(){
    $('.modal-body').load('contenidoModal.php',function(){
        $('#modalTableroControl').modal({show:true});
    });
});
</script>
-->
