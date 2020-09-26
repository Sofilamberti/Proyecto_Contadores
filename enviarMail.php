<?PHP
 session_start ();
   include ("conexion.php");
 include("PHPMailer-master/src/PHPMailer.php");
 include("PHPMailer-master/src/SMTP.php");
 include("PHPMailer-master/src/Exception.php");
 
$v1= $_POST["id_panel"];
$v2= $_POST["email"];
//$v3= $_POST["ddjj"];
$v4= $_POST["condicion"];
$v5= $_POST["importe"];
$v6= $_POST["obligacion"];
$v7= $_POST["vencimiento"];
$id_cuenta=$_SESSION['cuenta'];
$instruccion2 = "select * from cuenta where id='$id_cuenta'";  
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
      $resultado2 = mysqli_fetch_array ($consulta2);
      
      $arch= $_FILES['ddjj'];
	$ddjj =$arch['name'];
    $ruta_ddjj = $arch['tmp_name'];

    $arch1= $_FILES['vep'];
  $vep =$arch1['name'];
    $ruta_vep = $arch1['tmp_name'];
    $arch1= $_FILES['ticket'];
  $ticket =$arch1['name'];
    $ruta_ticket = $arch1['tmp_name'];
    $arch1= $_FILES['compensacion'];
  $compensacion =$arch1['name'];
    $ruta_compensacion = $arch1['tmp_name'];



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
  	$cuerpo="se adjunta archivos correspondiente a  ".$v6." cuyo vencimiento es  el dia ".$v7." . El saldo de la misma es de $".$v5.", ".$v4.". Saludos";
   //$cuerpo="probando archivo sin otros datos";
    $mail->Body = $cuerpo;
    if(isset($_FILES['ddjj'])){
    $mail->AddAttachment($ruta_ddjj,$ddjj);
	}	
	if(isset($_FILES['vep'])){
    $mail->AddAttachment($ruta_vep,$vep);
	}
	if(isset($_FILES['compensacion'])){
    $mail->AddAttachment($ruta_compensacion,$compensacion);
	}
	if(isset($_FILES['ticket'])){
    $mail->AddAttachment($ruta_ticket,$ticket);
	}

    $mail->AddAddress($v2);
   // print($cuerpo);
    //print($v2);
	$cond =$mail->Send();
	if($cond){
		print("se envioooooooo");
	}
	$instruccion = "update  panel_de_control  set estado='Realizado'  where id='$v1' ";
 	mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de panel");
  ?>