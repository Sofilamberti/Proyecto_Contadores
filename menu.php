<html>  
<HEAD>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<?PHP
  extract($_REQUEST);
?>

        
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#E7E7E7;">
      
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
 
  </button>
 <style>
            
   nav a{
    text-decoration:none;
     color: black;
    font-size:18px;
    font-family: sans-serif;
    border: solid 1px #000;

}
        
nav li{
     color: #f4f4f4;
    font-size:16px;
    font-family: sans-serif;
    
    font-color:black;
    border: solid 1px #000;
     
   
}



            
nav li:hover{
     color: grey;
     font-size:16px;
     font-color:grey;
     
}
nav a:hover{
     color: grey;
     font-size:17px;
     font-color:grey;
     
}

nav a:visited{
   display:inline-block;
    width:70px;
    height:30px;
    padding:10px 10px;
    font-color:grey;
     

    
}
        </style>
     <?PHP 
      $conexion = mysqli_connect ("localhost", "root", "")
         or die ("No se puede conectar con el servidor");
      mysqli_select_db ($conexion,"contadores")
       or die ("No se puede seleccionar la base de datos");
       
      $instruccion = "select * from menu";
         
      $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
      if($nfilas>0){
        
        print("<ul>");
        for($i=0; $i<$nfilas; $i++){
          
          $resultado = mysqli_fetch_array ($consulta);

            
             //print($resultado['label']);
             print('<li style="display:inline-block;"> <center><a class="nav-link" href="/Proyecto_contadores'.$resultado['link'].'">'.$resultado['etiqueta'].'<BR><img src="'.$resultado['imagen'].'" width="60" height="50" alt="..."></center></a> </li>');
             
        }
      
               
      
    }
        mysqli_close ($conexion);

?>
   </ul>
  </nav>
 
</HEAD>
</html>