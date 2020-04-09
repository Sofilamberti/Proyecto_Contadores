<?PHP
 

  ?>
<HTML>
<HEAD>
<TITLE>Aca va el nombre del programa </TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
   div{
      border-radius: 5px;
      
   }
   
   .contenido{
      height:80px;
      width:15%;
      float:left;
      margin: 80px;
   }
   
 
    footer{
      
   position:fixed;
   left:0px;
   bottom:0px;
   height:70px;
   width:100%;

    }
    div.footer { 
      background-color:#6f42c1;
      position:fixed;
      left:0px;
      bottom:70px;
      height:20px;
      width:100%;
    }


</style>
</HEAD>

<BODY>
   <center>
    <div class="container">
     <br>
      <br>
      <h1 class="display-4">Iniciar Sesion!</h1>
      <p class="lead">
       

 <FORM NAME="login" ACTION="" METHOD="POST">
  <div class="form-group">
   <label for="Usuario">Usuario</label>
  <input type="text" class="form-control" id="usuario" name="usuario" required autofocus>
                
    
   <br>
      <label for="exampleInputPassword1">Clave</label>
      <input type="password" class="form-control" id="clave"  name="clave"   required>
           
          <br>
          <button type="submit" class="btn btn-primary" name="submit">Login</button>

           </center>
          </div>
        </form>
    </p>
    </div>
    
    <?PHP
    if (isset($_POST['submit'])) {
        //Para ejecutar PHP script en Submit
      if (isset($usuario) && isset($clave))
   {

   // Comprobar que el usuario está autorizado a entrar
      $conexion = mysqli_connect ("localhost", "root", "")
         or die ("No se puede conectar con el servidor");
      mysqli_select_db ($conexion,"contadores")
         or die ("No se puede seleccionar la base de datos");
      //$salt = substr ($usuario, 0, 2);
/* crypt es una función que encripta un string dado ($usuario) a partir de un substring
($salt) que lo toma como semilla de encriptación en este caso son dos caracteres*/
    //$clave_crypt = crypt ($clave, $salt);
      $instruccion = "select * from usuario where user = ".$usuario." and password = ".$clave."";
      $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
      $nfilas = mysqli_num_rows ($consulta);
      mysqli_close ($conexion);

   // Los datos introducidos son correctos
      if ($nfilas > 0)
      {
         $usuario_valido = $usuario;
         $_SESSION['usuario_valido']=$usuario;
     //$_SESSION['usuariovalido']=1; //donde se coloca cualquier valor, en este caso
     //es un valor numerico
         header("Location: home.php");
        exit();
      }
   }
   else
   {
     header("Location: index.php");
        exit();
   }
 }
  else
   {
     header("Location: index.php");
        exit();
   }
   
  ?> 


</BODY>

<div class="footer" style="background-color:#6f42c1;">
       
      </div>
    <footer id="sticky-footer" class="py-4  text-white-50" style="background-color:#6f42c1;">
    <div class="container text-center" style="background-color:#6f42c1;">
      <small>Creado por SLJF</small>
    </div>
  </footer>


</HTML>


      
   

