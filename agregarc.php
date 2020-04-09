<?php 
    $conexion = mysqli_connect ("localhost", "root", "admin123");
      mysqli_select_db ($conexion,"contadores");

    $v1 =  utf8_decode($_POST['nombre']);
    $v2 =  utf8_decode($_POST['apellido']);
    $v3 =  utf8_decode($_POST['cuit']);
    $v4 =  utf8_decode($_POST['dni']);
    $v5 =  utf8_decode($_POST['email']);
    $v6 =  utf8_decode($_POST['tipoSocietario']);
    $v7 =  utf8_decode($_POST['domicilio_fiscal']);
    $v8 =  utf8_decode($_POST['domicilio_legal']);

  
 
$instruccion = "insert into cliente (nombre,apellido,cuit, dni,email,TipoSocietario_tipo_societario,domicilio_fiscal, domicilio_legal)  values('$v1',$v2','$v3','$v4','$v5','$v6','$v7','$v8')";

   
     echo $resultado=mysqli_query ($conexion, $instruccion);
    
   
 ?>