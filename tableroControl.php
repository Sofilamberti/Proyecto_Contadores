<?PHP
 session_start ();
  ?>
  <?php
if ($_SESSION['usuario_valido']!="")
   {
     
     ?>
<HEAD>
<TITLE>CONTAONLINE</TITLE>
<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >

<script src="alertify/alertify.js"></script>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script> <!--sin este link no se carga la tabla -->


<style type="text/css">
  .forma{
  display: inline-block;

}
  #rectangulo {
  width: 90px;
  height: 25px;
   
  justify-content: center;
  align-items: center;
  text-align: center;
 
  
}

#rectangulo > h5{
  font-family: sans-serif;
  color: black;
  font-size: 5px;
  font-weight: bold;
}
/* estilo para boton subir archivo*/
.subir{
    padding: 5px 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
}
 
.subir:hover{
    color:#fff;
    background: #f7cb15;
}
</style>
<?PHP include ("menu.php");
      include ("conexion.php");
  

    /*  $instruccion = "select * from panel_de_control ";////FALTA ACLARAR QUE TRAIGA SOLO LOS CLIENTES DE LA CUENTA 
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");///obtengo todos las filas de tablero de control
      $filas = mysqli_num_rows ($consulta);
        
      for($n=0;$n<$nfilas;$n++)
      {
        $idObligacionXcliente= mysqli_fetch_array ($consulta);
        $idObligacionXcliente=$idObligacionXcliente['id_oxc'];//obtengo un id de oxc
 
        $instruccion2 = "select obligacion_id from obligacionxcliente where id_oxc='.$idObligacionXcliente.' ";///con ese id busco el id de todas las obligaciones
        $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");

        $idObligacion= mysqli_fetch_array ($consulta2);//
        $idObligacion=$idObligacion['Obligacion_id'];

        $instruccionNombreInpuesto = "select impuesto from obligacion where id='$idObligacion' ";///con el id de onligaciones busco los nombres de esos impuestos
        $consulta3 = mysqli_query ($conexion, $instruccionNombreInpuesto) or die ("Fallo en la consulta");

        $Obligacion= mysqli_fetch_array ($consulta3);
        
        $obligaciones[$n]=$Obligacion['impuesto'];///los guardo en un vector(los nombres obviamente se repiten  se podria evitar poniendo que n ose repitan en la consulta 1)
        
            
         

      }*/
     
       

      


     



?>


<div class="container">
  <div class="container">
    <center>
    <div class="col-11" id="panel" name="panel">
     
     <div id="tablero"> </div>
        </div>
      </center>
    </div>
  </div>
  <?PHP

    }
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#tablero').load('tablero.php');
  });
</script>