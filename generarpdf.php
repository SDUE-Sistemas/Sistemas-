<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
  
  include_once('info.php');
  $query = "SELECT pass FROM tecnicos WHERE tecnico='".$_COOKIE['usuario']."'";
  $statement = $db->prepare($query);
  $statement->execute();
  $usuario = $statement->fetch();
  $statement->closeCursor();
  }
else{
  header('Location: reportes.php');
}
if(!($usuario['pass']==$_COOKIE['password'])){
  header('Location: reportes.php');
}
?>

<?php
$folios=$_POST['folio'];
include_once('info.php');
$query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE folio LIKE $folios";
$statement = $db->prepare($query);
$statement->execute();
$reporte = $statement->fetch();
$statement->closeCursor();

$folio="FOLIO: ";
$folio .=$reporte['folio'];

$asunto="ASUNTO: ";
$asunto .=$reporte['asunto'];

$fecha="FECHA: ";
$fecha .=$reporte['fecha'];

$usuario="USUARIO: ";
$usuario .=$reporte['usuario'];

$departamento="DEPARTAMENTO: ";
$departamento .=$reporte['departamento'];

$tecnico="TECNICO: ";
$tecnico .=$reporte['tecnico'];

$e1="E1:";

$e1 .=$reporte['e1'];

$e2="E2:";

$e2 .=$reporte['e2'];

$e3="E3:";

$e3 .=$reporte['e3'];

$e4="E4:";

$e4 .=$reporte['e4'];

$detalles="DETALLES: ";

$detalles .=$reporte['detalles'];

$obser="____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";

require('fpdf/fpdf.php');
$texto = "Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case, it don't belong to me. Besides, I've already been through too much shit this morning over this case to hand it over to your dumb ass.";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);
$pdf->Image('img/LogoHorizontal.png',160,6,46,15);
$pdf->Image('img/SDUE.png',10,6,46,15);
$pdf->Cell(180,33,'SECRETARIA DE DESARROLLO URBANO Y ECOLOGIA',0, 1 ,'C');
$pdf->Ln(-8);
$pdf->Cell(0, 0,'OFICINA DE INFORMATICA',0,0, 'C');
$pdf->Ln(8);
$pdf->Ln(5);
$pdf->Cell(100, 0,$folio);
$pdf->Cell(0, 0,$fecha);
$pdf->Ln(8);
$pdf->MultiCell(180,5,$asunto);
$pdf->Ln(8);
$pdf->Cell(0,0,$usuario);
$pdf->Ln(8);
$pdf->Cell(0,0,$departamento);
$pdf->Ln(8);
$pdf->Cell(0,0,$tecnico);
$pdf->Ln(8);
$pdf->Cell(0,0,"ETIQUETAS",0, 0, 'C');
$pdf->Ln(8);
$pdf->Cell(10,0,"");
$pdf->Cell(50,0,$e1);
$pdf->Cell(50,0,$e2);
$pdf->Cell(50,0,$e3);
$pdf->Cell(20,0,$e4);
$pdf->Ln(8);
$pdf->Cell(0,0,"DETALLES",0 , 0, "C");
$pdf->Ln(8);
$pdf->MultiCell(180,10,$obser,0 , 1);
$pdf->Ln(8);
$pdf->Cell(20,5,"CAUSA: ",0 , 0);
$pdf->Cell(14,5,"FALLA",0 , 0);
$pdf->Cell(10,5,"",1 , 0);
$pdf->Cell(30,5,"CAPACITACION",0 , 0);
$pdf->Cell(10,5,"",1 , 0);
$pdf->Cell(45,5,"NUEVO REQUERIMIENTO",0 , 0);
$pdf->Cell(10,5,"",1 , 0);
$pdf->Cell(12,5,"SEDU",0 , 0);
$pdf->Cell(10,5,"",1 , 0);
$pdf->Ln(10);
$pdf->Cell(100,5,"FECHA Y HORA DE ATENCION:________________________________________");
$pdf->Ln(12);
$pdf->Cell(100,0,"FIRMA DEL USUARIO:");
$pdf->Cell(100,0,"FIRMA DEL TECNICO:");
$pdf->Ln(8);
$pdf->Cell(100,0,"________________________");
$pdf->Cell(100,0,"________________________");
$pdf->Output();
?>