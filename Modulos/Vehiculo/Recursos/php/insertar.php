<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		$statement = $conn->prepare("
			INSERT INTO vehiculo (Marca, Anio, Placa, Sticker, Numero_resolucion, Id_Usuario, Id_Cooperativa, Fecha_resolucion)
			VALUES (:Marca, :Anio, :Placa, :Sticker, :Numero_resolucion, :Id_Usuario, :Id_Cooperativa, :Fecha_resolucion)
		");
		$result = $statement->execute(
			array(
				':Marca' =>	$_POST["Marca"],
				':Anio' =>	$_POST["Anio"],
				':Placa' =>	$_POST["Placa"],
				':Sticker' => $_POST["Sticker"],
				':Numero_resolucion' =>	$_POST["Numero_resolucion"],
				':Id_Usuario' => $_POST["Id_Usuario"],
				':Id_Cooperativa' => $_POST["Id_Cooperativa"],
				':Fecha_resolucion' =>	$_POST["Fecha_resolucion"],
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
			"UPDATE vehiculo
			SET Marca = :Marca, Anio = :Anio, Placa = :Placa, Sticker = :Sticker, Numero_resolucion = :Numero_resolucion, Id_Usuario = :Id_Usuario, Id_Cooperativa = :Id_Cooperativa, Fecha_resolucion = :Fecha_resolucion
			WHERE Id_Vehiculo = :Id_Vehiculo
			"
		);
		$result = $statement->execute(
			array(
				':Marca' =>	$_POST["Marca"],
				':Anio' =>	$_POST["Anio"],
				':Placa' =>	$_POST["Placa"],
				':Sticker' => $_POST["Sticker"],
				':Numero_resolucion' =>	$_POST["Numero_resolucion"],
				':Id_Usuario' => $_POST["Id_Usuario"],
				':Id_Cooperativa' => $_POST["Id_Cooperativa"],
				':Fecha_resolucion' =>	$_POST["Fecha_resolucion"],
				':Id_Vehiculo' => $_POST["Id_Vehiculo"]
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