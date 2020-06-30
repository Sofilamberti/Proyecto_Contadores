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
$costo=$_GET['costoNumero'];
$costoEscrito=$_GET['costoEscrito'];

$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("error al buscar cliente al usuario");

while($row = $resultado->fetch_assoc())
{
  
$nombre=$row["nombre"];
$apellido=$row["apellido"];

}   


$pdf = new PDF();
$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte
$pdf->AddPage();


////----------------------
$pdf->SetFont('Arial','B',15);
$pdf->SetY(10);////si disminuye sube ||||si aumenta baja
$pdf->SetX(30);

$pdf->Cell(50,10,$nombre,0,0,'C');
$pdf->SetY(10);////si disminuye sube ||||si aumenta baja
$pdf->SetX(53);
$pdf->Cell(50,10,$apellido,0,0,'C');


$pdf->SetY(60);////si disminuye sube ||||si aumenta baja
$pdf->SetX(75);////si disminuye se mueve para izquierda ||||si aumenta mueva para derecha
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(50);

$pdf->Image('presupuesto1.png',45,62,170,60);

$pdf->Image('presupuesto2.png',45,130,170,60);


$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(50,43,67);

$pdf->SetY(190);////si disminuye sube ||||si aumenta baja
$pdf->SetX(55);
$pdf->Cell(50,5,"costo mensual",0,0,'C');

$pdf->SetY(190);////si disminuye sube ||||si aumenta baja
$pdf->SetX(135);

$pdf->Cell(50,5,$costo,0,0,'C');

$pdf->SetY(200);////si disminuye sube ||||si aumenta baja
$pdf->SetX(135);
$pdf->SetFont('Arial','B',17);
$pdf->Cell(50,5,$costoEscrito,0,0,'C');
/*
$pdf->Cell(50,10,'ASESORAMIENTO IMPOSITIVO MENSUAL',0,0,'C');

$pdf->SetFont('Arial','B',13);
$pdf->SetY(70);
$pdf->SetX(29);
$pdf->Cell(50,10,'Tareas',0,0,'C');


$pdf->SetFont('Arial','',11);
$pdf->SetY(80);
$pdf->SetX(60);
$pdf->Write(6,'O Confeccion y envio mensual de la Declaracion Jurada de Ingresos Brutos de ');
$pdf->SetY(86);
$pdf->SetX(60);
$pdf->Write(6,'tu provincia (en los casos que corresponda).');

$pdf->SetY(96);
$pdf->SetX(60);
$pdf->Cell(50,10,'O Confeccion semestral Declaracion Jurada Monotributo y determinacion de categoria.',0,0,'L');


$pdf->SetY(106);
$pdf->SetX(60);
$pdf->Cell(50,10,'O Control y envio al cliente de compras y ventas mensuales
declaradas en AFIP.',0,0,'L');


$pdf->SetY(200);
$pdf->SetX(70);
$pdf->SetDrawColor(249, 205, 43);
$pdf->SetLineWidth(3);
$pdf->Line(70, 200, 200, 200);
$pdf->Cell(50,10,'Forma de pago: transferencia o deposito. Precio valido hasta Septiembre',0,0,'L');
$pdf->SetY(206);
$pdf->SetX(70);
$pdf->Cell(50,10,'2020 inclusive,posteriormente seran ajustados de acuerdo a lo establecido ',0,0,'L');
$pdf->SetY(212);
$pdf->SetX(70);
$pdf->Cell(50,10,'por el Consejo Prof. de Cs. Económicas de la Provincia de La Pampa.',0,0,'L');
$pdf->SetY(218);
$pdf->SetX(70);
$pdf->Cell(50,10,'La continuidad del servicio depende del cumplimiento del pago del honorario',0,0,'L');

$pdf->SetY(224);
$pdf->SetX(70);
$pdf->Cell(50,10,'mensual del 1 al 10 de cada mes (Ej.: los servicios prestados en Mayo se pagan',0,0,'L');
$pdf->SetY(230);
$pdf->SetX(70);
$pdf->Cell(50,10,'del 1 al 10 de Junio).',0,0,'L');


*/




/////----------------------


while($row = $resultado->fetch_assoc())
{

    



}    
$pdf->Output();


?>
