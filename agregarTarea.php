<?PHP
 
   session_start ();


  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
<?PHP 
   include ("menu.php");
   include ("conexion.php");
?>
  <style>
     h2 {
        text-align: left;
      }
   </style>
</HEAD>

<BODY>
<form>

<?PHP
if ($_SESSION['usuario_valido']!="")
   {
   	$cu= $_POST['in1'];
    $dat=$_POST['in2'];
   		
        $in2 = "select * from tarea where id  not in(select id_tarea from tareaxcliente where id_cliente=".$cu.")" ;
        $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);
          
print('<BR>');
print('<BR>');

print('<center>');
print('<div class="col-10">');
print('<h2>Seleccione las tareas a agregar para '.$dat.'  </h2>');

?>
<!--<div style="float:right;">
<caption>
      <button  type="button" class="btn btn-primary" style="background-color:#27B8CB; color:black;" data-toggle="modal" data-target="#modalTarea">
        Agregar Nueva Tarea
      
      </button>
</caption>
</div>
<br>
<br>-->


<TABLE class="table table-bordered">
             <thead>
      <TR>
      <TH style="background-color:#FCC839;"> Nombre </TH>
      <!--<TH style="background-color:#FCC839;" scope="row"> Impuesto </TH>-->
       <TH style="background-color:#FCC839;" scope="row"> Seleccionar  </TH>
       </TR>
      </thead>
    <?PHP

         	for($h=0;$h<$nf;$h++){
         		
         		$res4 = mysqli_fetch_array ($cons2);
         	
		          print('<TR>');
		          print('<TD>'.$res4['nombre'].'</TD>');
		    	  //print('<TD>'.$res4['impuesto'].'</TD>');
		    	print('<TD>');
		    	print(' <FORM NAME="agre" ACTION="" METHOD="POST"><div class="form-group">');
		    	print('<center> <input type="checkbox" name="check_list[]"  value="'.$res4['id'].'" class="form-check-input" > </center>');
		    	
		    	print(' </TD>');
		    }
		    
         	
        
		          print('</TR>');
    		
    
    	
    	
    	 print('</TABLE>');
     
    
      print('<input type="hidden" class="form-control" value="'.$cu.'" id="in1" name="in1">');
       print('<input type="hidden" class="form-control" value="'.$dat.'" id="in2" name="in2">');
       print('<input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Agregar" />');
       print('</FORM>');
        print('<FORM NAME="vol" ACTION="/Proyecto_Contadores/tarea.php" METHOD="POST"><div class="form-group">');
          print('<BR>');
          

        print('<button type="submit" class="btn btn-outline-primary " aria-pressed="true">Volver</button>');
     
      print('</center>');


  if (isset($_POST['submit'])) {
        //Para ejecutar PHP script en Submit
      if(!empty($_POST['check_list'])){
        $cuit=$_POST['in1'];
      
      // Bucle para almacenar y mostrar los valores de la casilla de verificación comprobación individual.

      foreach($_POST['check_list'] as $selected){
           $in3 = "select * from tareaxcliente" ;
            $cons3 = mysqli_query ($conexion, $in3);
            $nf3 = mysqli_num_rows ($cons3);
            // $res4 = mysqli_fetch_array ($cons3);
             echo 'valor select  '.$selected.'   ';
             echo 'valor cuit   '.$cuit.'   ';

        $in4= "insert into  tareaxcliente  (id_txc,id_tarea,id_cliente) values ('$nf3','$selected','$cuit')" ;
            mysqli_query ($conexion, $in4) or die ("Fallo en la consulta de agregar");
         }
    
    }
    echo '<script language="javascript">Swal.fire(
                "Se ha ejecutado con éxito!",
                "You clicked the button!",
                "success"
                );window.location.href="oxc.php"</script>';

  }
?>

<!--<div class="modal fade" id="modalTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Tarea</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden=" true">&times;</span> </button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <form action="" method="POST">
         <div class="modal-body">
                <label>Nombre</label>
                  <input type="text"   name="nombre" id="nombre" class="form-control input-sm">
                <label>Descripcion</label>
                  <input type="text"   name="descripcion" id="descripcion" class="form-control input-sm">
                
          </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="alerta()" >
        Agregar
        </button>
       
      </div>
    </div>
    
    </div>
</div>-->
<?PHP
  
 
}
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>

<!--<script>
  function alerta(){
    
    var nombre = $('#nombre').val();
    var descripcion = $('#descripcion').val();

    $.ajax({
            type:'POST',
            url:'agreTare.php',
            data:'nombre='+nombre+'&descripcion='+descripcion,
            success:function(){
               Swal.fire(
                'Se ha ejecutado con éxito!',
                'You clicked the button!',
                'success'
                )
                   
            }
        });
  }
</script>-->