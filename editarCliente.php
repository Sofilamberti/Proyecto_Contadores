<?PHP
 session_start ();
 ?>
        <?PHP 
        include ("menu.php");
        include ("conexion.php");


        $cuit=$_GET["cuit"];
    
    

        $instruccion= "select * from cliente where cuit='$cuit'";

        $consulta = mysqli_query ($conexion, $instruccion) or die ("errro al elimianr al usuario"); 
       




       $instruccion2 = "select * from tiposocietario";
         $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
           $filas=mysqli_num_rows ($consulta2);
        ?>

 <head>
     <link rel="stylesheet" type="text/css" href="alertify.css" >
    <link rel="stylesheet" type="text/css" href="semantic.css" >
    <link rel="stylesheet" type="text/css" href="default.css" >

    <script src="alertify/alertify.js"></script>

    <script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </head>       

    

<div   class="container-fluid"   style="width: 18rem;" >
<div class="card text-center">
  <div class="card-header">
    Edicion de datos de usuario
  </div>
  <div class="card-body" name="userData" id="userData">
      <form method="GET" id="formdata"> 
  <?PHP
           $cliente = mysqli_fetch_array ($consulta);
           print('
            <label>Nombre de cliente</label>
            <input type="text"  value="'.$cliente['nombre'].'" name="nombre" id="nombre" class="form-control input-sm">
                <label>Apellido</label>
                <input type="text" value="'.$cliente['apellido'].'"  name="apellido" id="apellido"  class="form-control"">
                 <label>cuit</label>
                  <input type="number"  value="'.$cliente['cuit'].'" name="cuit" id="cuit" class="form-control input-sm" disabled >
                <label>dni</label>
                  <input type="number" value="'.$cliente['dni'].'" name="dni" id="dni"  class="form-control input-sm">

                <label>email</label>
                  <input type="text"   value="'.$cliente['email'].'" name="email" id="email"  class="form-control input-sm">
                <label>Tipo Societario</label>
                <select id="tipo_soc" name="tipo_soc" >
                   <option  disabled> Seleccione un Tipo Societario </option>');
                        
                            for($i=0; $i<$filas; $i++){
                              $result= mysqli_fetch_array ($consulta2);
                             print('<option value="'.$result['tipo_societario'].'">'.$result['tipo_societario'].'</option>');
                                                      }
                           
                           
                           
                        
                 print('</select>
                       <label>domicilio fiscal</label>
                    <input type="text" value="'.$cliente['domicilio_fiscal'].'" name="domicilio_fiscal" id="domicilio_fiscal" class="form-control input-sm">
                  <label>domicilio legal</label>
                    <input type="text" value="'.$cliente['domicilio_legal'].'" name="domicilio_legal" id="domicilio_legal"  class="form-control input-sm">

                  ');
       //print('<input type="hidden" class="form-control" value="'.$cuit.'" id="cuit" name="cuit">');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Datos" />
    </form> 
  </div>
  <div class="card-footer ">
  
       
  </div>
</div>

</div>
<?PHP
if (isset($_GET['submit'])) {
$cuit=$_GET["$cuit"];
  $v1= $_GET["nombre"];
   $v2= $_GET["apellido"];
   //$v3= $_GET["cuit"];
   $v4= $_GET["dni"];
   $v5= $_GET["email"];
   $v6= $_GET["tipo_soc"];
   $v7= $_GET["domicilio_fiscal"];
   $v8= $_GET["domicilio_legal"];

       $id_cuenta=$_SESSION['cuenta'];

  
  $instruccion = "update  cliente  set nombre='$v1', apellido='$v2', dni='$v4',email='$v5',TipoSocietario_tipo_societario='$v6',domicilio_fiscal='$v7',domicilio_legal='$v8',cuenta_id='$id_cuenta' where cuit='$cuit'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

    echo '<script language="javascript">alert("Se han modificado los datos con exito con exito");window.location.href="clientes.php"</script>';
  }
?>