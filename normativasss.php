<?PHP
 session_start ();
  ?>
 


<script src="magpierss/rss_fetch.inc"></script>

<?PHP include ("menu.php");




$url = "  http://contenidos.lanacion.com.ar/herramientas/rss/origen=2";

$rss = fetch_rss($url);

$items = array_slice($rss->items, 0);

$max_noticias = 30;
$cont = 0;

print('<h1> Titulares</h1>');
print ('<marquee scrollamount="1" direction="up" loop="true" onmouseover="this.stop()" onmouseout="this.start()" align="left">');
 while(!empty($items[$cont])&&($cont<$max_noticias))
 {

  print ('<b>titulo:</b> '.$items[$cont]["title"].'<br>');
  print (' <b>Fecha:</b> '.$items[$cont]["updated"].'<br>');
  print ('<a href="'.$items[$cont]["link"].'" target="_blank">'.$items[$cont]["title"].'</a><br>');
  print ($items[0]["updated"].'<br>');
  print ($items[0]["summary"].'<br>');
$cont++;
}
print ('</marquee>');




?>