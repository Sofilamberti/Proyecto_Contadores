<?PHP
 session_start ();
   include ("conexion.php");
 include("PHPMailer-master/src/PHPMailer.php");
 include("PHPMailer-master/src/SMTP.php");
 include("PHPMailer-master/src/Exception.php");
 
/*$v1= $_GET["id_panel"];
$v2= $_GET["email"];
$v3= $_GET["ddjj"];
$v4= $_GET["condicion"];
$v5= $_GET["importe"];
$v6= $_GET["obligacion"];*/
//$v7= $_GET["vencimiento"];
$id_cuenta=$_SESSION['cuenta'];
$instruccion2 = "select * from cuenta where id='$id_cuenta'";  
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
      $resultado2 = mysqli_fetch_array ($consulta2);
  $ddjj = $_FILES['ddjj']['name'];
    $ruta_ddjj = $_FILES['ddjj']['tmp_name'];


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail-> isSMTP();
    $mail->Host = "smtp.gmail.com";// seteo el host
    $mail->Port = "587";//seteo el puerto
    $mail->SMTPAuth="login";//esto ni idea
    $mail->SMTPSecure="tls";// esto creo que es como un encriptaod o algo asi
    $mail->Username = "libreriarectorado@gmail.com";// mail remitente
    $mail->Password = "libreria10"; //contraseña del mail
    $mail->AddReplyTo($resultado2['email']);// este es el mail al que deben responder, seria el del estudio
    
    $mail->Subject = "Notificacion Vencimiento";
    $mail->setFrom("libreriarectorado@gmail.com",$resultado2['nombre_cuenta']);// este es desde el mail del que se envia y el nombre que aparece cuando llega, en este caso es el del estudio para esto hago la consulta2
    $mail->isHTML(true);
  	//$cuerpo="se adjunta archivos correspondiente a  ".$v6." cuyo vencimiento es  el dia............. . El saldo de la misma es de $".$v5.", ".$v4.". Saludos";
   $cuerpo="probando archivo sin otros datos"
    $mail->Body = $cuerpo;
    $mail->AddAttachment($ruta_ddjj,$ddjj);
    $mail->AddAddress("slamberti16@gmail.com");
   // print($cuerpo);
    //print($v2);
	$cond =$mail->Send();
	if($cond){
		print("se envioooooooo");
	}
	//$instruccion = "update  panel_de_control  set estado='Realizado'  where id='$v1' ";
 // mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de panel");
  ?>