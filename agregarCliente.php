<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["nombre"];
   $v2= $_GET["apellido"];
   $v3= $_GET["cuit"];
   $v4= $_GET["dni"];
   $v5= $_GET["email"];
   $v6= $_GET["tipoSocietario"];
   $v7= $_GET["domicilio_fiscal"];
   $v8= $_GET["domicilio_legal"];
   $v9= $_GET["condicion"];

       $id_cuenta=$_SESSION['cuenta'];

   $instruccion = "insert into cliente (nombre, apellido, cuit, dni, email, TipoSocietario_tipo_societario, domicilio_fiscal, domicilio_legal,condicion, cuenta_id)  values ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9','$id_cuenta')";
      mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla");
      $pathname="./".$v3."/Otra_Doc";
      $mode = 0777;
      $recursive = TRUE;
      $miSubCarpeta="/Doc_Varios/";
      $sub1="/DDJJ IVA/";
      $sub2="/DDJJ GANANCIAS/";
      $sub3="/DDJJ IIBB/";
      $sub4="/DDJJ SUSS/";
     

      mkdir ( $pathname, $mode, $recursive);
      mkdir ("./".$v3."/" . $miSubCarpeta."", $mode);
      mkdir ("./".$v3."/" . $miSubCarpeta."".$sub1."", $mode);
      mkdir ("./".$v3."/" . $miSubCarpeta."".$sub2."", $mode);
      mkdir ("./".$v3."/" . $miSubCarpeta."".$sub3."", $mode);
      mkdir ("./".$v3."/" . $miSubCarpeta."".$sub4."", $mode);





         
?>


