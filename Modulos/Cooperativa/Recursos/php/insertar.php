<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		$statement = $conn->prepare("
			INSERT INTO cooperativa (Nombre, Id_Usuario, Ruc, Direccion, Contacto)
			VALUES (:Nombre, :Id_Usuario, :Ruc, :Direccion, :Contacto)
		");
		$result = $statement->execute(
			array(
				':Nombre' =>	$_POST["Nombre"],
				':Id_Usuario' =>	$_POST["Id_Usuario"],
				':Ruc' =>	$_POST["Ruc"],
				':Direccion' =>	$_POST["Direccion"],
				':Contacto' =>	$_POST["Contacto"],
			)
		);
        if (!empty($result)) {
            $response['success'] = true;
            $response['message'] = 'Registro Guardado Correctamente';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error al guardar el registro';
        }
    }
	if($_POST["operation"] == "Edit")
	{
		$statement = $conn->prepare(
			"UPDATE cooperativa
			SET Nombre = :Nombre, Id_Usuario = :Id_Usuario, Ruc = :Ruc, Direccion = :Direccion, Contacto = :Contacto
			WHERE Id_Cooperativa = :Id_Cooperativa
			"
		);
		$result = $statement->execute(
			array(
				':Nombre' => $_POST["Nombre"],
				':Id_Usuario' => $_POST["Id_Usuario"],
				':Ruc' => $_POST["Ruc"],
				':Direccion' => $_POST["Direccion"],
				':Contacto' => $_POST["Contacto"],
				':Id_Cooperativa' => $_POST["Id_Cooperativa"]
			)
		);
		if (!empty($result)) {
            $response['success'] = true;
            $response['message'] = 'Datos modificados correctamente';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error al modificar los datos';
        }
	}
}
// Devuelve la respuesta en formato JSON
echo json_encode($response);
?>