<?PHP
 session_start ();
?>
<style>

	#Noticia{
	width:300px;
	height:300px;
	background: #EDD785;
  
	text-align: center;
 
     padding:90px 30px;
	 margin: 70px   50px   50px   160px;
     float: left;
     
     }
     object:-moz-read-only { background: lightgray; }
        object:read-only { background: lightgray; }

</style>

<TITLE>CONTAONLINE </TITLE>
<script src="https://kit.fontawesome.com/0c4b5fe221.js" crossorigin="anonymous"></script>




     

<?php


/**    function feed($feedURL){
$i = 0; 
$url = $feedURL; 
$rss = simplexml_load_file($url); 
    foreach($rss->channel->item as $item) { 
    $link = $item->link;  //extrae el link
    $title = $item->title;  //extrae el titulo
    $date = $item->pubDate;  //extrae la fecha
    $guid = $item->guid;  //extrae el link de la imagen
    $description = strip_tags($item->description);  //extrae la descripcion
    if (strlen($description) > 600) { //limita la descripcion a 600 caracteres
    $stringCut = substr($description, 0, 300);                   
    $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';}
    if ($i < 21) { // extrae solo 21 items
     echo '<div class="feed"><h2><a href="'.$link.'" target="_blank">'.$title.'</a></h2><br><img src="'.$guid.'"><br>'.$description.'<br><div class="time">'.$date.'</div></div>';}
     $i++;}
	echo '<div style="clear: both;"></div>';}
                 */
include ("menu.php");


?>
<div class="container">
    <a href="/Proyecto_Contadores/normativa.php" ><h4>
        <i class="fas fa-arrow-circle-left"></i> Volver</h4>  </a>
        <!--<?PHP 
        //$texto = file_get_contents("http://www.sil2.com.ar/laboralonline/novlab1403.htm");
        //print('<center><h4 readonly> '.$texto.'</h4>');
        ?>-->
<center><object type="text/html" data="http://www.sil2.com.ar/laboralonline/novlab1403.htm" frameborder="0" allowfullscreen width="100%" height="100%"></object></center>
</div>