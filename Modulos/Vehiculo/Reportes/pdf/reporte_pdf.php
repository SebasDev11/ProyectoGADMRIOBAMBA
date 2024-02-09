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

// Consulta para obtener datos de vehículo con nombre de cooperativa y usuario
$query = "SELECT v.*, c.Nombre as NombreCooperativa, u.Nombre as NombreUsuario
        FROM vehiculo v
        JOIN cooperativa c ON v.Id_Cooperativa = c.Id_Cooperativa
        JOIN usuario u ON v.Id_Usuario = u.Id_Usuario";
$resultado = $conexion->query($query);

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);

$pdf->SetX(0.5);

$pdf->Cell(15, 6, 'Marca', 1, 0, 'C', 1);
$pdf->Cell(10, 6, utf8_decode('Año'), 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'Placa', 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'Sticker', 1, 0, 'C', 1);
$pdf->Cell(42, 6, utf8_decode('Numero de Resolución'), 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Socio', 1, 0, 'C', 1);
$pdf->Cell(52, 6, 'Cooperativa', 1, 0, 'C', 1);
$pdf->Cell(35, 6, utf8_decode('Fecha Resolución'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 7);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(0.5);
    $pdf->Cell(15, 6, utf8_decode($row['Marca']), 1, 0, 'C');
    $pdf->Cell(10, 6, utf8_decode($row['Anio']), 1, 0, 'C');
    $pdf->Cell(15, 6, utf8_decode($row['Placa']), 1, 0, 'C');
    $pdf->Cell(15, 6, utf8_decode($row['Sticker']), 1, 0, 'C');
    $pdf->Cell(42, 6, utf8_decode($row['Numero_resolucion']), 1, 0, 'C');
    $pdf->Cell(25, 6, utf8_decode($row['NombreUsuario']), 1, 0, 'C'); // Muestra el nombre de usuario
    $pdf->Cell(52, 6, utf8_decode($row['NombreCooperativa']), 1, 0, 'C'); // Muestra el nombre de la cooperativa
    $pdf->Cell(35, 6, utf8_decode($row['Fecha_resolucion']), 1, 1, 'C');
}

$pdf->Output('Re_Vehiculo.pdf', 'D');
?>
