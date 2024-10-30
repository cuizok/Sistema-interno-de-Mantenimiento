<?php

require_once ('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,' ',0,0,'C');
    // Salto de línea
   
    $this->Ln(0);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->Cell(30,10,'',1,0,'C',0);
    $this->Cell(100,10,'Orden de servicio de mantenimiento',1,0,'C',0,);
    $this->Cell(27,10,'Codigo',1,0,'C',0);
    $this->Cell(27,10,'F-MT-003',1,0,'C',0);
    
    
    
    $this->Ln(10);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->image('../img/sgc.jpeg', 15, 32, 15);
    $this->Cell(30,10,'',1,0,'C',0);
    $this->Cell(100,10,'',1,0,'C',0,);
    $this->Cell(27,5,'Revision',1,0,'C',0);
    $this->Cell(27,5,'2',1,0,'C',0);//
    
    
    $this->Ln(5);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->Cell(30,5,'',1,0,'C',0);
    $this->Cell(100,5,'',1,0,'C',0,);
    $this->Cell(27,5,'pagina',1,0,'C',0);
    $this->Cell(27,5,'1 de 1',1,0,'C',0);
    
	
    
    
    
     
    
    
     $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->Cell(25,10,'Fecha',1,0,'C',0);
    $this->Cell(40,10,'Semana',1,0,'C',0,);
    $this->Cell(27,10,'Maquina',1,0,'C',0);
    $this->Cell(27,10,'Codigo',1,0,'C',0);
    $this->Cell(40,10,'Departamento',1,0,'C',0);
    $this->Cell(30,10,'Orden',1,1,'C',0);

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

$conexion=mysqli_connect("localhost","root","DgZwUGraQsU2pHq","pdo");
$consulta = "SELECT ordenes.idordenes, ordenes.maquina FROM ordenes";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(8);

    $pdf->Cell(25,10,$row['idordenes'],1,0,'C',0);
    $pdf->Cell(40,10,$row['idordenes'],1,0,'C',0);
	$pdf->Cell(27,10,$row['idordenes'],1,0,'C',0);
    $pdf->Cell(27,10,$row['idordenes'],1,0,'C',0);
    $pdf->Cell(40,10,$row['idordenes'],1,0,'C',0);
    $pdf->Cell(30,10,$row['idordenes'],1,1,'C',0);
    
    
    
    
    
	


} 


	$pdf->Output();
?>