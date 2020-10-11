<?PHP
 session_start ();
  ?>
  
<?php
require('pdf/fpdf.php');

include ("conexion.php");

$id_cuenta=$_SESSION['cuenta'];
$dni=$_GET['dni'];
$titulo=$_GET['titulo'];
$tipoCosto=$_GET['tipoCosto'];
$costoTotal=$_GET['costoTotal'];
$elemento=$_GET['idElemento'];
$nombreProfesional=$_GET['nombreProfesional'];
$profesion=$_GET['profesion'];
$matricula=$_GET['matricula'];
$textArea=$_GET['textArea'];
//print($textArea);
$arrayTextArea=explode("}",$textArea);// puse en cada salto de linea una } entonces aca armo u array con cada linea, para despues poder ponerlo con el formato que lo ingresaron en el text area




$fecha = date('d-m-Y');
////////////////////////////////////////////////////////
$instruccion= "select * from cliente where dni='$dni'";

$resultado = mysqli_query ($conexion, $instruccion) or die ("error al buscar cliente al usuario");
////////////////////////////////////////////////////////////////////
$instruccionCuenta="select * from cuenta where id='$id_cuenta'";
$resultadoCuenta = mysqli_query ($conexion, $instruccionCuenta) or die ("error al buscar cuenta");
//////////////////////////////consulta par tener las tareas//////////////////////////////////////

$instruccionTarea="select * from detalle where id_elemento='$elemento' and id_cuenta='$id_cuenta'";
$tareas = mysqli_query ($conexion, $instruccionTarea) or die ("error al buscar cuenta");

/////////////////////////////consulta para tener nombre de elemento///////////////////////////////////////
$instruccionElemento="select * from elemento where id_elemto='$elemento' and id_cuenta='$id_cuenta'";
$nombreElemento = mysqli_query ($conexion, $instruccionElemento) or die ("error al buscar cuenta");
/*
while($row0 = $nombreElemento->fetch_assoc())
{
  
$nombreElemento=$row0["nombre"];


}
*/
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


$x=0;
$y=0;

$pdf = new FPDF('P','mm',array(1655,2340));
$pdf->AddPage();
$pdf->SetFont('Arial','B',100);
$pdf->Image('propuesta.png',0,0,1655,2340);

$pdf->SetTextColor(64,67,68);

//$pdf->SetTitle( "holaa", true);
//$pdf->AliasNbPages();///esto es para que siempre se generen los pies de paginas en cada reporte
$pdf->SetY(140);
$pdf->SetX(1338);
$pdf->Cell(0,0,$fecha,0,0,'C');

$pdf->SetFontSize(190);
$pdf->SetY(200);
$pdf->SetX(1250);
$pdf->Cell(0,0,$titulo,0,0,'C');

$pdf->SetFontSize(100);
$pdf->SetY(270);
$pdf->SetX(650);
$pdf->Cell(10,12,$nombre,0,0,'L');
$pdf->SetY(270);
$pdf->SetX(833);
$pdf->Cell(10,12,$apellido,0,0,'L');

$pdf->SetY(530);
$pdf->SetX(660);
$pdf->Cell(50,10,"Probando",0);


$pdf->SetY(590);
$pdf->SetX(660);
$x=$pdf->GetX();
$y=$pdf->Gety();   
$pdf->SetTextColor(64,67,68);
//$pdf->MultiCell(0,50,"probando \n asasdasd \n asASA ", 0, 'L', false);
foreach ( $arrayTextArea as $row3) 
{
   $pdf->SetTextColor(50);
    $pdf->SetFont('','B');
    $pdf->SetDrawColor(128,100,10);
     
     $pdf->Image('puntoItem.png',$x-40,$y-10,28,29);
      $pdf->MultiCell(0,50,$row3,0, 'L', false);
        $pdf->Ln();
      $y=$y+40;
      $pdf->SetY($y);
      $pdf->SetX(660);
 

}
//$pdf->MultiCell(0,50,$textAre, 0, 'L', false);

/*while($row22 = $tareas->fetch_assoc()  )
{
/*
    $pdf->SetTextColor(50);
    $pdf->SetFont('','B');
    $pdf->SetDrawColor(128,100,10);
     
     $pdf->Image('puntoItem.png',$x-40,$y-10,28,29);
      $pdf->Cell(50,10,$row22["descripcion"],0);
      $y=$y+40;
      $pdf->SetY($y);
      $pdf->SetX(660);


}   

*/
///linea griss
$pdf->SetDrawColor(255 , 255, 255);
$pdf->SetFillColor(255, 255, 255);

//$pdf->Line(833, 1700, 1610, 1700);aca esta tapando la linea gris
$pdf->Rect(830, 1600,777, 15,'F');
//////////////////////////////////no sirve pegar una imagen en blanco o usar un pdf si nlinea gris/////////////////////////////////////


$y=$y+100;

$pdf->SetY($y-50);
$pdf->SetX(830);
$pdf->Cell(54,8,$tipoCosto,0,0,'L');


$pdf->SetY($y-50);
$pdf->SetX(1300);
$pdf->Cell(54,8,$costoTotal,0,0,'L');

$pdf->SetDrawColor(168 , 174, 175);
$pdf->SetFillColor(168 , 174, 175);
$pdf->Rect(830, $y,777, 15,'F');


$y=$y+300;
$x=$x+430;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(54,8,$nombreProfesional,0,0,'L');


$pdf->SetY($y+50);
$pdf->SetX($x-30);
$pdf->Cell(54,8,$profesion,0,0,'L');

if($y+100>2250)
{

  $pdf->AddPage();
  $pdf->Image('paginaExtra.png',0,0,1655,2340);
  
}

$pdf->SetY($y+100);
$pdf->SetX($x+10);
$pdf->Cell(54,8,$matricula,0,0,'L');

$pdf->SetY(2250);





///

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


