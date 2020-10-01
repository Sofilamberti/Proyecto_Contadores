<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["cuit"];
   $v2= $_GET["usuario"];
   $v3= $_GET["tarea"];
  $vec = explode(",", $v3);
  //print(strlen($v3));
      $id_cuenta=$_SESSION['cuenta'];
      for($i=0;$i<count($vec);$i++){
        $tarea=$vec[$i];
        $cu=$v1;
   $instruccion ="select * from tareaxcliente where id_cuenta='$id_cuenta' and id_cliente='".$cu."' and id_tarea='".$tarea."'";

    $con=mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");

        $nfilas2 = mysqli_num_rows ($con);
        if($nfilas2==0) {
           $instruccion ="insert into  tareaxcliente (id_cliente,id_tarea,id_cuenta) values ('$cu','$tarea','$id_cuenta')";

            mysqli_query($conexion, $instruccion) or die ("Fallo en consulta  en la tabla");
           
          //pongo esto aca para evitar cargar repetidas las cosas, las viculaciones de la obligacion con el cliente se hacen aca tambien, o sea que al eliminar la vinculacion del cliente con un determinado usuario y una obligacion se elimina la vinculacion del cleinte con la obligacion
    
          $instruccion2 = "insert into txcxusuario (id_tarea, id_user, id_cuenta, cuit_cliente)  values ('".$tarea."','$v2','$id_cuenta','$v1')";
      mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla");
        }
}

        
?>