<?PHP
 session_start ();
  ?>

<?php
require('pdf/fpdf.php');
include ("conexion.php");



class PDF extends FPDF
{
// Cabecera de página
function Header()
{					 
   // Logo
    //$this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->SetX(70);
    $this->Cell(50,10,'Datos de cliente ',0,0,'C');
    // Salto de línea
    $this->Ln(20);


}



// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}




///aca se tendria qeu recibir el dni del cliente que esta seleccionado en el select de archivo.php 
//$dni=$_GET["dni"];
$dni=$_GET['dni'];

$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("errro al buscar cliente al usuario");


$pdf = new PDF();
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);


while($row = $resultado->fetch_assoc())

{

    $pdf->SetTextColor(50);
    $pdf->SetFont('','B');
    $pdf->SetDrawColor(128,100,10);
    

    $pdf->Cell(50,10,"Nombre :",0,1,'C',0);

    $pdf->Cell(50,10,"Apellido :",0,1,'C',0);

    $pdf->Cell(50,10,"Cuit :",0,1,'C',0);
    $pdf->Cell(50,10,"Dni :",0,1,'C',0);
    $pdf->Cell(50,10,"Email :",0,1,'C',0);
    $pdf->Cell(50,10,"Tipo societario :",0,1,'C',0);

    $pdf->Cell(50,10,"Domicilio fiscal :",0,1,'C',0);
    $pdf->Cell(50,10,"Domicilio legal :",0,1,'C',0);
  


    $pdf->SetY(30);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["nombre"],0);
    $pdf->SetY(40);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["apellido"],0);
    $pdf->SetY(50);
    $pdf->SetX(65);
    $pdf->Cell(40,10,$row["cuit"],0);
    $pdf->SetY(60);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["dni"],0);
    $pdf->SetY(70);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["email"],0);
    $pdf->SetY(80);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["TipoSocietario_tipo_societario"],0);
    $pdf->SetY(90);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["domicilio_fiscal"],0);
    $pdf->SetY(100);
    $pdf->SetX(65);
    $pdf->Cell(50,10,$row["domicilio_legal"],0);




}    
$pdf->Output();


?>

