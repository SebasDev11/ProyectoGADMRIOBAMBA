<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["Id_Vehiculo"]))
{
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM vehiculo WHERE Id_Vehiculo= '".$_POST["Id_Vehiculo"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Marca"] = $row["Marca"];
		$output["Anio"] = $row["Anio"];
		$output["Placa"] = $row["Placa"];
		$output["Sticker"] = $row["Sticker"];
		$output["Numero_resolucion"] = $row["Numero_resolucion"];
		$output["Id_Usuario"] = $row["Id_Usuario"];
		$output["Id_Cooperativa"] = $row["Id_Cooperativa"];
		$output["Fecha_resolucion"] = $row["Fecha_resolucion"];
		$output["Id_Vehiculo"] = $row["Id_Vehiculo"];
	}
	echo json_encode($output);
}
?>