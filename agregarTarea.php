<?PHP
 
   session_start ();


if ($_SESSION['usuario_valido']!="")
   {
  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>
<?PHP 
   include ("menu.php");
   include ("conexion.php");
?>
  <style>
     h2 {
        text-align: center;
      }
   </style>
</HEAD>

<BODY>
<?PHP
    $cu= $_POST['in1'];
    $dat=$_POST['in2'];
      
       
          
print('<BR>');

?>
<a href="/Proyecto_Contadores/tareas.php" ><h4><i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>
<?PHP
print('<center>');
print('<div class="col-10">');
print('<h2>Seleccione la Tarea a agregar para '.$dat.'  </h2>');
?>
<div style="float:right;">
<caption>
      <button class="btn btn-primary" style="background-color:#27B8CB; color:white;" data-toggle="modal" data-target="#modalTarea">
        Agregar Nueva Tarea 
      <span class="glyphicon glyphicon-plus"></span>
      </button>
</caption>
</div>
<BR>
<BR>

  <form method="POST" action="/Proyecto_Contadores/agregarTarea.php">
  <div class="modal fade" id="modalTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Tarea</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
         <div class="modal-body">
                <label>Nombre</label>
                  <input type="text"   name="nombre" id="nombre" class="form-control input-sm">
                <BR>
                <label>Descripcion</label>
                <input type="text"   name="Descripcion" id="Descripcion" class="form-control input-sm">
                <input type="hidden" class="form-control" value="<?PHP  print( $cu );?>" id="in1" name="in1">
                <input type="hidden" class="form-control" value="<?PHP print($dat); ?>" id="in2" name="in2">
                
          </div>
      <div class="modal-footer">
        <button  type="submit" class="btn btn-primary"  name="submitSave" id="submitSave">
        Agregar
        </button>
       
      </div>
    </div>
    
    </div>
</div>
</form>
<?PHP

if (isset($_POST['submitSave'])) {
    if (isset($_POST['nombre']) && isset($_POST['Descripcion'])) {
        $v1=$_POST['nombre'];
        $v2=$_POST['Descripcion'];
        $instruccion = "insert into tarea ( nombre,descripcion)  values ('$v1','$v2')";
      mysqli_query($conexion, $instruccion) or die ("Fallo en insertar  en la tabla");
       echo '<div class="alert alert-success" role="alert">
                Email <strong>'.$_POST['nombre'].'</strong> recibido correctamente!
            </div>';
          }
    
}
 $in2 = "select * from tarea where id  not in(select id_tarea from tareaxcliente where id_cliente=".$cu.") order by nombre" ;
        $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);

print('<TABLE class="table table-bordered">');
             print('<thead>');
      print('<TR>');
      print('<TH style="background-color:#FCC839;"> Tarea </TH>');
     //print('<TH style="background-color:#FCC839;" scope="row"> Impuesto </TH>');
       print('<TH style="background-color:#FCC839;" scope="row"> Seleccionar  </TH>');
       print('</TR>');
      print('</thead>');
    
          for($h=0;$h<$nf;$h++){
            
            $res4 = mysqli_fetch_array ($cons2);
          
              print('<TR>');
              print('<TD>'.$res4['nombre'].'</TD>');
            //print('<TD>'.$res4['impuesto'].'</TD>');
          print('<TD>');
          print(' <FORM NAME="elim2" ACTION="" METHOD="POST"><div class="form-group">');
          print('<center> <input type="checkbox" name="check_list[]"  value="'.$res4['id'].'" class="form-check-input" > </center>');
          
          print(' </TD>');
        }
        
          
        
              print('</TR>');
        
    
      
      
       print('</TABLE>');
      print('<div>');
      print('<input type="hidden" class="form-control" value="'.$cu.'" id="in1" name="in1">');
       print('<input type="hidden" class="form-control" value="'.$dat.'" id="in2" name="in2">');
       print('<input type="submit" name="agreg" class="btn btn-outline-success " aria-pressed="true" value="Agregar" />');
       print('</FORM>');
  
      print('</center>');

  
  if (isset($_POST['agreg'])) {
        //Para ejecutar PHP script en Submit
      if(!empty($_POST['check_list'])){
        $cuit=$_POST['in1'];
      
      // Bucle para almacenar y mostrar los valores de la casilla de verificación comprobación individual.

      foreach($_POST['check_list'] as $selected){
           //$in3 = "select * from obligacionxcliente order by id_oxc desc" ;
           //  $cons3 = mysqli_query ($conexion, $in3);
            // $nf3 = mysqli_num_rows ($cons3);
            // $res4 = mysqli_fetch_array ($cons3);
            // $id=$res4['id_oxc']+1;
             //echo 'valor id '.$id.'  ';

        $in4= "INSERT INTO  tareaxcliente  (id_tarea,id_cliente) VALUES ('$selected','$cuit')" ;
            $cons6 = mysqli_query ($conexion, $in4) or die ("Fallo en la consulta de agregar");
         }
    
    }
    echo '<script language="javascript">alert("Se han agregado las obligaciones con exito");window.location.href="tareas.php"</script>';

  }


}
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>
<script>

      


</script>

  