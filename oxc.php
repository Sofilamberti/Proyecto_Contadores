<?PHP
 session_start ();
  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?PHP include ("menu.php");
 include ("conexion.php");
?>
  <style>
     .btn.link {
        text-align: center;
        color:black;
      }
      
      

   </style>
</HEAD>

<BODY>
  
<?PHP
 include ("conexion.php");
if ($_SESSION['usuario_valido']!="")
   {

      
    


?>
<div class="container">
  <div class="container">
    <div class="container">


      <a href="/Proyecto_Contadores/bdd.php" ><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>



    <div class="col-12">

        <div id="tablaObligacion"> </div>
   </div>
</div>
   <!-- modal para agregar los datos de un usuario nuevo-->
   </div>

</div>
</body>




      <?PHP

  }

 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaObligacion').load('tablaObligaciones.php');
  });
</script>

<!--FALTARIA hacer un hash a la contraseña  para  seguridad-->
<script>
  $(document).ready(function(){
    $("#agregarObligacion").click(function(){

      rubro=$('#rubro').val();
      impuesto=$('#impuesto').val();
      
     
      cadena="rubro="+rubro+"&impuesto="+impuesto;

      $.ajax({
          url: "/Proyecto_Contadores/agregarObligacion.php?"+cadena,
        }).done(function(data) {
        $('#tablaObligacion').load('tablaObligaciones.php');
        alertify.success("Obligacion agregada con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          alertify.error("No se pudo agregar al nuevo usuario ");
          });


    });
});
</script>
