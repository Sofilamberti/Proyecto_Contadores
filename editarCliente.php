<?PHP
 session_start ();
 ?>  <?PHP 
   if($_SESSION['usuario_valido']!=""){
     
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

    <style>
  .forma{
  display: inline-block;

}
  
#rectangle {
  width:140px; 
  height:42px; 
  
  justify-content: center;
  align-items: center;
  text-align: center;
 
  padding:20px 50px;
  margin: 10px   50px   20px   50px;
}
#rectangle > h3 {
  font-family: sans-serif;
  color: black;
  font-size: 25px;
  font-weight: bold;
  text-align: center;
}

</style>
 </head>       

    
<center>
  <div class="col-7">
    <h3>Edicion de datos de Cliente</h3>


      <form method="GET" id="formdata"> 
  <?PHP
           $cliente = mysqli_fetch_array ($consulta);
           print('
            <div class="form-row">
    <div class="form-group col-md-6">
                <div id="rectangle" style="background-color:#27B8CB;"><h3>Nombre</h3></div>
            <input type="text"  value="'.$cliente['nombre'].'" name="nombre" id="nombre" class="form-control input-sm">
              </div>
          <div class="form-group col-md-6">
               <div id="rectangle" style="background-color:#27B8CB;"><h3>Apellido</h3></div>
                <input type="text" value="'.$cliente['apellido'].'"  name="apellido" id="apellido"  class="form-control" >
                </div>
          </div>
           <div class="form-row">
    <div class="form-group col-md-6">
                   <div id="rectangle" style="background-color:#D16659;"><h3>Cuit</h3></div>
                  <input type="number"  value="'.$cliente['cuit'].'" name="cu" id="cu" class="form-control input-sm" readonly>
                  </div>
                  <div class="form-group col-md-6">
                 <div id="rectangle" style="background-color:#D16659;"><h3>DNI</h3></div>
                  <input type="number" value="'.$cliente['dni'].'" name="dni" id="dni"  class="form-control input-sm">
           </div>
                    </div>
                    <div class="form-row">
              <div class="form-group col-md-6">
                 <div id="rectangle" style="background-color: #FCC839;"><h3>Email</h3> </div>
                  <input type="text"   value="'.$cliente['email'].'" name="email" id="email"  class="form-control input-sm">
                  </div>
                   <div class="form-group col-md-6">
                 <div id="rectangle" style="background-color: #FCC839;"><h3>TipoSocietaro</h3> </div>
                <select class="form-control" id="tipo_soc" name="tipo_soc" >
                   <option  disabled> Seleccione un Tipo Societario </option>');
                        
                            for($i=0; $i<$filas; $i++){
                              $result= mysqli_fetch_array ($consulta2);
                             print('<option value="'.$result['tipo_societario'].'">'.$result['tipo_societario'].'</option>');
                                                      }
                           
                           
                           
                        
                 print('</select>
                  </div>
                  </div>
                  <div class="form-row">
              <div class="form-group col-md-6">
                     <div id="rectangle" style="background-color:#27B8CB;"><h3>Domicilio Fiscal</h3></div>
                     <BR>
                    <input type="text" value="'.$cliente['domicilio_fiscal'].'" name="domicilio_fiscal" id="domicilio_fiscal" class="form-control input-sm"></div>
                     <div class="form-group col-md-6">
                   <div id="rectangle" style="background-color:#27B8CB;"><h3>Domicilio Legal</h3></div><BR>
                    <input type="text" value="'.$cliente['domicilio_legal'].'" name="domicilio_legal" id="domicilio_legal"  class="form-control input-sm">
                  </div>
                    </div>

                  ');
       //print('<input type="hidden" class="form-control" value="'.$cuit.'" id="cuit" name="cuit">');
         ?>
            <input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Guardar Datos" />
    </form> 

</div>
  </center>

<?PHP
if (isset($_GET['submit'])) {

    //$cuit=$_GET["$cu"];
  $v1= $_GET["nombre"];
   $v2= $_GET["apellido"];
   $v3= $_GET["cu"];
   $v4= $_GET["dni"];
   $v5= $_GET["email"];
   $v6= $_GET["tipo_soc"];
   $v7= $_GET["domicilio_fiscal"];
   $v8= $_GET["domicilio_legal"];

       $id_cuenta=$_SESSION['cuenta'];

  
  $instruccion = "update  cliente  set nombre='$v1', apellido='$v2', dni='$v4',email='$v5',TipoSocietario_tipo_societario='$v6',domicilio_fiscal='$v7',domicilio_legal='$v8',cuenta_id='$id_cuenta' where cuit='$v3'";
  mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla de usuarios");

   echo '<script language="javascript">alert("Se han modificado los datos con exito con exito");window.location.href="clientes.php"</script>';
  }
}
?>