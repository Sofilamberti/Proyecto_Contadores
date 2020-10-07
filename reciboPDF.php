<?PHP
 session_start ();
  ?>
  
<?php
require('pdf/fpdf.php');

include ("conexion.php");
$id_cuenta=$_SESSION['cuenta'];

$dni=$_GET['dni'];



$monto=$_GET['monto'];
$costoEscrito=$_GET['costoEscrito'];
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
  //falta la imagen
$direccion=$row2["direccion"];

$telefono=$row2["telefono"];

$email=$row2["email"];



}




$pdf = new FPDF('P', 'mm',array(1655,2340));
$pdf->AddPage();
$pdf->SetFont('Arial','B',100);
$pdf->Image('recibo.png',0,0,1655,2340);
//$pdf->SetTitle( "holaa", true);
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte
$pdf->SetY(140);
$pdf->SetX(1338);
$pdf->Cell(0,0,$fecha,0,0,'C');

$pdf->SetY(233);
$pdf->SetX(650);
$pdf->Cell(10,12,$nombre,0,0,'L');
$pdf->SetY(233);
$pdf->SetX(833);
$pdf->Cell(10,12,$apellido,0,0,'L');


$pdf->SetY(470);
$pdf->SetX(1430);
$pdf->Cell(30,10,$numResolucion,1,1,'L');



$pdf->SetY(583);
$pdf->SetX(940);
$pdf->Cell(68,8,$consejoCienciasEconomicas,1,1,'L');


$pdf->SetY(880);
$pdf->SetX(1160);
$pdf->Cell(0,0,$costoNumero,0,0,'L');


$pdf->SetY(850);
$pdf->SetX(730);
$pdf->Cell(100,10,$costoEscrito,1,1,'L');

$pdf->SetY(1640);
$pdf->SetX(1000);
$pdf->Cell(54,8,$nombreProfesional,0,0,'L');

$pdf->SetY(1700);
$pdf->SetX(1050);
$pdf->Cell(54,8,$profesion,0,0,'L');

$pdf->SetY(1760);
$pdf->SetX(1075);
$pdf->Cell(54,8,$matricula,0,0,'L');





$pdf->SetY(2250);
$pdf->SetX(900);
$pdf->Cell(54,8,$direccion,1,1,'L');

$pdf->SetY(2250);
$pdf->SetX(1240);
$pdf->Cell(54,8,$telefono,1,1,'L');

$pdf->SetY(2300);
$pdf->SetX(1000);
$pdf->Cell(0,0,$email,0,0,'L');


$pdf->Output();


?>


