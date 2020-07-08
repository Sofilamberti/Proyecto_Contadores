<html>  
<HEAD>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<?PHP
  extract($_REQUEST);
?>
<style>
    #banner{
    width: 100%;
    height: 90px;
   
  }  
      
   nav a{
    text-decoration:none;
     color: black;
    font-size:22px;
    font-family: Bahnschrift Condensed;
    letter-spacing: -1px;
    float:none;
   

}
        
nav li{
     color: #f4f4f4;
    font-size:22px;
    font-family: Bahnschrift Condensed;
    
    font-color:black;
    letter-spacing: -1px;
   padding-left:-5em;
   padding-right:-5em;
}



            
nav li:hover{
     color: grey;
     font-size:26px;
     font-color:grey;
     letter-spacing: -1px;

     
}
nav a:hover{
     color: grey;
     font-size:26px;
     font-color:grey;
     letter-spacing: -1px;
     
}

nav a:visited{
   display:inline-block;
    width:70px;
    height:30px;
    padding:10px 10px;
    font-color:grey;
     

    
}
        </style>
         <div id="banner">
      <center><img src="/Proyecto_Contadores/logo.png"  width="290px" height="80px"  alt="..." ></center>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:white;" aling="right">
      
    <button class="navbar-toggler" style="background-color:#D9D9D9" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
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
             print('<li style="display:inline-block;  margin:-5;"> <center><a class="nav-link" href="/Proyecto_contadores'.$resultado['link'].'"><img src="'.$resultado['imagen'].'" width="65" height="65" alt="..."><br>'.$resultado['etiqueta'].' </a></center></li>');
             
        }
      
               
      
    }
        mysqli_close ($conexion);

?>
   </ul>
 </div>
  </nav>
 </div>
</HEAD>
</html>