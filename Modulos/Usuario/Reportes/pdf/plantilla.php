<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    function Header()
    {
        $imagePath = 'images/GobiernoAutónomoRiobamba.png';
        $imageWidth = 140; // ancho de la imagen

        // Definir el ancho de la página
        $pageWidth = $this->GetPageWidth();

        // Calcular la coordenada x para centrar la imagen
        $x = ($pageWidth - $imageWidth) / 2;

        // Coordenada y de la imagen
        $y = 4; // coordenada y de la imagen

        // Agregar la imagen centrada horizontalmente
        $this->Image($imagePath, $x, $y, $imageWidth);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30);
        $this->Cell(150, 50, 'Reporte De Usuarios', 0, 0, 'C');

        $this->Ln(35);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(800, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
?>
