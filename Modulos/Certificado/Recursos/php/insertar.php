<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $statement = $conn->prepare("
            INSERT INTO certificado (Numero_certificacion, Id_Usuario, Apellido, Cedula, Numero_resolucion, Fecha_resolucion, Id_Cooperativa, Ruc,
            Id_Vehiculo, Anio, Placa, Sticker, fecha_emision)
            VALUES (:Numero_certificacion, :Id_Usuario, :Apellido, :Cedula, :Numero_resolucion, :Fecha_resolucion, :Id_Cooperativa,
			:Ruc, :Id_Vehiculo, :Anio, :Placa, :Sticker, :fecha_emision)
        ");
        $result = $statement->execute(
            array(
                ':Numero_certificacion' => $_POST["Numero_certificacion"],
                ':Id_Usuario' => $_POST["Id_Usuario"],
                ':Apellido' => $_POST["Apellido"],
                ':Cedula' => $_POST["Cedula"],
                ':Numero_resolucion' => $_POST["Numero_resolucion"],
                ':Fecha_resolucion' => $_POST["Fecha_resolucion"],
                ':Id_Cooperativa' => $_POST["Id_Cooperativa"],
                ':Ruc' => $_POST["Ruc"],
                ':Id_Vehiculo' => $_POST["Id_Vehiculo"],
                ':Anio' => $_POST["Anio"],
                ':Placa' => $_POST["Placa"],
                ':Sticker' => $_POST["Sticker"],
                ':fecha_emision' => $_POST["fecha_emision"],
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
			"UPDATE certificado
			SET Numero_certificacion = :Numero_certificacion, Id_Usuario = :Id_Usuario, Apellido = :Apellido, Cedula = :Cedula,
			Numero_resolucion = :Numero_resolucion, Fecha_resolucion = :Fecha_resolucion, Id_Cooperativa = :Id_Cooperativa, Ruc = :Ruc,
			Id_Vehiculo = :Id_Vehiculo, Anio = :Anio, Placa = :Placa, Sticker = :Sticker, fecha_emision = :fecha_emision
			WHERE Id_Certificado = :Id_Certificado
			"
		);
		$result = $statement->execute(
			array(
				':Numero_certificacion' =>	$_POST["Numero_certificacion"],
				':Id_Usuario' =>	$_POST["Id_Usuario"],
				':Apellido' =>	$_POST["Apellido"],
				':Cedula' =>	$_POST["Cedula"],
				':Numero_resolucion' =>	$_POST["Numero_resolucion"],
				':Fecha_resolucion' =>	$_POST["Fecha_resolucion"],
				':Id_Cooperativa' =>	$_POST["Id_Cooperativa"],
				':Ruc' =>	$_POST["Ruc"],
				':Id_Vehiculo' =>	$_POST["Id_Vehiculo"],
				':Anio' =>	$_POST["Anio"],
				':Placa' =>	$_POST["Placa"],
				':Sticker' =>	$_POST["Sticker"],
				':fecha_emision' => $_POST["fecha_emision"],
				':Id_Certificado' => $_POST["Id_Certificado"]
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