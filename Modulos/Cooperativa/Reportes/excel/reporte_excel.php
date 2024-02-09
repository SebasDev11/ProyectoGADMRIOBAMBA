<?php
$hostname='localhost';
$database='vinculacion';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "No se puede conectar al servidor de base de datos";
}
?>
<?php
//Incluimos librería y archivo de conexión
require_once 'Classes/PHPExcel.php';


	$query = "SELECT * from seguimiento";
	$resultado = $conexion->query($query);


$fila = 9; //Establecemos en que fila inciara a imprimir los datos
$a;

//Objeto de PHPExcel
$objPHPExcel  = new PHPExcel();
//Propiedades de Documento
$objPHPExcel->getProperties()->setCreator("UNIVERSIDAD NACIONAL DE CHIMBORAZO")->setDescription("UNIVERSIDAD NACIONAL DE CHIMBORAZO");


$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('logo');
$objDrawing->setDescription('logo ');
$objDrawing->setPath('../pdf/images/logo1.png');
$objDrawing->setCoordinates('A1');
//setOffsetX works properly
$objDrawing->setOffsetX(6);
$objDrawing->setOffsetY(6);
//set width, height
$objDrawing->setWidth(80);
$objDrawing->setHeight(80);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$estiloTituloReporte = array(
	'font' => array(
		'name'      => 'Arial',
		'bold'      => true,
		'italic'    => false,
		'strike'    => false,
		'size' => 13
	),
	'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_NONE
		)
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	)
);

$estiloTituloColumnas = array(
	'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' => 10,
		'color' => array(
			'rgb' => 'FFFFFF'
		)
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => '538DD5')
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	),
	'alignment' =>  array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
	)
);

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array(
	'font' => array(
		'name'  => 'Arial',
		'color' => array(
			'rgb' => '000000'
		)
	),
	'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	),
	'alignment' =>  array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
	)
));

$objPHPExcel->getActiveSheet()->getStyle('A1:H6')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A8:H8')->applyFromArray($estiloTituloColumnas);

$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Reporte de Usuarios');
$objPHPExcel->getActiveSheet()->mergeCells('A6:H6');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Apellido');
$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Correo');
$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Usuario');
$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Nivel');
$objPHPExcel->getActiveSheet()->setCellValue('F8', 'Contrasena');

while ($rows = $resultado->fetch_assoc()) {

	$objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $rows['Nombre']);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $rows['Apellido']);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $rows['Correo']);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, $rows['Usuario']);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, $rows['Nivel']);
	$objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, $rows['Contrasena']);

	$fila++; //Sumamos 1 para pasar a la siguiente fila
}

$fila = $fila - 1;

$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A9:H" . $fila);

$filaGrafica = $fila + 2;

// definir origen de los valores
$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$D$7:$D$' . $fila);

// definir origen de los rotulos
$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$' . $fila);

// definir  gráfico
$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
);
$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

// inicializar gráfico
$layout = new PHPExcel_Chart_Layout();
$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));

// inicializar o gráfico
$chart = new PHPExcel_Chart('ejemplo', null, null, $plotarea);

// definir título do gráfico
$title = new PHPExcel_Chart_Title(null, $layout);
$title->setCaption('Gráfico PHPExcel Chart Class');

// definir posiciondo gráfico y título
$chart->setTopLeftPosition('B' . $filaGrafica);
$filaFinal = $filaGrafica + 10;
$chart->setBottomRightPosition('P' . $filaFinal);
$chart->setTitle($title);

// adicionar o gráfico à folha
$objPHPExcel->getActiveSheet()->addChart($chart);

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

// incluir gráfico
// $writer->setIncludeCharts(False);




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Re_Usuarios.csv"');
header('Cache-Control: max-age=0');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('php://output');
