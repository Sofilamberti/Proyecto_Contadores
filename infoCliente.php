<?PHP
 session_start ();
 ?>
<html>
<head>
 

  <?PHP 
    include ("menu.php");
    ?>

 <?PHP 
     $v1 = $_POST['cuit'];

    $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
      mysqli_select_db ($conexion,"contadores") or die ("No se puede seleccionar la base de datos");
       
      $instruccion = "select * from cliente where cuit='$v1'";
       
      $consulta = mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta");

      $nfilas = mysqli_num_rows ($consulta);
    ?>



</head>
<body>
	  <div class="card border-success mb-3" style="max-width: 18rem;">
	  	<?php  
	  	for($i=0; $i<$nfilas; $i++){
                      $resultado = mysqli_fetch_array ($consulta);
  			print('<div class="card-header bg-transparent border-success">'.$resultado['nombre'].'</div>
  				<div class="card-body text-success">
  				<?php  
  				
   				 <h5 class="card-title">'.$resultado['nombre'].'</h5>
    				 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>'
    			);
   				}
    			  ?>	
  				</div>
  			<div class="card-footer bg-transparent border-success">Footer</div>
	  </div>


</body>    