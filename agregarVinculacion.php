<?PHP
 session_start ();
 ?>
 
      
 <?PHP   
   include ("conexion.php");
   $v1= $_GET["cuit"];
   $v2= $_GET["usuario"];
   $v3= $_GET["obligacion"];
   $vec = explode(",", $v3);//saco las comillas y me devuelve un vector con todos los id de las sobligaciones

      $id_cuenta=$_SESSION['cuenta'];
      //print($vec);
      for($i=0;$i<count($vec);$i++){
       // print($vec[$i]);
        $ob=$vec[$i];
        $cu=$v1;
        //consulta para ver si la asociacion de la obligacion y el cliente ya esta hecha y asi evitar repetidas
         $ins= "select * from obligacionxcliente where id_cuenta='$id_cuenta' and Cliente_cuit='$cu' and Obligacion_id='$ob'"; 
          $cons = mysqli_query ($conexion, $ins) or die ("Fallo en la consulta 1");
         
        $nfilas2 = mysqli_num_rows ($cons);
        if($nfilas2==0) {
           $instruccion ="insert into  obligacionxcliente (Cliente_cuit,Obligacion_id,id_cuenta) values ('$cu','$ob','$id_cuenta')";

           mysqli_query ($conexion, $instruccion) or die ("Fallo en la consulta 1");
           
          
          
          $instruccion2 = "insert into oxcxusuario (id_ob, id_user, id_cuenta,cuit_cliente)  values ('$ob','$v2','$id_cuenta','$v1')";
      mysqli_query($conexion, $instruccion2) or die ("Fallo en insertar  en la tabla");
        }
       else{ ?>
        <script type="text/javascript">


          alertify.success("ya existe la vinculacion");
        
  
     

</script>
<?PHP
       }
        
}


         
?>