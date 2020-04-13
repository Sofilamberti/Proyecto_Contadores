<?PHP 
session_start ();
include ("conexion.php");
  $cu= $_POST['in1'];
    $dat=$_POST['in2'];
      
        $in2 = "select * from tarea where id  not in(select id_tarea from tareaxcliente where id_cliente=".$cu.")" ;
        $cons2 = mysqli_query ($conexion, $in2) or die ("Fallo en la consulta 2");
         $nf = mysqli_num_rows ($cons2);
          
 ?>         
<TABLE class="table table-striped table-hover " name="tabla">
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
		    	print(' <FORM NAME="elim2" ACTION="" METHOD="POST"><div class="form-group">');
		    	print('<center> <input type="checkbox" name="check_list[]"  value="'.$res4['id'].'" class="form-check-input" > </center>');
		    	
		    	print(' </TD>');
		    }
		    
         	
        
		          print('</TR>');
    		
    
    	
    	
    	 print('</TABLE>');
       ?>
       