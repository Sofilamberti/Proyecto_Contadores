<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["cuit"];
   $v2= $_GET["usuario"];
   $v3= $_GET["tarea"];
 $v3 = str_replace(',', '', $v3);
  print(strlen($v3));
      $id_cuenta=$_SESSION['cuenta'];
      for($i=0;$i<strlen($v3);$i++){
        $tarea=$v3[$i];
        $cu=$v1;
   $instruccion ="select * from tareaxcliente where id_cuenta='$id_cuenta' and id_cliente='".$cu."' and id_tarea='".$tarea."'";

    $con=mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");

        $nfilas2 = mysqli_num_rows ($con);
        if($nfilas2==0) {
           $instruccion ="insert into  tareaxcliente (id_cliente,id_tarea,id_cuenta) values ('$cu','$tarea','$id_cuenta')";

            mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");
            $ins2= "select * from tareaxcliente where id_cuenta='$id_cuenta' and id_cliente='$cu' and id_tarea='$tarea'"; 
          $cons2 = mysqli_query ($conexion, $ins2) or die ("Fallo en la consulta 1");
          $res5 = mysqli_fetch_array ($cons2);
          //pongo esto aca para evitar cargar repetidas las cosas, las viculaciones de la obligacion con el cliente se hacen aca tambien, o sea que al eliminar la vinculacion del cliente con un determinado usuario y una obligacion se elimina la vinculacion del cleinte con la obligacion
          $id=$res5['id_txc'];
          $instruccion2 = "insert into txcxusuario (id_txc, id_user, id_cuenta)  values ('$id','$v2','$id_cuenta')";
      mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla");
        }
}

        
?>