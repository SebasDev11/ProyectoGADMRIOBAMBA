<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["Id_Cooperativa"]))
{
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM cooperativa WHERE Id_Cooperativa= '".$_POST["Id_Cooperativa"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Nombre"] = $row["Nombre"];
		$output["Id_Usuario"] = $row["Id_Usuario"];
		$output["Ruc"] = $row["Ruc"];
		$output["Direccion"] = $row["Direccion"];
		$output["Contacto"] = $row["Contacto"];
		$output["Id_Cooperativa"] = $row["Id_Cooperativa"];
	}
	echo json_encode($output);
}
?>