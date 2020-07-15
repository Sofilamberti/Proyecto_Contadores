<?PHP
 session_start ();
  
 ?>
<html>
<head>
  <?PHP 

   if($_SESSION['usuario_valido']!=""){
    include ("menu.php");
    include ("conexion.php");
    ?>

<TITLE>CONTAONLINE</TITLE>
<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script> <!--sin este link no se carga la tabla -->

</head>
<body>

<?PHP
   
  

      $instruccion2 = "select * from tiposocietario";
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");
      $filas=mysqli_num_rows ($consulta2);

   ?>
      




   <div class="container">
    <div class="container">
      <div class="container">
    <a href="/Proyecto_Contadores/bdd.php" ><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>
    <?PHP
$id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){
    ?>
    <div class="col-12">
 <div style="float:right;">
<caption>
      <button class="btn btn-primary" style="background-color:#FDB813; color:white;" data-toggle="modal" data-target="#modalCliente">
        Agregar nuevo 
      <span class="glyphicon glyphicon-plus"></span>
      </button>
</caption>
</div>
<?PHP
}
?>

        <div id="tabla"> </div>
        </div>
   </div>
 </div>
</div>

   <!-- modal para agregar los datos de un cliente nuevo-->
   
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
         <div class="modal-body">
           <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nombre</label>
                  <input type="text"   name="" id="nombre" class="form-control input-sm">
                </div>
                <div class="form-group col-md-6">
                <label>Apellido</label>
             
                  <input type="text"   name="" id="apellido" class="form-control input-sm">
                   </div>
            </div>
           
           <div class="form-row">
            <div class="form-group col-md-6">
                <label>Cuit</label>
                  <input type="number" name="" id="cuit" class="form-control input-sm" ></div>
            <div class="form-group col-md-6">
                <label>Dni</label>
                  <input type="number" name="" id="dni" class="form-control input-sm">
            </div>
          </div>
                <label>Email</label>
                  <input type="text"   name="" id="email" class="form-control input-sm">

              <label>Tipo de Societario</label>
                <select id="tipoSocietario" name="tipoSocietario" class="form-control" >
                   <option value='' disabled>Seleccione una opcion</option>
                         <?PHP 
                           if($filas>0)
                           {
                            for($i=0; $i<$filas; $i++){
                              $result= mysqli_fetch_array ($consulta2);
                             print('<option value="'.$result['tipo_societario'].'">'.$result['tipo_societario'].'</option>');
                                                      }
                             print('</select>');
                           }
                          ?>
                    <div class="form-row">
            <div class="form-group col-md-6">
                  <label>Domicilio Fiscal</label>
                    <input type="text" name="" id="domicilio_fiscal" class="form-control input-sm"></div>
                      <div class="form-group col-md-6">
                  <label>Domicilio Legal</label>
                    <input type="text" name="" id="domicilio_legal" class="form-control input-sm">
                  </div>
                </div>
  
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="agregarCliente">
        Agregar
        </button>
       
      </div>
    </div>
    
    </div>
</div>
</body>
</html>
<?PHP
}
else {
header("Location: index.html");
        exit();
}
?>

    
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('tabla.php');
  });
</script>


<script>
  $(document).ready(function(){
    $("#agregarCliente").click(function(){

      nombre=$('#nombre').val();
      apellido=$('#apellido').val();
      cuit=$('#cuit').val();
      dni=$('#dni').val();
      email=$('#email').val();
      tipoSocietario=$('#tipoSocietario').val();
      domicilio_fiscal=$('#domicilio_fiscal').val();
      domicilio_legal=$('#domicilio_legal').val();
         


      cadena="nombre="+nombre+ 
      "&apellido="+apellido+
      "&cuit="+cuit+
      "&dni="+dni+
      "&email="+email + 
      "&tipoSocietario="+tipoSocietario+
      "&domicilio_fiscal="+domicilio_fiscal+
      "&domicilio_legal="+domicilio_legal ;

      $.ajax({
          url: "/Proyecto_Contadores/agregarCliente.php?"+cadena,
        }).done(function(data) {
        $('#tabla').load('tabla.php');
        alertify.success("agregado con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          
          alertify.error("agregado con exito  ");
          });


    });
});
</script>
