<?PHP
 
   session_start ();
if ($_SESSION['usuario_valido']!="")
   {
     
  ?>
  <HTML>
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

<script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
  .forma{
  display: inline-block;

}
  #rectangulo {
  width: 70px;
  height: 70px;
  background: #D9D9D9;
  border-radius: 50%;
   
  justify-content: center;
  align-items: center;
  text-align: center;
  
  padding:20px 10px; 
  
}

#rectangulo > a {
  font-family: sans-serif;
  color: black;
  font-size: 30px;
  font-weight: bold;
}
#rectangulo > h5{
  font-family: sans-serif;
  color: black;
  font-size: 20px;
  font-weight: bold;
}


</style>
<?PHP include ("menu.php");
  include ("conexion.php");
?>
</HEAD>

<BODY>


  
<?PHP
$id_cuenta=$_SESSION['cuenta'];
      $id=$_SESSION['usuario_valido'];
     /* for($n=0;$n<$nfilas;$n++){
        $resultado= mysqli_fetch_array ($consulta);*/
        $ins="select * from oxcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."'";

          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($cons);
         $cantIVA_DIA=0;
        $cantIIBB_DIA=0;
         $cantMTB_DIA=0;
        $cantSUSS_DIA=0;
        $cantIVA_MES=0;
        $cantIIBB_MES=0;
         $cantMTB_MES=0;
        $cantSUSS_MES=0;
        $cantIVA_SEM=0;
        $cantIIBB_SEM=0;
         $cantMTB_SEM=0;
        $cantSUSS_SEM=0;
        for ($i=0; $i < $nfilas; $i++) {
           $res= mysqli_fetch_array ($cons);
            $ins1="select * from cliente where cuit='".$res['cuit_cliente']."'";
          $cons1= mysqli_query ($conexion, $ins1) or die ("Fallo en la consulta");
          $res1= mysqli_fetch_array ($cons1);
          $cuit=substr("".$res['cuit_cliente']."", -1);;
        
           $ins2="select * from obligacion where id='".$res['id_ob']."'";
          $cons2= mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta");
          $res2= mysqli_fetch_array ($cons2);

          $ins3="select * from vencimientos where id_obligacion='".$res['id_ob']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);
          setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_siguiente = date('F', strtotime('+1 month'));
         if (date("D")=="Mon"){
          $week_start = date("Y/m/d");// en caso de que el dia actual sea lunes agarro ese lunes como comienzo de semana
       } else {
           $week_start = date("Y/m/d", strtotime('last Monday', time()));// aca agarro el lunes, el primer dia de la semana, en caso de que no estemos en lunes
       }
       
       $week_end = date("Y/m/d",strtotime('next Sunday', time()));// es el ultimo dia de la semana 

       $week_start1 = new DateTime($week_start);
        $week_end1 = new DateTime($week_end);

       $fecha_tabla= new DateTime($res3[''.strftime("%B").'']);
        //$fech=date("Y-m-d",$res3[''.strftime("%B").'']);
       date_default_timezone_set('America/Argentina/Buenos_Aires');
          if($res2['grupo']=="IVA" )
          {
            if( $res3[''.strftime("%B").''] == date('Y-m-d'))
            { //veo si vence hoy
              $cantIVA_DIA++;
              
            }
            if (($week_start1 <=  $fecha_tabla) &&  ($fecha_tabla< $week_end1)) 
            {//veo si vence esta semana 
                $cantIVA_SEM++;
            }
            if(date('m',strtotime($res3[''.strftime("%B").''])) == date('m')){
                  $cantIVA_MES++;
            }
          }
          if($res2['grupo']=="IIBB")
          {
            if($res3[''.strftime("%B").''] == date('Y-m-d'))
            {
              $cantIIBB_DIA++;
            }
            if (($week_start1 <=  $fecha_tabla) &&  ($fecha_tabla< $week_end1)) 
            {
              $cantIIBB_SEM++;
            }
            if(date('m', strtotime($res3[''.strftime("%B").''])) == date('m')){
                  $cantIIBB_MES++;
            }
          } 
          if($res2['grupo']=="MTB")
          {
            if( $res3[''.strftime("%B").''] == date('Y-m-d'))
            {
              $cantMTB_DIA++;
            }
            if(($week_start1 <=  $fecha_tabla) &&  ($fecha_tabla< $week_end1))
            {
              $cantMTB_SEM++;
            }
            if(date('m', strtotime($res3[''.strftime("%B").''])) == date('m')){
                  $cantMTB_MES++;
            }
          }
          if($res2['grupo']=="SUSS")
          {
           if( $res3[''.strftime("%B").''] == date('Y-m-d'))
           {
            $cantSUSS_DIA++; 
            }
            if(($week_start1 <=  $fecha_tabla) &&  ($fecha_tabla< $week_end1))
            {
              $cantSUSS_SEM++;
            }
            if(date('m', strtotime($res3[''.strftime("%B").''])) == date('m')){
                  $cantSUSS_MES++;
            }
          }
        }
        ?>
        <div class="container">
  <div class="container">
    <div class="col-11" >
      <br>
     <div class="card-deck">
  <div class="card" style="background-color:white; border: none;"   >
    <div class="card-body">
    <center>

      <h4 class="card-title" style="font-family: Bahnschrift Condensed; font-size: 25px;" ><center>HOY Vence  </center></h4>
      <div class="container">
      <div class="container">
       <div class="form-row">
    <div class="form-group col-md-6">
      <label for="IVA" style="font-size: 20px;">IVA</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IVA"><?php print($cantIVA_DIA)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="IIBB" style="font-size: 20px;">IIBB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IIBB"><?php print($cantIIBB_DIA)?></h5></div>
    </div>
  </div>
   
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="MTB"  style="font-size: 20px;">MTB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="MTB"><?php print($cantMTB_DIA)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="SUSS"  style="font-size: 20px;">SUSS</label>
      <div  id="rectangulo"  class="forma"><h5 id="SUSS"><?php print($cantSUSS_DIA)?></h5></div>
    </div>
  </div>
