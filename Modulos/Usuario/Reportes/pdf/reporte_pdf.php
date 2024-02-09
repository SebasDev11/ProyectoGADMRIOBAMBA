<?php
$hostname = 'localhost';
$database = 'gadmovilidadr';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno) {
    echo "No se puede conectar al servidor de base de datos";
}
?>
<?php
include 'plantilla.php';

$query = "SELECT * from usuario";
$resultado = $conexion->query($query);

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);

// Establece la posición X para alinear a la izquierda
$pdf->SetX(2);  // Ajusta el valor según tus necesidades

$pdf->Cell(22, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(27, 6, 'Apellido', 1, 0, 'C', 1);
$pdf->Cell(16, 6, 'Cedula', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Correo', 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'Usuario', 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'Nivel', 1, 0, 'C', 1);
$pdf->Cell(80, 6, utf8_decode('Contraseña'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 6);
while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(2);  // Ajusta el valor según tus necesidades
    $pdf->Cell(22, 6, utf8_decode($row['Nombre']), 1, 0, 'C');
    $pdf->Cell(27, 6, utf8_decode($row['Apellido']), 1, 0, 'C');
    $pdf->Cell(16, 6, utf8_decode($row['Cedula']), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode($row['Correo']), 1, 0, 'C');
    $pdf->Cell(15, 6, utf8_decode($row['Usuario']), 1, 0, 'C');
    $pdf->Cell(15, 6, utf8_decode($row['Nivel']), 1, 0, 'C');
    $pdf->Cell(80, 6, utf8_decode($row['Contrasena']), 1, 1, 'C');
}

$pdf->Output('Re_Usuario.pdf', 'D');

