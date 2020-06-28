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
   
   $this->SetDrawColor(12, 80, 40);
   $this->SetFillColor(249, 205, 43);
 ////  $this->SetFillColor(39, 184, 203);
   $this->Rect(0, 0, 40, 700,'F');
  //  $this->Image('presupuesto.png');

    $this->SetDrawColor(12, 80, 40);
    $this->SetFillColor(249, 205, 43);
    $this->Rect(40, 30,200, 30,'F');



    $this->SetY(40);////si disminuye sube ||||si aumenta baja
    $this->SetX(100);////si disminuye se mueve para izquierda ||||si aumenta mueva para derecha
    $this->SetFont('Arial','B',14);
    $this->SetTextColor(65);
    $this->Cell(50,10,'Nos encantaria ser los asesores contables externos de tu negocio.',0,0,'C');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
  ///  $this->Cell(190);
    // Título
    $this->SetY(10);////si disminuye sube ||||si aumenta baja
    $this->SetX(140);////si disminuye se mueve para izquierda ||||si aumenta mueva para derecha
    $this->SetFont('Arial','B',35);
    $this->Cell(50,10,'PROPUESTA',0,0,'C');
    // Salto de línea
    $this->Ln(20);


}




// Pie de página
function Footer()
{
    
    $this->SetY(-50);
    // Arial italic 8
    $this->SetX(120);
    $this->SetFont('Arial','I',14);
    $this->SetTextColor(15);

    $this->Cell(50,10,'Nicolas Aguilar',0,0,'C');

    $this->SetY(-39);
    $this->SetX(120);
    $this->Cell(50,5,'Departamento Contable',0,0,'C');

    $this->SetTextColor(70);

    $this->SetY(-33);
    $this->SetX(120);
    $this->Cell(50,5,'Contador Publico',0,0,'C');

    $this->SetY(-27);
    $this->SetX(120);
    $this->Cell(50,5,'Tomo XIII Folio 2 - C.P.C.E.L.P.',0,0,'C');

    $this->SetFont('Arial','I',12);
  
    
    $this->SetY(-20);
    $this->SetX(120);
    $this->Cell(50,5,'Calle 9 N° 2482 Planta Alta - General Pico (LP)',0,0,'C');

    $this->SetY(-15);
    $this->SetX(120);
    $this->Cell(50,5,'(02302) 15531999',0,0,'C');

    $this->SetY(-8);
    $this->SetX(120);
    $this->Cell(50,5,'contacto@estudiopymes.com - Instagram: estudio.pymes',0,0,'C');
    

  
    


}
}





$dni=$_GET['dni'];

$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("error al buscar cliente al usuario");


$pdf = new PDF();
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte
$pdf->AddPage();


////----------------------




$pdf->SetY(60);////si disminuye sube ||||si aumenta baja
$pdf->SetX(75);////si disminuye se mueve para izquierda ||||si aumenta mueva para derecha
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(50);
$pdf->Cell(50,10,'ASESORAMIENTO IMPOSITIVO MENSUAL',0,0,'C');

$pdf->SetFont('Arial','B',13);
$pdf->SetY(70);
$pdf->SetX(29);
$pdf->Cell(50,10,'Tareas',0,0,'C');


$pdf->SetFont('Arial','',11);
$pdf->SetY(80);
$pdf->SetX(60);
$pdf->Write(6,'Confeccion y envio mensual de la Declaracion Jurada de Ingresos Brutos de tu provincia (en los casos que corresponda).');




/////----------------------


while($row = $resultado->fetch_assoc())
{

    



}    
$pdf->Output();


?>
