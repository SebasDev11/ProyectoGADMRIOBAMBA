<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["Id_Usuario"]))
{
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM usuario WHERE Id_Usuario= '".$_POST["Id_Usuario"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Nombre"] = $row["Nombre"];
		$output["Apellido"] = $row["Apellido"];
		$output["Cedula"] = $row["Cedula"];
		$output["Correo"] = $row["Correo"];
		$output["Usuario"] = $row["Usuario"];
		$output["Nivel"] = $row["Nivel"];
		$output["Contrasena"] = $row["Contrasena"];
		$output["Id_Usuario"] = $row["Id_Usuario"];
	}
	echo json_encode($output);
}
?>