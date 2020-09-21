<html>  
<HEAD>
   
   
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>
<?PHP
  extract($_REQUEST);



  $conexion = mysqli_connect ("localhost", "root", "")
  or die ("No se puede conectar con el servidor");
mysqli_select_db ($conexion,"contadores")
or die ("No se puede seleccionar la base de datos");

$instruccion = "select * from menu";
  
$consulta = mysqli_query ($conexion, $instruccion)
  or die ("Fallo en la consulta");
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

.active{

  width:70px;
    height:300px;
}

nav a:visited{
   display:inline-block;
    width:70px;
    height:30px;
    padding:10px 10px;
    font-color:grey;
}
/* Style the active class (and buttons on mouse-over) */



</style>

         <div id="banner">
      <center><img src="/Proyecto_Contadores/logo.png"  width="290px" height="80px"  alt="..." ></center>
    </div>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:white;" aling="right">
      
    <button class="navbar-toggler" style="background-color:#D9D9D9" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" >

    
     <?PHP 
     
      $nfilas = mysqli_num_rows ($consulta);
      if($nfilas>0){
        
        print("<ul class='nav nav-list'>");
        for($i=0; $i<$nfilas; $i++){
          
          $resultado = mysqli_fetch_array ($consulta);
             //print($resultado['label']);
        print('
               <li  class="" style="display:inline-block;  margin:-5;" id= "'.$resultado['link'].'" >
               <center><a class="nav-link" href="/Proyecto_contadores'.$resultado['link'].'">
                   <img src="'.$resultado['imagen'].'" width="65" height="65" alt="..."><br>'.$resultado['etiqueta'].' </a>
               </center>
               </li>'
         
                 );


  
        }
      
               
      
    }
        mysqli_close ($conexion);

?>


<!--
<ul class='nav nav-list' >
     <li  class="active" style="display:inline-block;  margin:-5;" >
               <center><a  href="/Proyecto_contadores/home1.php">
                   <img src="/Proyecto_Contadores/img/men1.png" width="65" height="65" alt="..."><br>inicio </a>
               </center>
               </li>


               <li   style="display:inline-block;  margin:-5;" >
               <center><a  href="/Proyecto_contadores/bdd.php">
                   <img src="/Proyecto_Contadores/img/men2.png" width="65" height="65" alt="..."><br>bdd </a>
               </center>
               </li>
               <li  style="display:inline-block;  margin:-5;" >
               <center><a  href="/Proyecto_contadores/vinculaciones.php">
                   <img src="/Proyecto_Contadores/img/men3.png" width="65" height="65" alt="..."><br>vincualciones </a>
               </center>
               </li>
               *-->

</ul>



   
  </div>

</div>
 </div>
  </nav>
 </div>
</HEAD>
</html>




<script>




$('.nav-list').on('click', 'li', function() {
  $('.nav-list li.active').removeClass('active');
$(this).parent().addClass('active');;
});

/*
$('li').on('click',function(e){ 
  $(this).parent().find('li.active').setAttribute("class", "nav-item");
  $(this).setAttribute("class", "nav-item active"); 
});


  /// obtengo la Url actual
let url = window.location.href;


/// id de li
const tabs = ["home1", "bdd", "vinculaciones", "tableroControl", "archivos", "comunicacion","informes","normativa","logout"];

tabs.forEach(e => {
    /// Agregar .php y ver si lo contiene en la url
    if (url.indexOf(e + ".php") !== -1) {
        /// Agregar tab- para hacer que coincida la Id
        setActive("/" + e);
    }

});

/// Funcion que asigna la clase active
function setActive(id) {
    document.getElementById(id).setAttribute("class", "nav-item active");
    alert ( window.location.href);
}
*/


</script>



