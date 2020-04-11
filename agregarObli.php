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
if ($_SESSION['usuario_valido']!="")
   {
   	$cu= $_POST['in1'];
    $dat=$_POST['in2'];
   		
        $in2 = "select * from obligacion where id  not in(select Obligacion_id from obligacionxcliente where CLiente_cuit=".$cu.")" ;
        $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);
          
print('<BR>');
print('<BR>');
print('<center>');
print('<div class="col-10">');
print('<h2>Seleccione la obligacion a agregar para '.$dat.'  </h2>');
print('<TABLE class="table table-bordered">');
             print('<thead>');
      print('<TR>');
      print('<TH style="background-color:#FCC839;"> Rubro </TH>');
      print('<TH style="background-color:#FCC839;" scope="row"> Impuesto </TH>');
       print('<TH style="background-color:#FCC839;" scope="row"> Seleccionar  </TH>');
       print('</TR>');
      print('</thead>');
    
         	for($h=0;$h<$nf;$h++){
         		
         		$res4 = mysqli_fetch_array ($cons2);
         	
		          print('<TR>');
		          print('<TD>'.$res4['rubro'].'</TD>');
		    	  print('<TD>'.$res4['impuesto'].'</TD>');
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
       print('<input type="submit" name="submit" class="btn btn-outline-success " aria-pressed="true" value="Agregar" />');
       print('</FORM>');
        print('<FORM NAME="vol" ACTION="/Proyecto_Contadores/oxc.php" METHOD="POST"><div class="form-group">');
          print('<BR>');
          

        print('<button type="submit" class="btn btn-outline-primary " aria-pressed="true">Volver</button>');
      print('</center>');

  
  if (isset($_POST['submit'])) {
		  	//Para ejecutar PHP script en Submit
			if(!empty($_POST['check_list'])){
				$cuit=$_POST['in1'];
			
			// Bucle para almacenar y mostrar los valores de la casilla de verificación comprobación individual.

			foreach($_POST['check_list'] as $selected){
			     $in3 = "select * from obligacionxcliente order by id_oxc desc" ;
		         $cons3 = mysqli_query ($conexion, $in3);
		         $nf3 = mysqli_num_rows ($cons3);
		         $res4 = mysqli_fetch_array ($cons3);
		         echo 'valor select  '.$selected.'   ';
		         echo 'valor cuit   '.$cuit.'   ';
		         $id=$res4['id_oxc']+1;
		         echo 'valor id '.$id.'  ';

				$in4= "INSERT INTO  obligacionxcliente  (id_oxc,CLiente_cuit,Obligacion_id) VALUES ('$id','$cuit','$selected')" ;
		        $cons6 = mysqli_query ($conexion, $in4) or die ("Fallo en la consulta de agregar");
		     }
		
		}
		echo '<script language="javascript">alert("Se han agregado las obligaciones con exito");window.location.href="oxc.php"</script>';

  }
}
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>