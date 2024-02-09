<?php
include('../../../../DAO/DAO.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		$options = [ 'cost' => 15,];
		$contrasena_encriptada = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT, $options);

		$statement = $conn->prepare("
			INSERT INTO usuario (Nombre, Apellido, Cedula, Correo, Usuario, Nivel, Contrasena)
			VALUES (:Nombre, :Apellido, :Cedula, :Correo, :Usuario, :Nivel, :Contrasena)
		");
		$result = $statement->execute(
			array(
				':Nombre'	  =>	$_POST["Nombre"],
				':Apellido'   =>	$_POST["Apellido"],
				':Cedula'     =>	$_POST["Cedula"],
				':Correo'     =>	$_POST["Correo"],
				':Usuario'	  =>	$_POST["Usuario"],
				':Nivel'      =>	$_POST["Nivel"],
				':Contrasena' =>	$contrasena_encriptada,
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
		$options = [ 'cost' => 15,];
		$contrasena_encriptada = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT, $options);
		$statement = $conn->prepare(
			"UPDATE usuario
			SET Nombre = :Nombre, Apellido = :Apellido, Cedula = :Cedula, Correo = :Correo, Usuario= :Usuario, Nivel = :Nivel, Contrasena = :Contrasena
			WHERE Id_Usuario = :Id_Usuario
			"
		);
		$result = $statement->execute(
			array(
				':Nombre'	  =>	$_POST["Nombre"],
				':Apellido'   =>	$_POST["Apellido"],
				':Cedula'     =>	$_POST["Cedula"],
				':Correo'     =>	$_POST["Correo"],
				':Usuario'	  =>	$_POST["Usuario"],
				':Nivel'      =>	$_POST["Nivel"],
				':Contrasena' =>	$contrasena_encriptada,
				':Id_Usuario' =>	$_POST["Id_Usuario"]
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