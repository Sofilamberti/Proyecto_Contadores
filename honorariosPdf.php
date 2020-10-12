<?PHP
 session_start ();
  ?>
  
<?php
require('pdf/fpdf.php');

include ("conexion.php");
$id_cuenta=$_SESSION['cuenta'];

$dni=$_GET['dni'];


$numResolucion=$_GET['numResolucion'];//si
$honorarios=$_GET['honorarios'];//no
$honorariosLetra=$_GET['honorariosLetra'];//no
$consejoCienciasEconomicas=$_GET['consejoCienciasEconomicas'];
$mes=$_GET['mes'];



$nombreProfesional1=$_GET['nombreProfesional'];
$profesion1=$_GET['profesion'];
$matricula1=$_GET['matricula'];

$nombreProfesional2=$_GET['nombreProfesional2'];
$profesion2=$_GET['profesion2'];
$matricula2=$_GET['matricula2'];






$fecha = date('d-m-Y');

$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("error al buscar cliente al usuario");

$instruccionCuenta="select * from cuenta where id='$id_cuenta'";
$resultadoCuenta = mysqli_query ($conexion, $instruccionCuenta) or die ("error al buscar cuenta");

while($row = $resultado->fetch_assoc())
{
  
$nombre=$row["nombre"];
$apellido=$row["apellido"];

}


while($row2 = $resultadoCuenta->fetch_assoc())
{
  
$direccion=$row2["direccion"];

$telefono=$row2["telefono"];

$email=$row2["email"];



}


$pdf = new FPDF('P', 'mm',array(1655,2340));
$pdf->AddPage();
$pdf->SetFont('Arial','B',100);
$pdf->Image('honorarios.png',0,0,1655,2340);
//$pdf->SetTitle( "holaa", true);
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte

$pdf->SetY(140);
$pdf->SetX(1338);
$pdf->Cell(0,0,$fecha,0,0,'C');

$pdf->SetTextColor(85);

$pdf->SetY(233);
$pdf->SetX(650);
$pdf->Cell(10,12,$nombre,0,0,'L');
$pdf->SetY(233);
$pdf->SetX(803);
$pdf->Cell(10,12,$apellido,0,0,'L');


$pdf->SetY(470);
$pdf->SetX(1430);
$pdf->Cell(30,10,$numResolucion,1,1,'L');



$pdf->SetY(583);
$pdf->SetX(940);
$pdf->Cell(68,8,$consejoCienciasEconomicas,1,1,'L');


$pdf->SetY(865);
$pdf->SetX(1120);
$pdf->Cell(0,0,$honorarios,0,0,'L');


$pdf->SetY(860);
$pdf->SetX(730);
$pdf->Cell(100,10,$honorariosLetra,0,0,'L');


$pdf->SetY(915);
$pdf->SetX(1149);
$pdf->Cell(100,10,$mes,0,0,'L');


if($nombreProfesional2!=null)
{

  $pdf->SetY(1640);
$pdf->SetX(800);
$pdf->Cell(54,8,$nombreProfesional1,0,0,'L');

$pdf->SetY(1700);
$pdf->SetX(850);
$pdf->Cell(54,8,$profesion1,0,0,'L');

$pdf->SetY(1760);
$pdf->SetX(875);
$pdf->Cell(54,8,$matricula1,0,0,'L');

$pdf->SetY(1640);
$pdf->SetX(1300);
$pdf->Cell(54,8,$nombreProfesional2,0,0,'L');

$pdf->SetY(1700);
$pdf->SetX(1350);
$pdf->Cell(54,8,$profesion2,0,0,'C');

$pdf->SetY(1760);
$pdf->SetX(1375);
$pdf->Cell(54,8,$matricula2,0,0,'C');



}
else
{

  $pdf->SetY(1640);
  $pdf->SetX(1000);
  $pdf->Cell(54,8,$nombreProfesional1,0,0,'L');
  
  $pdf->SetY(1700);
  $pdf->SetX(1050);
  $pdf->Cell(54,8,$profesion1,0,0,'C');
  
  $pdf->SetY(1760);
  $pdf->SetX(1075);
  $pdf->Cell(54,8,$matricula1,0,0,'C');

}





$pdf->SetY(2250);
$pdf->SetX(900);
$pdf->Cell(54,8,$direccion,0,0,'L');

$pdf->SetY(2250);
$pdf->SetX(1240);
$pdf->Cell(54,8,$telefono,0,0,'L');

$pdf->SetY(2300);
$pdf->SetX(1000);
$pdf->Cell(0,0,$email,0,0,'L');


$pdf->Output();


?>


