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
<?PHP include ("menu.php");
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


  $conexion = mysqli_connect ("localhost", "root", "")
         or die ("No se puede conectar con el servidor");
      mysqli_select_db ($conexion,"contadores")
         or die ("No se puede seleccionar la base de datos");
      //$salt = substr ($usuario, 0, 2);
/* crypt es una función que encripta un string dado ($usuario) a partir de un substring
($salt) que lo toma como semilla de encriptación en este caso son dos caracteres*/
    //$clave_crypt = crypt ($clave, $salt);
      $instruccion = "select * from cliente " ;
      $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
      mysqli_close ($conexion);
      print('<BR>');
      print('<BR>');
      print('<div class="col-12">');
       print('<TABLE class="table table-hover">');
             print('<thead>');
      print('<TR>');
      print('<TH style="background-color:#9970E5;"> Nombre y Apellido </TH>');
      print('<TH style="background-color:#9970E5;" scope="row"> Cuit </TH>');
      print('<TH style="background-color:#9970E5;" scope="row"> Email </TH>');
      print('<TH style="background-color:#9970E5;" scope="row"> Tipo Societario </TH>');
       print('<TH style="background-color:#9970E5;" scope="row"> Seleccionar</TH>');


       print('</TR>');
      print('</thead>');
      print('<tbody>');
      for($n=0;$n<$nfilas;$n++){
      		$res2 = mysqli_fetch_array ($consulta);
      print('<TR >');
  
        print('<TD>'.$res2['nombre'].'   '.$res2['apellido'].'</TD>');
        print('<TD>'.$res2['cuit'].'</TD>');
        print('<TD>'.$res2['email'].'</TD>');
        print('<TD>'.$res2['TipoSocietario_tipo_societario'].'</TD>');
        print('<TD> <center> <input type="radio" class="form-check-input" name="optradio"> </center> </TD>');
        print('</TR>');
    }
    print('</tbody>');
print('</TABLE>');
print('</div>');
  print('<BR>');
      print('<BR>');
print('<center>');
print('<a href="#" class="btn btn-outline-success " role="button" aria-pressed="true">Agregar</a>');
print('     ');
print('<a href="#" class="btn btn-outline-warning " role="button" aria-pressed="true">Modificar</a>');
print('     ');
print('<a href="#" class="btn btn-outline-danger " role="button" aria-pressed="true">Eliminar</a>');
print('</center>');
?>
<BR>
<?PHP
  }

 else
   {
     header("Location: index.php");
        exit();
   }
  ?>

</BODY>