</div>
</div>
    </div>
    <?PHP
    
    ?>
  </div>
  <div class="card" style="background-color:white; border: none;">
    <center>
    <div class="card-body">
       <h4 class="card-title" style="font-family: Bahnschrift Condensed; font-size: 25px;"><center> SEMANA Vence  </h4>
  <div class="container">
      <div class="container">
       <div class="form-row">
    <div class="form-group col-md-6">
      <label for="IVA" style="font-size: 20px;">IVA</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IVA"><?php print($cantIVA_SEM)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="IIBB" style="font-size: 20px;">IIBB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IIBB"><?php print($cantIIBB_SEM)?></h5></div>
    </div>
  </div>
   
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="MTB"  style="font-size: 20px;">MTB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="MTB"><?php print($cantMTB_SEM)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="SUSS"  style="font-size: 20px;">SUSS</label>
      <div  id="rectangulo"  class="forma"><h5 id="SUSS"><?php print($cantSUSS_SEM)?></h5></div>
    </div>
  </div>
</div>
</div>
    </div>
    </center>
  </div>
  <div class="card"style="background-color:white; border: none;">
    <center>
    <div class="card-body">
    <h4 class="card-title" style="font-family: Bahnschrift Condensed; font-size: 25px;"><center> MES Vence  </h4>
    <div class="container">
      <div class="container">
       <div class="form-row">
    <div class="form-group col-md-6">
      <label for="IVA" style="font-size: 20px;">IVA</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IVA"><?php print($cantIVA_MES)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="IIBB" style="font-size: 20px;">IIBB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="IIBB"><?php print($cantIIBB_MES)?></h5></div>
    </div>
  </div>
   
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="MTB"  style="font-size: 20px;">MTB</label><br>
      <div  id="rectangulo"  class="forma"><h5 id="MTB"><?php print($cantMTB_MES)?></h5></div>
    </div>
    <div class="form-group col-md-6">
      <label for="SUSS"  style="font-size: 20px;">SUSS</label>
      <div  id="rectangulo"  class="forma"><h5 id="SUSS"><?php print($cantSUSS_MES)?></h5></div>
    </div>
  </div>
</div>
</div>
    </div>
     </center>
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

</BODY>
