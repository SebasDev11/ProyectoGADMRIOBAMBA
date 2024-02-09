<?php
$hostname = 'localhost';
$database = 'gadmovilidadr';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno) {
    echo "No se puede conectar al servidor de base de datos";
}

include 'plantilla.php';

$query = "SELECT c.*, u.Nombre as NombreUsuario
        FROM cooperativa c
        JOIN usuario u ON c.Id_Usuario = u.Id_Usuario";
$resultado = $conexion->query($query);

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);

$pdf->SetX(15);

$pdf->Cell(52, 6, 'Nombre Cooperativa', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Socio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Ruc', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Direccion', 1, 0, 'C', 1);
$pdf->Cell(42, 6, 'Contacto', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 7);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(15);
    $pdf->Cell(52, 6, utf8_decode($row['Nombre']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['NombreUsuario']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['Ruc']), 1, 0, 'C');
    $pdf->Cell(25, 6, utf8_decode($row['Direccion']), 1, 0, 'C');
    $pdf->Cell(42, 6, utf8_decode($row['Contacto']), 1, 1, 'C');
}

$pdf->Output('Re_Cooperativa.pdf', 'D');
?>
