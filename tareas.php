<?PHP
 
   session_start ();


  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
<?PHP include ("menu.php");
?>
  <style>
     h2 {
        text-align:center;
      }
      
      

   </style>
</HEAD>

<BODY>
<?PHP
if ($_SESSION['usuario_valido']!="")
   {
    $conexion = mysqli_connect ("localhost", "root", "")
         or die ("No se puede conectar con el servidor");
        mysqli_select_db ($conexion,"contadores")
         or die ("No se puede seleccionar la base de datos");
         $in2 = "select * from tarea order by vencimiento asc" ;
          $cons2 = mysqli_query ($conexion, $in2)
         or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);
         
          // $band=0;
    print('<BR>');
print('<BR>');
?>


      
<?PHP

print('<div class="col-11">');
print('                     ');
 print('<input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;">');
 print('</div>');
print('<BR>');
print('<center>');
print('<div class="col-11">');

print('<TABLE class="table table table-bordered table-hover" id="tareas" name="tareas">');
             print('<thead>');
      print('<TR>');
      print('<TH style="background-color:#9970E5;"><i class="fas fa-user-friends"></i>   Cliente </TH>');
      print('<TH style="background-color:#9970E5;" scope="row"><i class="far fa-sticky-note"></i> Obligacion </TH>');
       print('<TH style="background-color:#9970E5;" scope="row"> <i class="far fa-calendar-alt"></i>    Periodo  </TH>');
       print('<TH style="background-color:#9970E5;" scope="row"><i class="far fa-calendar-alt"></i>   Vencimiento  </TH>');
       print('<TH style="background-color:#9970E5;" scope="row"> <i class="fas fa-stream"></i>   Estado  </TH>');
  $i=0;
       print('</TR>');
      print('</thead>');
        for($h=0;$h<$nf;$h++){
          
            $res2 = mysqli_fetch_array ($cons2);
            $in3 = "select * from obligacionxcliente where id_oxc=".$res2['id_oxc']."" ;
              $cons3 = mysqli_query ($conexion, $in3)
            or die ("Fallo en la consulta 3");
            $res3 = mysqli_fetch_array ($cons3);
            $in4 = "select * from cliente where cuit=".$res3['Cliente_cuit'] ."";
            $cons4 = mysqli_query ($conexion, $in4)
            or die ("Fallo en la consulta 4");
            $res4= mysqli_fetch_array ($cons4);
            $in5 = "select * from obligacion where id=".$res3['Obligacion_id'] ."";
            $cons5 = mysqli_query ($conexion, $in5)
            or die ("Fallo en la consulta 4");
            $res5= mysqli_fetch_array ($cons5);
            $fec=strtotime($res2['periodo']);
            $mes = date("M", $fec);
        $anio = date("Y", $fec);
        print('<tbody>');
              print('<TR >');
              print('<TD>'.$res4['nombre'].'  '.$res4['apellido'].' </TD>');
            print('<TD>'.$res5['impuesto'].'</TD>');
            print('<TD>'.$anio.'-'.$mes. '</TD>');
            print('<TD>'.date("d-M-Y", strtotime($res2['vencimiento'])). '</TD>');
            if($res2['estado']=="Vencido"){
          
              print('<TD class="bg-danger" >'.$res2['estado']. '</TD>');
            
            }
            elseif($res2['estado']=="Pendiente"){
          
              print('<TD class="bg-warning" >'.$res2['estado']. '</TD>');
            
            }elseif($res2['estado']=="Realizado"){

          print('<TD class="bg-success" >'.$res2['estado']. '</TD>');
        }
        print('<TD><div class="btn-group" name="btnEnv"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modales" data-whatever="'.$res4['cuit'].'" ><i class="fas fa-share-square"></i></button> </div></TD>');
  
          
    
  $i=$i+1;
        }

            print('</tbody>');
       print('</table>');
       print('</div>');
  print('</center>');
   print('<div calss="conteiner">');
             print('<div class="modal fade" id="modales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');
  print('<div class="modal-dialog" role="document">');
   print(' <div class="modal-content">');
       print('<div class="modal-header">');
         print('<h5 class="modal-title" id="exampleModalLabel">Enviar Comprobantes a: </h5>');
        print(' <button type="button" class="close" data-dismiss="modal" aria-label="Close">');
         print('  <span aria-hidden="true">&times;</span>');
         print('</button>');
       print('</div>');
      print(' <div class="modal-body">');
        print(' <form>');
         print('<div class="col-8"> ');
        print('   <div class="form-group">');
       
         print('    <label for="recipient-name" class="col-form-label">Importe:</label>');
          print('   <input type="number" class="form-control" id="recipient-name" name="recipient-name">');
          print(' </div>');
          print(' <div class="form-group">');
        
      print('<label for="ejemplo_archivo_1"> <i class="fas fa-file-upload"></i> DDJJ: </label>');
      print('<input type="file" class="btn btn-default btn-file" id="ejemplo_archivo_1" required>');
      print('<label for="ejemplo_archivo_2"> <i class="fas fa-file-upload"></i> Ticket: </label>');
      print('<input type="file" class="btn btn-default btn-file" id="ejemplo_archivo_2">');
      print('<label for="ejemplo_archivo_3"> <i class="fas fa-file-upload"></i> VEP: </label>');
      print('<input type="file" class="btn btn-default btn-file" id="ejemplo_archivo_3">');
      print('<label for="ejemplo_archivo_4"> <i class="fas fa-file-upload"></i> Compensacion: </label>');
      print('<input type="file" class="btn btn-default btn-file" id="ejemplo_archivo_4">');
      print('<label for="ejemplo_archivo_5"><i class="fas fa-file-upload"></i> Otro Archivo: </label>');
      print('<input type="file"  class="btn btn-default btn-file" id="ejemplo_archivo_5">');
           print('</div>');
         print('</form>');
       print('</div>');
       print('</div>');
      print(' <div class="modal-footer">');
       print('  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
       print('  <button type="button" class="btn btn-primary">Send message</button>');
      print(' </div>');
     print('</div>');
  print(' </div>');
 print('</div>');
 print('</div>');

    ?>


    <script type="text/javascript">
    
      $('document').on("click", ".btnEnv", function() {
  //var button = $(e.relatedTarget) // Button that triggered the modal
  //var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this).closest('tr');
  nombre=modal.find('td:eq(0)').text();
  $("#recipient-name").val(nombre);
  //modal.find('.modal-body input').val(recipient)
});
    </script>

    <?PHP

      }
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>