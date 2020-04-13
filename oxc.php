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
<?PHP include ("menu.php");
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
<BR>

      <a href="/Proyecto_Contadores/bdd.php" ><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>


  <?PHP     
   $id_cuenta=$_SESSION['cuenta'];
      $instruccion = "select * from cliente where cuenta_id='$id_cuenta'" ;
      $consulta = mysqli_query ($conexion, $instruccion)  or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);


  print(' <div class="accordion" id="accordionExample"  >');

    for($i=0; $i<$nfilas; $i++){
          
          $resultado = mysqli_fetch_array ($consulta);
          print('<center>');
print('<div class="col-8">');
    print('<div class="card" >');
    print('<div class="card-header" id="headin'.$i.'" style="background-color:#FCC839;">');
      print('<h2 >');
        print('<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'"><i class="fas fa-user-friends" ></i>
          '. $resultado['nombre']. "  ".$resultado['apellido'].'
        </button>');
     print(' </h2>');
    print('</div>');
print('<div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#accordionExample">');
      print('<div class="card-body">');
          
          $in2 = "select Obligacion_id from obligacionxcliente where CLiente_cuit=".$resultado['cuit']." order by Obligacion_id " ;
          $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
           $nf = mysqli_num_rows ($cons2);
          
        print('<TABLE class="table table-bordered">');
             print('<thead>');
      print('<TR>');
      print('<TH style="background-color:#FCC839;"> Rubro </TH>');
      print('<TH style="background-color:#FCC839;" scope="row"> Impuesto </TH>');
       print('</TR>');
      print('</thead>');
          for($n=0;$n<$nf;$n++){
          $res2 = mysqli_fetch_array ($cons2);
          $in3="select * from obligacion where id=".$res2['Obligacion_id']."";
          $cons3 = mysqli_query ($conexion, $in3) or die ("Fallo en la consulta 3");
          $nf3 = mysqli_num_rows ($cons3);
         $res3 = mysqli_fetch_array ($cons3);
            
        print('<TR>');
        print('<TD>'.$res3['rubro'].'</TD>');
        print('<TD>'.$res3['impuesto'].'</TD>');
        print('</TR>');
         }
         print('<BR>');
          print('</TABLE>');
      
          print('<FORM NAME="agr" ACTION="/Proyecto_Contadores/agregarObli.php" METHOD="POST">
  <div class="form-group">');
          print('<input type="hidden" class="form-control" value="'.$resultado['cuit'].'" id="in1" name="in1">');
          print('<input type="hidden" class="form-control" value="'. $resultado['nombre']. "  ".$resultado['apellido'].'" id="in2" name="in2" >');
        print('<button type="submit" class="btn btn-outline-success " aria-pressed="true">Agregar</button>');
        print('</FORM>');
         print('<BR>');
        print('<FORM NAME="elim" ACTION="/Proyecto_Contadores/eliminarObli.php" METHOD="POST"><div class="form-group">');
          print('<BR>');
          print('<input type="hidden" class="form-control" value="'.$resultado['cuit'].'" id="in1" name="in1">');
          print('<input type="hidden"  class="form-control" value="'. $resultado['nombre']. "  ".$resultado['apellido'].'" id="in2" name="in2" >');

        print('<button type="submit" class="btn btn-outline-danger " aria-pressed="true">Eliminar</button>');
         print('</FORM>');
      print('</div>');
    print('</div>');
  print('</div>');
  print('</div>');
print('</center>');
           
        }
       
        print('</div>');

?>


     
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('Agregar obligacion para  ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
<?PHP
  }

 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>