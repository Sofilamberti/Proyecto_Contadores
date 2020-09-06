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
      <table class="table table-striped"  id="panel" style="float:center; height:20%;" > 
            <thead>
                  <tr>
                      <th scope="col" onclick="sortTable(0, 'str')">Cliente</th>
                      <th scope="col" onclick="sortTable(1, 'str')">Obligacion</th>
                      <th scope="col" onclick="sortTable(2, 'str')">Cuota</th>
                      <th scope="col" onclick="sortTable(3, 'str')">Anticipo</th>
                      <th scope="col" onclick="sortTable(4, 'date')">Periodo</th>
                      <th scope="col" onclick="sortTable(5, 'str')">Estado</th>
                      <th scope="col" >Modificar</th>
                  </tr>
            </thead>
            <tbody>
                   
                  
      <?PHP
      $id_cuenta=$_SESSION['cuenta'];
      $id=$_SESSION['usuario_valido'];
     /* for($n=0;$n<$nfilas;$n++){
        $resultado= mysqli_fetch_array ($consulta);*/
        $ins="select * from oxcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."'";

          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($cons);

        for ($i=0; $i < $nfilas; $i++) {
           $res= mysqli_fetch_array ($cons);
            $ins1="select * from cliente where cuit='".$res['cuit_cliente']."'";
          $cons1= mysqli_query ($conexion, $ins1) or die ("Fallo en la consulta");
          $res1= mysqli_fetch_array ($cons1);
          $cuit=substr("".$res['cuit_cliente']."", -1);;
        
           $ins2="select * from obligacion where id='".$res['id_ob']."'";
          $cons2= mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta");
          $res2= mysqli_fetch_array ($cons2);
          $ins3="select * from vencimientos where id_obligacion='".$res['id_ob']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);
          for($j=0;$j<2;$j++){
        print('<tr>');

          print(' <td value="'.$res1['nombre'].'  '.$res1['apellido'].'">'.$res1['nombre'].' '.$res1['apellido'].'</td>');
         
           print('<td value="'.$res2['impuesto'].'">  '.$res2['impuesto'].'</td>');
          
          print('<td style="display:none" value="'.$res1['email'].'"></td>
            <td>--</td>
              <td>--</td>');
        /* $ins3="select * from vencimientos where id_obligacion='".$res['Obligacion_id']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);*/
         setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_siguiente = date('F', strtotime('+1 month'));//para tener el mes anterior el %B es para tener el nombre del mes entero para tener "julio" en vez de "jul"
         if($j==0){
           print('<td style="height:10px" value=" ' .$res3[''.strftime("%B").''].'">' .$res3[''.strftime("%B").''].'</td>');
         }elseif ($j==1) {
           print('<td style="height:10px" value="' .$res3[''.strftime("%B", strtotime($mes_siguiente)).''].'">' .$res3[''.strftime("%B", strtotime($mes_siguiente)).''].' </td>');
         }
            
                  
           print('<td> <div id="rectangulo"  class="forma" style="background:#55D6D2;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>Presentado</h6> </div> <br>
           <div id="rectangulo"  class="forma" style="background:#FA7564;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Vencido</h6> </div> <br>
           <div id="rectangulo"  class="forma" style="background:#FDB813;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Pendiente</h6> </td> 

            <input  type="hidden"  value="'.$res2['rubro'].' | '.$res2['impuesto'].'"  id="impuesto">
           
           


              <td> <button value="'.$res1['cuit'].'"  id="abrirModal"  class="btn btn-primary openBtn" name="" > <i class=" fa fa-wrench"></i></button>  </td>

              </tr>');
         }

        }
       //repito lo mismo para agregar las tareas al tablero de control
        $ins="select * from txcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."'";

          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($cons);
        
        for ($i=0; $i < $nfilas; $i++) {
           $res= mysqli_fetch_array ($cons);
            $ins1="select * from cliente where cuit='".$res['cuit_cliente']."'";
          $cons1= mysqli_query ($conexion, $ins1) or die ("Fallo en la consulta");
          $res1= mysqli_fetch_array ($cons1);
          $cuit=substr("".$res['cuit_cliente']."", -1);;
        
           $ins2="select * from tarea where id='".$res['id_tarea']."'";
          $cons2= mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta");
          $res2= mysqli_fetch_array ($cons2);
          
          
        print('<tr>');

          print(' <td value="'.$res1['nombre'].'  '.$res1['apellido'].'">'.$res1['nombre'].' '.$res1['apellido'].'</td>');
         
           print('<td value="'.$res2['nombre'].'">  '.$res2['nombre'].'</td>');
          
          print('<td style="display:none" value="'.$res1['email'].'"></td>
            <td>--</td>
              <td>--</td>');
        /* $ins3="select * from vencimientos where id_obligacion='".$res['Obligacion_id']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);*/
         setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_siguiente = date('F', strtotime('+1 month'));//para tener el mes anterior el %B es para tener el nombre del mes entero para tener "julio" en vez de "jul"
         
           print('<td style="height:10px" value=" ' .$res2['vencimiento'].'">' .$res2['vencimiento'].'</td>');
        
            
                  
           print('<td> <div id="rectangulo"  class="forma" style="background:#55D6D2;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>Presentado</h6> </div> <br>
           <div id="rectangulo"  class="forma" style="background:#FA7564;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Vencido</h6> </div> <br>
           <div id="rectangulo"  class="forma" style="background:#FDB813;padding:5px 2px; margin: 5px  1px 1px  1px;"><h6>Pendiente</h6> </td> 

            <input  type="hidden"  value="'.$res2['nombre'].' | '.$res2['descripcion'].'"  id="impuesto">
           
           
              <td> <button value="'.$res1['cuit'].'"  id="abrirModal"  class="btn btn-primary openBtn" name="" > <i class=" fa fa-wrench"></i></button>  </td>

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
                <label id="nombreCliente" > </label>
                <label id="obligacion" > - </label>
                <label id="vencimiento" > - </label>




                <div class="card" style="width:50%; height:30%;">
                  <div class="card-header">  Archivos adjuntos </div>
                <div class="card-body">
               <blockquote class="blockquote sm-0">
                 <p>DDJJ</p>
                 <p>Ticket</p>
                 <p>VEP</p>
                 <p>Compensacion</p>
                 <p>Archivos Opcionales</p>
                 <footer class="blockquote-footer">  </footer>
                </blockquote>
               </div>
              </div>
                

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"  id="agregarUsuario">
        Marcar como Realizado
        </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal"  id="agregarUsuario">
        Enviar
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
  $(document).on('click','.openBtn', function(e){ // funcion para cargar los datos al id="destinatarios"
  //e.preventDefault(); //evita que se recargue la pagina

  //$(this).attr("disabled",true);

  nombre_ap=$(this).parent().parent().children("td:eq(0)").text(); 
  impuesto=$(this).parent().parent().children("td:eq(1)").text(); 
  email=$(this).parent().parent().children("td:eq(2)").text(); 
  vencimiento=$(this).parent().parent().children("td:eq(5)").text(); 
  $("#nombreCliente").text(nombre_ap);
        $("#obligacion").text(impuesto);
        $("#contacto").text(email);
        $("#vencimiento").text(vencimiento);
        $("#modalTableroControl").modal("show");


});
 /* $(document).ready(function(){
    $("#abrirModal").click(function(){

      cliente=$('#abrirModal').val();
      impuesto=$('#impuesto').val();
      correo=$('#correo').val();

        $("#nombreCliente").text(cliente);
        $("#obligacion").text(impuesto);
        $("#contacto").text(impuesto);
        $("#modalTableroControl").modal("show");

    });
});*/
  //es para ordenar las filas de fechas, nombre y obligacion
function sortTable(n,type) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
 
  table = document.getElementById("panel");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
 
  /*Make a loop that will continue until no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare, one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place, based on the direction, asc or desc:*/
      if (dir == "asc") {
        if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="date" && x.innerHTML > y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="date" && x.innerHTML < y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
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
