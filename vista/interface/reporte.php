<?php
require_once("../../fpdf186/fpdf.php");
require_once("../../modelo/conexion.php");
$sqlSelect = "select * from estudiante";
$respuesta = $conn ->query($sqlSelect);
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont("Arial","B",14);
$pdf -> Cell(50,10,"Cedula",1,0,"C");
$pdf -> Cell(50,10,"Nombre",1,0,"C");
$pdf -> Ln();
while ($row = $respuesta -> fetch_Object()) {
    $cedula = $row -> est_cedula;
    $nombre = $row->est_nombre;
    $pdf -> Cell(50,10,$cedula,1,0,"C");
    $pdf -> Cell(50,10,$nombre,1,0,"C");
    $pdf -> Ln();
}
$pdf -> Output();
?>