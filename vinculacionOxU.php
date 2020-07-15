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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">

  .forma{
  display: inline-block;

}
  
#rectangle {
  width:900px; 
  height:30px; 

  justify-content: left;
  align-items: left;
  text-align: left;
 
  padding:22px 50px;
  margin: 10px   10px   20px   10px;
}
#rectangle > h3 {
  font-family: sans-serif;
  color: black;
  font-size: 28px;
  font-weight: bold;
  text-align: left;
}


</style>
<?PHP include ("menu.php");
 include ("conexion.php");
 $id_cuenta=$_SESSION['cuenta'];
 $id=$_SESSION['usuario_valido'];

   $instruccion = "select * from usuario where id_user='".$id."'";
   $consulta2 = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 2");
      $res2= mysqli_fetch_array ($consulta2);
  if($res2['id_rol']==1){
       
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'"; 
      
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);
      
 ?>
 <center>
<div class="container">
    <div class="col-11">
       <div  id="rectangle" style="background: #55D6D2" align="left"><h3>VINCULACION  DE OBLIGACION Y USUARIO A CLIENTE</h3></div>
               
             <div align="right">
                     <input type="button" value="Ver Vinculaciones" class="btn btn-primary" style="background-color:#55D6D2; color:white;"name="VerVInculaciones" OnClick="location.href='/Proyecto_Contadores/verVinculacionesObligacion.php'"></div>
               
                <table class="table table-striped table-hover  "  id="tablaVinculaciones" style="margin-top:10px;" >
                  <thead class="thead-light">
                <tr>
                <th scope="col" style="background-color:#E7E7E7;">Cliente</th>
                <th scope="col" style="background-color:#E7E7E7;">Usuario</th>
                <th scope="col" style="background-color:#E7E7E7;">Obligaciones</th>
                <th scope="col" style="background-color:#E7E7E7;">Vincular</th>
              </tr>
            </thead>
               <tbody >
              <?php  
                     for($i=0; $i<$nfilas; $i++)
                     {
                      $resultado = mysqli_fetch_array ($consulta);
                      print('<tr>
                        <td value="'.$resultado['cuit'].'"><input type="hidden" value="'.$resultado['cuit'].'" class="cliente">'.$resultado['nombre'].' '.$resultado['apellido'].'</td>
          
                        <td>  <select id="usuario" name="usuario" class="usuario form-control">');
                      $instruccion2 = "select * from usuario where cuenta_id='$id_cuenta' and id_rol=2"; 
      
       
      $consulta2 = mysqli_query ($conexion, $instruccion2) or die ("Fallo en la consulta");

      $nfilas2 = mysqli_num_rows ($consulta2);
      
                        for($j=0;$j<$nfilas2;$j++){
                          $res3 = mysqli_fetch_array ($consulta2);
                          print('<option value="'.$res3['id_user'].'">'.$res3['user'].'</option>');
                        }
                         print(' </select></td>
                         <td><select id="obligacion[]" name="obligacion[]" class="obligacion form-control" style="height: 70px;overflow: auto;" multiple>');
                       $in5="select * from obligacion ";
                                $cons5 = mysqli_query ($conexion, $in5) or die ("Fallo en la consulta 4");
                                $nf4 = mysqli_num_rows ($cons5);
                           
                          for($h=0;$h<$nf4;$h++){
                                $res5 = mysqli_fetch_array ($cons5);
                            
                             
                               print('<option value="'.$res5['id'].'">'.$res5['impuesto'].'</option>');

                        }
                          print('</select></td>
                            <td> <button value="vincular" name="vincular" class="btn btn-primary btnVincular" id="'.$resultado['cuit'].'" aling="right">

                              <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            </button></td>

                        </tr>');
                      }
                       ?> 
                     </tbody>
                   </table>
              </div>
</div>
            </center>

<?PHP
} else{
      ?>
      <div class="container">
  <center>
  <div id="cartel"  class="forma" > <h3 style="font-family: Bahnschrift Condensed; font-size: 60px;"> LO SENTIMOS NO TIENES ACCESO A ESTA SECCION :( </h3>
</div>
</center>
</div>
  ?>
  <?PHP
}

}
else
   {
     header("Location: index.html");
        exit();
   }
?>
<script type="text/javascript">

$(document).on('click','.btnVincular', function(e){ // funcion para cargar las vinculaciones en la tabla
  e.preventDefault(); //evita que se recargue la pagina

  var fila = $(this).parents("tr");// aca agarro la fila y despues agarro todos los valores de la fila
  cuit=fila.find(".cliente").val();
  usuario= fila.find('.usuario').val();
  obligacion= fila.find('.obligacion').val();// es un select multiple por lo que puede tener mas de un valor
  cadena="cuit="+cuit+"&usuario="+usuario+"&obligacion="+obligacion;

  //window.location.href="/Proyecto_Contadores/agregarVinculacion.php?"+cadena;
 $.ajax({
          url:"/Proyecto_Contadores/agregarVinculacion.php?"+cadena,
        }).done(function(data) {
          alertify.success("agregado con exito");
        });

  });
  
     

</script>