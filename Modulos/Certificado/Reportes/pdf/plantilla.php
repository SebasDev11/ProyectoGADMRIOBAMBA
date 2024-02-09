<?php
include('../../../../DAO/DAO.php');
require 'force_justify.php';

class CertificadoPDF
{
    public static function generarCertificado($certificado)
    {
        // Creamos el PDF
        $pdf = new FPDF();

        // Añadir página al PDF
        $pdf->AddPage();
        
        // Añadir fuente Montserrat (asegúrate de tener el archivo Montserrat-Regular.php en la misma carpeta)
        $pdf->AddFont('Montserrat-Regular', '', "Montserrat-Regular.php");

        // Rest of your code...

        // Creamos el marco
        function crearMarco($pdf)
        {
            $pdf->Rect(15, 7, $pdf->GetPageWidth() - 30, $pdf->GetPageHeight() - 40);
        }

        crearMarco($pdf);  // Pass $pdf when calling crearMarco()

        // Contenido del certificado
        $pdf->SetFont('Montserrat-Regular', '', 12);
		$imagePath = 'images/GobiernoAutónomoRiobamba.png';
		$imageWidth = 120; // ancho de la imagen
		
		// Definir el ancho de la página
		$pageWidth = $pdf->GetPageWidth();
		
		// Calcular la coordenada x para centrar la imagen
		$x = ($pageWidth - $imageWidth) / 2;
		
		// Coordenada y de la imagen
		$y = 4; // coordenada y de la imagen
		
		// Agregar la imagen centrada horizontalmente
		$pdf->Image($imagePath, $x, $y, $imageWidth);
        $pdf->SetY(50); // Establece la posición Y en 50 unidades desde el borde superior
		$pdf->Cell(0, 10, utf8_decode('Nº ') .($certificado['Numero_certificacion']), 0, 1, 'C');
        $pdf->SetY(75);
        $pdf->Cell(0, 10, utf8_decode('CERTIFICACIÓN'), 0, 1, 'C');
        $pdf->SetY(95);

        // Concatenar todas las líneas en una sola cadena
        $texto = 'Certifico que el Señor (a) '. $certificado['Apellido']. ' ' .$certificado['Nombre_Usuario'] . ' CI ' . $certificado['Cedula'] . ' de acuerdo '
            . 'a la Resolución Nº ' . $certificado['Numero_resolucion'] . ', con fecha ' . $certificado['Fecha_resolucion'] . ' y que consta '
            . 'en los archivos de este organismo y socio de la COOPERATIVA DE TRANSPORTE URBANO ' . $certificado['nombre_cooperativa'] . ' RUC ' . $certificado['Ruc'] . ' con su vehículo Marca ' . $certificado['Marca']
            . ' AÑO ' . $certificado['Anio'] . ' PLACA ' . $certificado['Placa'] . ' STICKER ' . $certificado['Sticker'].'.';

// Establecer el margen izquierdo y derecho en 3 cm (aproximadamente 85.05 puntos por centímetro)
$margin = 20;

// Establecer el margen izquierdo y derecho
$pdf->SetLeftMargin($margin);
$pdf->SetRightMargin($margin);

// Ajustar la altura de la celda (ajusta según sea necesario)
$pdf->SetFontSize(10);

// Configurar el interlineado
$interlineado = 1.8;

// Mostrar el texto en un solo párrafo justificado
$pdf->MultiCell(0, 10 / $interlineado, utf8_decode($texto));

// Salto de línea para restablecer el interlineado
$pdf->Ln(10);

        // Fecha de emisión y firma
		$pdf->SetY(157);
        $pdf->Cell(0, 10, $certificado['fecha_emision'].'.', 0, 1, 'L');
		$pdf->SetY(210);
        $pdf->Cell(0, 10, 'Ing. Silvia Vaca B.', 0, 1, 'C');
        $pdf->Cell(0, 10, 'FUNCIONARIO DGMTT-GADM-R', 0, 1, 'C');
        $imagePath = 'images/LogoRiobamba2023.png';
		$x = 20; // coordenada x de la imagen
		$y = 247; // coordenada y de la imagen
		$width = 40; // ancho de la imagen
		// Agrega la imagen a la izquierda
		$pdf->Image($imagePath, $x, $y, $width);

		$imagenPath = 'images/AvenidaPRiobamba.png';
		// Ancho de la página
		$pageWidth = $pdf->GetPageWidth();

		// Ancho de la imagen
		$imageWidth = 120;

		// Coordenada y para la imagen (puedes ajustar según sea necesario)
		$y = 238;

		// Coordenada x para la imagen
		$imageX = $pageWidth - $imageWidth - 9; // 10 es un espacio entre la imagen y el borde derecho

		// Agregar la imagen a la derecha
		$pdf->Image($imagenPath, $imageX, $y, $imageWidth);
        $pdf->SetFont('Montserrat-Regular', '', 8);

		$textoT = utf8_decode('Teléfonos: (03) 2376046 - 2377176 - 2377193 Ext 2001');

		// Nueva posición en y
		$y = 258;

		// Agregar el texto con letra más pequeña y nueva posición en y
		$pdf->SetY($y);
		$pdf->Cell(0, 5, $textoT, 0, 1, 'R');

        // Guardar o mostrar el PDF según sea necesario
		$pdf->Output($certificado['Apellido'].'_'. $certificado['Numero_certificacion'] . '.pdf', 'I');
    }
}
?>
