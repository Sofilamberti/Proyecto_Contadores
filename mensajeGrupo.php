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
  width:550px; 
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
 include("PHPMailer-master/src/PHPMailer.php");
 include("PHPMailer-master/src/SMTP.php");
 include("PHPMailer-master/src/Exception.php");
?>
<center>

		<div class="col-7">
			 <BR>
			 <form ACTION="" METHOD="POST" enctype="multipart/form-data">
                <div  id="rectangle" style="background: #FCC839" align="left"><h3>Mensaje para grupo de clientes</h3></div>
                 
                <BR>
                <h5 align="left" >Seleccione los clientes:</h5>
                              <div align="left">
                <input type="text" class="form-control"  id="search" placeholder="filtrar">

                </table>
              <div id="resultados" class="my-3"></div>
               
               <div align="left">
               <div style="height: 150px;overflow: auto;" >
               <?PHP 
               $id_cuenta=$_SESSION['cuenta'];
                $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
                $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta"); 
                 $nfilas = mysqli_num_rows ($consulta);
                  ?>
                     <table   align="left" style="border-collapse: separate; border-spacing: 0 10px; width: 100%;"  name="tablaClientes" id="tablaClientes" >
                      <tbody>
                  <?PHP
                  for($i=0;$i<$nfilas;$i++){
                  $resultado = mysqli_fetch_array ($consulta);
                  print('<tr>
                                
                              <td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px">'.$resultado['nombre'].'</td>
                              <td  class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px">'.$resultado['apellido'].'</td>
                              <td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px">'.$resultado['email'].'</td>
                              <td>
                              <button value="comprarLibro" title="Agregar a la lista" class="btn btn-primary btn-cargar" id="'.$resultado['cuit'].'" aling="right">
                              <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            </button></td>
                            <td style="visibility: hidden " id="'.$resultado['cuit'].'" name="'.$resultado['cuit'].'">'.$resultado['cuit'].'</td>
                            </tr>');
                        }
               ?>
           
               </tbody>
                </table>
                 </div>
               </div>
                <h5 align="left" >Destinatarios:</h5>
                <div align="left" >
                  <!-- ESTE ESPACIO ES PARA CUANDO SELECCIONE LOS DESTINATARIOS SE MUESTREN ACA-->
                      <table align="left" style="border-collapse: separate; border-spacing: 0 10px; width: 100%;" id="destinatarios">
                      <tbody>

                        </tbody>
                    </table>
                </div>
                <br>
                <h5 align="left">Asunto</h5>
                <input type="text" name="asunto" id="asunto" value="" class="form-control"> <br>
                <h5 align="left">Cuerpo del Mensaje</h5>
                <textarea class="form-control" id="cuerpo" name="cuerpo"rows="5"></textarea>
                <br>
                <div align="left">
         
                <input id="archivos" type="file"   name="archivos[]"   multiple="multiple" />
            </div>
                <br>
                <div align="right">
                <input  type="submit" class="btn btn-primary"  id="enviar" name="enviar" value=" Enviar Mail" > </div>
        
            </form>
          </div>     
          
</center>
<?PHP
if (isset($_POST['enviar']) ) {

    $asunto=$_POST['asunto'];
    $cuerpo=$_POST['cuerpo'];
     $id_cuenta=$_SESSION['cuenta'];
     $destino=$_POST['emails'];
       $archivos = $_FILES['archivos'];
    $nombre_archivos = $archivos['name'];
    $ruta_archivos = $archivos['tmp_name'];
      $instruccion2 = "select * from cuenta where id='$id_cuenta'";  
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
      $resultado2 = mysqli_fetch_array ($consulta2);
  
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail-> isSMTP();
    $mail->Host = "smtp.gmail.com";// seteo el host
    $mail->Port = "587";//seteo el puerto
    $mail->SMTPAuth="login";//esto ni idea
    $mail->SMTPSecure="tls";// esto creo que es como un encriptaod o algo asi
    $mail->Username = "libreriarectorado@gmail.com";// mail remitente
    $mail->Password = "libreria10"; //contraseña del mail
    $mail->AddReplyTo($resultado2['email']);// este es el mail al que deben responder, seria el del estudio
    $mail->Subject = $asunto;
    $mail->setFrom("libreriarectorado@gmail.com",$resultado2['nombre_cuenta']);// este es desde el mail del que se envia y el nombre que aparece cuando llega, en este caso es el del estudio para esto hago la consulta2
    $mail->isHTML(true);
  
    $mail->Body = $cuerpo;
    //adjunta varios archivos]
    if(isset($_FILES['archivos'])){
     $i = 0;
    
      foreach ($ruta_archivos as $rutas_archivos) {
          $mail->AddAttachment($rutas_archivos,$nombre_archivos[$i]);
          $i++;
      }
      }
      // este for es para enviar a varios destinatarios, en este caso los clientes seleccionados
     foreach($destino as $des){
          
        $mail->AddAddress($des); 
        $cond=$mail->Send();
        '<script language="javascript">alert("'.$des.'")</script>';
      }
    
    
      
   echo '<script language="javascript">alert("Se ha enviado el mail correctamente");window.location.href="comunicacion.php"</script>';
 
 }
}
?>
<script type="text/javascript">

$(document).on('click','.btn-cargar', function(e){ // funcion para cargar los datos al id="destinatarios"
  e.preventDefault(); //evita que se recargue la pagina

  $(this).attr("disabled",true);

  nombre=$(this).parent().parent().children("td:eq(0)").text(); 
  apellido=$(this).parent().parent().children("td:eq(1)").text(); 

  email=$(this).parent().parent().children("td:eq(2)").text(); 
  cuit=$(this).parent().parent().children("td:eq(4)").text(); 

  agregarMail(cuit,nombre,apellido,email);
});
function agregarMail(cuit,nombre,apellido,email) {
   //esto le da un estilo, para que quede lindo
    var htmlTags = '<tr>'+'<td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px" value="" readonly><input type="hidden" value="'+nombre+'"> '+nombre+'</td>'+
    '<td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px" value="" readonly><input type="hidden" value="'+apellido+'"> '+apellido+' </td>'+
      '<td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px" value="" readonly><input type="hidden" name="emails[]" value="'+email+'">'+email+'</td>'+
      '<td class="bg-light border-bottom border-gray rounded text-center px-2" style="font-size:15px; visibility: hidden " value=""> <input type="hidden" value="'+cuit+'"></td>'+
        '<td><button type="button" class="btn btn-danger btn-quitarMail" ><i class="fa fa-times"></i></button></td>'+
        
        '</tr>';
    
   $('#destinatarios tbody').append(htmlTags);
}
$(document).on('click','.btn-quitarMail', function(e){
  //funcion para sacar un destinatario
  e.preventDefault(); //evita que se recargue la pagina
  
  var cuit = $(this).closest('tr').find('td:eq(3)').find('input').attr('value');
 
  $(this).parent().parent().remove();

  $('#'+cuit).attr("disabled",false); //el boton para elegir el cliente vuelve a estar activado
});
//funcion para buscar en la tabla de clientes
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