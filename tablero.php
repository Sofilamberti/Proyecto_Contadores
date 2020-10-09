<?PHP
 session_start ();
  ?>
  <?php
if ($_SESSION['usuario_valido']!="")
   {
     
     ?>
<HEAD>
<TITLE>CONTAONLINE</TITLE>

<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<link rel="stylesheet" type="text/css" href="alertify.css" >
<link rel="stylesheet" type="text/css" href="semantic.css" >
<link rel="stylesheet" type="text/css" href="default.css" >


<script src="alertify/alertify.js"></script>

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
<?PHP 
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
    <div align="left">
    <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="filtrar" style=" width:250px; height:50px; margin-top:10px;margin-left:10px;"></div>
    <br>
    <center>

      <table class="table table-striped"  id="panel1" name="panel1" style="float:center; height:20%;" > 
            <thead>
                  <tr>
                      <th scope="col" onclick="sortTable(0, 'str')">Cliente</th>
                      <th scope="col" onclick="sortTable(1, 'str')">Obligacion</th>
                      <th scope="col" onclick="sortTable(2, 'str')">Cuota</th>
                      <th scope="col" onclick="sortTable(3, 'str')">Anticipo</th>
                      <th scope="col" onclick="sortTable(4, 'date')">Periodo</th>
                      <th scope="col" onclick="sortTable(5, 'str')">Estado</th>
                      <th scope="col" >Modificar</th>
                  </tr>
            </thead>
            <tbody>
                   
                  
      <?PHP
      $id_cuenta=$_SESSION['cuenta'];
      $id=$_SESSION['usuario_valido'];
     /* for($n=0;$n<$nfilas;$n++){
        $resultado= mysqli_fetch_array ($consulta);*/
        $ins="select * from oxcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."'";

          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($cons);

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

          for($j=0;$j<2;$j++){//hago este for para poder cargar el vencimiento del mes actual y del mes que sigue, por eso puse un 2

        print('<tr>');

          print(' <td value="'.$res1['nombre'].'  '.$res1['apellido'].'">'.$res1['nombre'].' '.$res1['apellido'].'</td>');
         
           print('<td value="'.$res2['impuesto'].'">  '.$res2['impuesto'].'</td>');
          
          print('
            <td>--</td>
              <td>--</td>');
        /* $ins3="select * from vencimientos where id_obligacion='".$res['Obligacion_id']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);*/
         setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_siguiente = date('F', strtotime('+1 month'));//para tener el mes anterior el %B es para tener el nombre del mes entero para tener "julio" en vez de "jul"
          date_default_timezone_set('America/Argentina/Buenos_Aires');
         if($j==0){
           print('<td style="height:10px" value=" ' .$res3[''.strftime("%B").''].'">' .$res3[''.strftime("%B").''].'</td>');

           $ins3="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_obligacion='".$res2['id']."' and vencimiento='".$res3[''.strftime("%B").'']."'";
          $cons5= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta");
           $nfilas3 = mysqli_num_rows ($cons5); 
           if($nfilas3==0){
            //en esta parte lo que hago es cargar a panel de control el vencimiento del mes actual, veo si esta, sino esta lo cargo.
            if($res3[''.strftime("%B").'']>= date('Y-m-d')){
            $ins4="insert into panel_de_control (estado, vencimiento, id_obligacion,cuit_cliente) values ('Pendiente','".$res3[''.strftime("%B").'']."','".$res2['id']."', '".$res1['cuit']."') ";
              $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
            }
            else{
            $ins4="insert into panel_de_control (estado, vencimiento, id_obligacion,cuit_cliente) values ('Vencido','".$res3[''.strftime("%B").'']."','".$res2['id']."', '".$res1['cuit']."') ";
            $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
            }
          }else{// aca lo que hago es ver si la fecha que esta cargada en el panel de control es menor a la actual y entonces cambio el estado a vencido, sino no hago nada
            for($h=0;$h<$nfilas3;$h++){
              $res5= mysqli_fetch_array ($cons5);
              if($res5['vencimiento']<date('Y-m-d')){
                $instruccion2 = "update  panel_de_control  set estado='Vencido'  where id='".$res5['id']."'";
              mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla de usuarios");
              }
            }
          }
          //aca hago la misma consulta para poder obtener el estado, la vuelvo a hacer para que cuando cargue una que no este ya cargada me lo tome bien aca.

          $ins5="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_obligacion='".$res2['id']."' and vencimiento='".$res3[''.strftime("%B").'']."'";
            $cons5= mysqli_query ($conexion, $ins5) or die ("Fallo en la consulta");
           $res5= mysqli_fetch_array ($cons5);
         }elseif ($j==1) { //aca cargo lo del mes siguiente igual que lo que esta arriba, hago exactamente lo mismo 
           print('<td style="height:10px" value="' .$res3[''.strftime("%B", strtotime($mes_siguiente)).''].'">' .$res3[''.strftime("%B", strtotime($mes_siguiente)).''].' </td>');


           $ins3="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_obligacion='".$res2['id']."' and vencimiento='".$res3[''.strftime("%B", strtotime($mes_siguiente)).'']."'";
          $cons5= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta");
           $nfilas3 = mysqli_num_rows ($cons5); 

            if($nfilas3==0){
                if($res3[''.strftime("%B", strtotime($mes_siguiente)).'']>= date('Y-m-d')){
                $ins4="insert into panel_de_control (estado, vencimiento, id_obligacion,cuit_cliente) value ('Pendiente','".$res3[''.strftime("%B", strtotime($mes_siguiente)).'']."','".$res2['id']."', '".$res1['cuit']."') ";
                  $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
                }
                else{
                $ins4="insert into panel_de_control (estado, vencimiento, id_obligacion,cuit_cliente) value ('Vencido','".$res3[''.strftime("%B", strtotime($mes_siguiente)).'']."','".$res2['id']."', '".$res1['cuit']."') ";
                $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
                }
          }else{
            for($h=0;$h<$nfilas3;$h++){
              $res5= mysqli_fetch_array ($cons5);
              if($res5['vencimiento']<date('Y-m-d')){
                $instruccion2 = "update  panel_de_control  set estado='Vencido'  where id='".$res5['id']."'";
              mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla de usuarios");
              }
            }
          } 
          //aca hago la misma consulta para poder obtener el estado, la vuelvo a hacer para que cuando cargue una que no este ya cargada me lo tome bien aca.
          print('<div id="act_estado2" name="act_estado2">');
          $ins5="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_obligacion='".$res2['id']."' and vencimiento='".$res3[''.strftime("%B", strtotime($mes_siguiente)).'']."'";
            $cons5= mysqli_query ($conexion, $ins5) or die ("Fallo en la consulta");
           $res5= mysqli_fetch_array ($cons5);
         }


          
            
           if($res5['estado']=="Pendiente"){      
           print('<td> <div id="rectangulo"  class="forma" style="background:#FDB813;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');

         }elseif ($res5['estado']=="Realizado") {
           print('<td> <div id="rectangulo"  class="forma" style="background:#55D6D2;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');
         }elseif ($res5['estado']=="Vencido") {
           print('<td> <div id="rectangulo"  class="forma" style="background:#FA7564;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');
         }
           print("</div>");     
           print(' </td> 
           <td style="display:none" value="'.$res1['email'].'">'.$res1['email'].'</td>
            <input  type="hidden"  value="'.$res2['rubro'].' | '.$res2['impuesto'].'"  id="impuesto">
           
           
            <td style="display:none" value="'.$res5['id'].'">'.$res5['id'].'</td>

              <td> <button value="'.$res1['cuit'].'"  id="abrirModal"   class="btn btn-primary openBtn" name="" > <i class=" fa fa-wrench"></i></button>  </td>
              <td style="display:none" value="'.$res2['grupo'].'">'.$res2['grupo'].'</td>
              <td style="display:none" value="'.$res1['cuit'].'">'.$res1['cuit'].'</td>
              </tr>');
         }

        }



       //repito lo mismo para agregar las tareas al tablero de control
        $ins="select * from txcxusuario where id_cuenta='".$id_cuenta."' and id_user='".$id."'";

          $cons= mysqli_query ($conexion, $ins) or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($cons);
        
        for ($i=0; $i < $nfilas; $i++) {
           $res= mysqli_fetch_array ($cons);
            $ins1="select * from cliente where cuit='".$res['cuit_cliente']."'";
          $cons1= mysqli_query ($conexion, $ins1) or die ("Fallo en la consulta");
          $res1= mysqli_fetch_array ($cons1);
          $cuit=substr("".$res['cuit_cliente']."", -1);;
        
           $ins2="select * from tarea where id='".$res['id_tarea']."'";
          $cons2= mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta");
          $res2= mysqli_fetch_array ($cons2);
          //hago esto para ver si esta cargado en el panel de control, si no esta lo cargo, y segun la fecha lo pongo como vendio o como pendiente.

          $ins3="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_tarea='".$res2['id']."' and vencimiento='".$res2['vencimiento']."'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta");
           $nfilas3 = mysqli_num_rows ($cons3);
          if($nfilas3==0){
            if($res2['vencimiento']>= date('Y-m-d')){
            $ins4="insert into panel_de_control (estado, vencimiento, id_tarea,cuit_cliente) value ('Pendiente','".$res2['vencimiento']."','".$res2['id']."', '".$res1['cuit']."') ";
              $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
            }
            else{
            $ins4="insert into panel_de_control (estado, vencimiento, id_tarea,cuit_cliente) value ('Vencido','".$res2['vencimiento']."','".$res2['id']."', '".$res1['cuit']."') ";
            $cons4= mysqli_query ($conexion, $ins4) or die ("Fallo en la consulta");
            }
          }else{
            for($h=0;$h<$nfilas3;$h++){
              $res5= mysqli_fetch_array ($cons5);
              if($res5['vencimiento']<date('Y-m-d')){
                $instruccion2 = "update  panel_de_control  set estado='Vencido'  where id='".$res5['id']."'";
              mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla de usuarios");
              }
            }
          } 

          //aca hago la misma consulta para poder obtener el estado, la vuelvo a hacer para que cuando cargue una que no este ya cargada me lo tome bien aca.

          $ins5="select * from panel_de_control where cuit_cliente='".$res1['cuit']."' and id_tarea='".$res2['id']."' and vencimiento='".$res2['vencimiento']."'";
            $cons5= mysqli_query ($conexion, $ins5) or die ("Fallo en la consulta");
           $res5= mysqli_fetch_array ($cons5);
        print('<tr>');

          print(' <td value="'.$res1['nombre'].'  '.$res1['apellido'].'">'.$res1['nombre'].' '.$res1['apellido'].'</td>');
         
           print('<td value="'.$res2['nombre'].'">  '.$res2['nombre'].'</td>');
          
          print('
            <td>--</td>
              <td>--</td>');
        /* $ins3="select * from vencimientos where id_obligacion='".$res['Obligacion_id']."' and terminacion_cuit   LIKE '%".$cuit."%'";
          $cons3= mysqli_query ($conexion, $ins3) or die ("Fallo en la consulta9");
          $res3= mysqli_fetch_array ($cons3);*/
         setlocale(LC_TIME, "spanish");//para tener los meses en español
         $mes_siguiente = date('F', strtotime('+1 month'));//para tener el mes anterior 
         
           print('<td style="height:10px" value=" ' .$res2['vencimiento'].'">' .$res2['vencimiento'].'</td>');
                  

                  print('<div id="act_estado" name="act_estado">');

            
           if($res5['estado']=="Pendiente"){      
           print('<td> <div id="rectangulo"  class="forma" style="background:#FDB813;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');

         }elseif ($res5['estado']=="Realizado") {
           print('<td> <div id="rectangulo"  class="forma" style="background:#55D6D2;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');
         }elseif ($res5['estado']=="Vencido") {
           print('<td> <div id="rectangulo"  class="forma" style="background:#FA7564;padding:5px 2px; margin: 5px 1px 1px  1px;"><h6>'.$res5['estado'].'</h6> </div>');
         }

          print('</td> 
            </div>
            <td style="display:none" value="'.$res1['email'].'">'.$res1['email'].'</td>
            <input  type="hidden"  value="'.$res2['nombre'].' | '.$res2['descripcion'].'"  id="impuesto">
           
            <td style="display:none" value="'.$res5['id'].'">'.$res5['id'].'</td>
              <td> <button value="'.$res1['cuit'].'"  id="abrirModal"   class="btn btn-primary openBtn" name="" > <i class=" fa fa-wrench"></i></button>  </td>
             
              </tr>');
         

        }

      //}
      
    ?>
                   
            </tbody>
    </table>







  </center>





</div>
</div>




<!-- MODAL -->



<div class="modal fade" id="modalTableroControl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modificar estado de una obligacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
         <div class="modal-body">
          <form method="POST" action="" name="nombreform" enctype="multipart / form-data">
                <label id="nombreCliente" > </label>
                <label id="obligacion" > - </label>
                <label id="vencimiento" > - </label>
               <label  style="display:none" id="id_panel"  name="id_panel"> - </label>
               <label  style="display:none" id="cuitc"  name="cuitc"> - </label>
               <label  style="display:none"  id="contacto"  name="contacto"> - </label>
               <label  style="display:none"  id="grupo_impuesto"  name="grupo_impuesto"> - </label>
                <!--<input type="hidden" name="id_panel" id="id_panel" value="">-->

                <div class="form-row">
                  <div class="form-group col-md-7">
                <div class="card" >
                  <div class="card-header">  Archivos adjuntos </div>
                <div class="card-body">
               <blockquote class="blockquote sm-0">
                
                 <!-- estilo posible <label for="file-upload" class="subir">
    <i class="fas fa-cloud-upload-alt"></i> Subir archivo
</label>
<input id="file-upload" onchange='cambiar()' type="file" style='display: none;'/>
<div id="info"></div>-->

                 <p style="font-size: 18px;font-weight: bold;">DDJJ <input  type="file" id="DDJJ"  name="DDJJ" /><label for="archivos" style="width:70%; height:30%;"></label></p>
                 <p style="font-size: 18px; font-weight: bold;">Ticket <input id="ticket" type="file"   name="ticket" /></p>
                 <p style="font-size: 18px; font-weight: bold;">VEP <input id="VEP" type="file"   name="VEP" /></p>
                 <p style="font-size: 18px; font-weight: bold;">Compensacion <input id="compensacion" type="file"   name="compensacion" /></p>
                </blockquote>
               </div>
              </div>
            </div>
              <div class="form-group col-md-4">
                <div class="card" >
                  <div class="card-header"> Accion  </div>
                <div class="card-body">
               <blockquote class="blockquote sm-0">
                <fieldset class="form-group">
    <div class="row">
     
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="a favor" >
          <label class="form-check-label" for="gridRadios1">
            A Favor
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="en contra">
          <label class="form-check-label" for="gridRadios2">
           En contra
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="sin moviemiento" >
          <label class="form-check-label" for="gridRadios3">
            Sin Movimiento
          </label>
        </div>
        <br>
        <label  for="importe" >
            Importe
          </label>
        <input type="number" name="importe" id="importe"class="form-control input-sm" value="" required="required">
         
      </div>
    </div>
  </fieldset>
                </blockquote>
               </div>
              </div>
                </div>
              </div>

          </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" data-dismiss="modal" name="realizado" value="Realizado" id="realizado">
    
        <input type="submit" class="btn btn-primary" data-dismiss="modal" name="enviar" value="Enviar Mail" id="enviar">
        </form>
      </div>
    </div>
    
    </div>
<?PHP
    
   }
else
   {
     header("Location: index.php");
        exit();
   }
  ?>




<script>
  //cargar la info al modal
  $(document).on('click','.openBtn', function(e){   //

  //$(this).attr("disabled",true);

  nombre_ap=$(this).parent().parent().children("td:eq(0)").text(); 
  impuesto=$(this).parent().parent().children("td:eq(1)").text(); 
  email=$(this).parent().parent().children("td:eq(6)").text(); 
  vencimiento=$(this).parent().parent().children("td:eq(4)").text(); 
  id_panel=$(this).parent().parent().children("td:eq(7)").text();
  grupo_impuesto=$(this).parent().parent().children("td:eq(9)").text();
  cuitc=$(this).parent().parent().children("td:eq(10)").text();
  alert(grupo_impuesto);
  alert(cuitc);
  $("#nombreCliente").text(nombre_ap);
  $("#obligacion").text(impuesto);
  $("#contacto").text(email);
  $("#vencimiento").text(vencimiento);
  $("#id_panel").text(id_panel);
  $("#grupo_impuesto").text(grupo_impuesto);
  $("#cuitc").text(cuitc);
        $('#modalTableroControl').modal('show');
      });

 /* $(document).ready(function(){
    $("#abrirModal").click(function(){

      cliente=$('#abrirModal').val();
      impuesto=$('#impuesto').val();
      correo=$('#correo').val();

        $("#nombreCliente").text(cliente);
        $("#obligacion").text(impuesto);
        $("#contacto").text(impuesto);
        $("#modalTableroControl").modal("show");

    });
});*/
  //es para ordenar las filas de fechas, nombre y obligacion
function sortTable(n,type) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
 
  table = document.getElementById("panel1");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
 
  /*Make a loop that will continue until no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare, one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place, based on the direction, asc or desc:*/
      if (dir == "asc") {
        if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="date" && x.innerHTML > y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="date" && x.innerHTML < y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
//obtener datos de modal.
$(document).ready(function(){
    $("#realizado").click(function(){

      id_panel=$('#id_panel').text();
      

      cadena="id_panel="+id_panel;
    alert(cadena);
        $.ajax({
          url: "/Proyecto_Contadores/modificarEstado.php?"+cadena,
        }).done(function(data) {
        $('#act_estado').load('');
        alertify.success("agregado con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          
          alertify.error("agregado con exito  ");
          });
    //window.location.href="modificarEstado.php?"+cadena;

    });
});
//obtener datos del modal para enviar mail con archivos
$(document).ready(function(){
    $("#enviar").click(function(){

      id_panel=$('#id_panel').text();
      obligacion=$('#obligacion').text();
      email=$('#contacto').text();
      vencimiento=$('#vencimiento').text();
      grupo_impuesto=$('#grupo_impuesto').text();
       cuitc=$('#cuitc').text();
      //var ddjj=$("#DDJJ");
      //ddjj=document.getElementById('DDJJ').files[0];;
      //ticket=document.getElementById('ticket')files[0];
      //vep=document.getElementById('VEP')files[0];
      //compensacion=document.getElementById('compensacion')files[0];
      //otros=document.getElementById('otros');
      condicion = document.nombreform.gridRadios.value;
      importe= $('#importe').val();

      
      cadena="id_panel="+id_panel+ 
      "&email="+email+
      //"&ddjj="+ddjj+
      "&condicion="+condicion+ 
      "&importe="+importe+ 
      "&obligacion="+obligacion
      "&cuitc="+cuitc
      "&grupo_impuesto="+grupo_impuesto
      "&vencimiento="+vencimiento;
      

 
           file = $("#DDJJ")[0].files[0];//aca obtengo el archivo
           file2 = $("#VEP")[0].files[0];
           file3 = $("#ticket")[0].files[0];
           file4 = $("#compensacion")[0].files[0];
           //file2 = $("#VEP")[0].files[0]; ver como hacer cuando son muchos. 

           data = new FormData();// creo esto 
 
            data.append("ddjj",file);// aca lo que hago es poner el archivo dentro de lo  que seria ese data, asi lo puedo pasar a php y me toma el archivo como archivo, hago lo mismo para el restos de los archivos y tambien para la informacion.

            data.append("vep",file2); 
            data.append("ticket",file3); 
            data.append("compensacion",file4);
            data.append("id_panel",id_panel);  
            data.append("condicion",condicion); 
            data.append("importe",importe); 
            data.append("obligacion",obligacion); 
            data.append("grupo_impuesto",grupo_impuesto);
            data.append("cuitc",cuitc);
            data.append("vencimiento",vencimiento); 
            data.append("email",email); 
            var url = "/Proyecto_Contadores/enviarMail.php";
            $.ajax({
 
            url: url,
 
            type:'POST',
 
            contentType:false,
 
            data:data,
 
            processData:false,
 
            cache:false
      
        }).done(function(data) {
        $('#act_estado2').load('');
        alertify.success("agregado con exito  ");
        }).fail(function(jqXHR, textStatus, errorThrown) { 
          
          alertify.error("no se envio  ");
          });
    //window.location.href="enviarMail.php?"+cadena;

    });
});

//script para  buscar  en la tabla 
  $(document).ready(function(){
   $("#search").keyup(function(){
     _this = this;
    $.each($("#panel1 tbody tr"), function() {
    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
    else
        $(this).show();
      });
    });
});

//funcion para ver que archivo seleccione
function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
}
</script>

<!-- 
<script>
$('.openBtn').click(function(){
    $('.modal-body').load('contenidoModal.php',function(){
        $('#modalTableroControl').modal({show:true});
    });
});
</script>
-->
