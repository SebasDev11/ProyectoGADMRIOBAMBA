<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["Id_Certificado"]))
{
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM certificado WHERE Id_Certificado= '".$_POST["Id_Certificado"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Numero_certificacion"] = $row["Numero_certificacion"];
		$output["Id_Usuario"] = $row["Id_Usuario"];
		$output["Apellido"] = $row["Apellido"];
		$output["Cedula"] = $row["Cedula"];
		$output["Numero_resolucion "] = $row["Numero_resolucion"];
		$output["Id_Cooperativa"] = $row["Id_Cooperativa"];
		$output["Ruc"] = $row["Ruc"];
		$output["Anio"] = $row["Anio"];
		$output["Placa"] = $row["Placa"];
		$output["Sticker "] = $row["Sticker"];
		$output["fecha_emision"] = $row["fecha_emision"];
		$output["fecha_emision"] = $row["fecha_emision"];
		$output["Id_Certificado"] = $row["Id_Certificado"];
	}
	echo json_encode($output);
}
?>