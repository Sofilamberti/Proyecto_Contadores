<?PHP
 session_start ();


if ($_SESSION['usuario_valido']!="")
   {

  ?>
  <HTML>
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
  
#rectangle {
  width:730px; 
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
  $id=$_SESSION['usuario_valido'];

         $instruccion = "select * from usuario where id_user='".$id."'";
         $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
            $res2= mysqli_fetch_array ($consulta2);
        if($res2['id_rol']==1){
?>
<center>

		<div class="col-7">
			 <BR>
			 <form ACTION="" METHOD="POST" enctype="multipart/form-data">
                <div  id="rectangle" style="background: #FA7564" align="left"><h3>Este mensaje se enviara a todos los clientes</h3></div>
                 
                <BR>
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
		 //$file=$_FILES['archivos[]'];
       $archivos = $_FILES['archivos'];
		$nombre_archivos = $archivos['name'];
		$ruta_archivos = $archivos['tmp_name'];
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
      $instruccion2 = "select * from cuenta where id='$id_cuenta'";
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");
	$consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
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
		$mail->setFrom("libreriarectorado@gmail.com",$resultado2['nombre_cuenta']);// este es desde el mail del que se envia y el nombre que aparece cuando llega, en este caso es el del estudio
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
    	// este for es para enviar a varios destinatarios, en este caso todos los clientes
		 for($i=0;$i<$nfilas;$i++){
  	 			$resultado = mysqli_fetch_array ($consulta);
  	 			$value=$resultado['email'];
				$mail->AddAddress($value); 
				
			}
		
		  $cond=$mail->Send();
    	
   if($cond){echo '<script language="javascript">alert("Se ha enviado el mail correctamente");window.location.href="comunicacion.php"</script>';}//verifico que el email se haya enviado bien
 
 }
}

else{
      ?>
      <br>
      <div class="container">
  <center>
  <div id="cartel" > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px; "> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
</div>
</center>
</div>
<?PHP
}
}
    else {
    header("Location: index.html");
            exit();
    }
?>
?>