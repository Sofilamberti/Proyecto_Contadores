<?PHP
 session_start ();
  ?>
  
<?php
require('pdf/fpdf.php');

include ("conexion.php");
$id_cuenta=$_SESSION['cuenta'];

$dni=$_GET['dni'];


$numResolucion=$_GET['numResolucion'];
$honorarios=$_GET['honorarios'];
$honorariosLetra=$_GET['honorariosLetra'];
$nombreProfesional=$_GET['nombreProfesional'];
$profesion=$_GET['profesion'];


$matricula=$_GET['matricula'];
$costoNumero=$_GET['costo'];
$costoEscrito=$_GET['costoEscrito'];


$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("error al buscar cliente al usuario");

while($row = $resultado->fetch_assoc())
{
  
$nombre=$row["nombre"];
$apellido=$row["apellido"];

}



$pdf = new FPDF('P', 'mm','Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Image('honorarios.png',0,0,215,355);
//$pdf->SetTitle( "holaa", true);
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte

$pdf->SetY(35);
$pdf->SetX(01);
$pdf->Cell(0,0,$nombre,0,0,'C');
$pdf->Output();


?>


