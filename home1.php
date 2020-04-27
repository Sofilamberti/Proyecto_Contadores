<?PHP
 
   session_start ();

  ?>
  <HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>-->

<?PHP include ("menu.php");
?>
</HEAD>

<BODY>
<?PHP
if ($_SESSION['usuario_valido']!="")
   {

	print(' <div class="jumbotron jumbotron-fluid">');
	  print(' <div class="container">');
	    print(' <h1 class="display-4">Bienvenido !</h1>');
	     print('<p class="lead">Aca apareceran las obligaciones que vencen hoy! </p>');
	   print('</div>');
	 print('</div>');


 }
 else
   {
     header("Location: index.html");
        exit();
   }
  ?>

</BODY>
