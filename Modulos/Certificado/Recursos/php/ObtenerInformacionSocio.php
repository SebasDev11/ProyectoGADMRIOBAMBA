<?php

include('../../../../DAO/DAO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Id_Usuario"])) {
    $selectedUserId = $_POST["Id_Usuario"];

    // Realizar la consulta para obtener la información del socio
    $statement = $conn->prepare("SELECT u.Apellido, u.Cedula, v.Numero_resolucion as Resolucion,
    v.Fecha_resolucion as Fecha_Resoluciones, co.Id_Cooperativa as Id_Cooperativa, co.Ruc as RucV, v.Id_Vehiculo as Id_Vehiculo,
    v.Anio as AnioVehiculo, v.Placa as PlacaVehiculo, v.Sticker as StickerVehiculo
    FROM usuario u
    LEFT JOIN vehiculo v ON u.Id_Usuario = v.Id_Usuario
    LEFT JOIN cooperativa co ON u.Id_Usuario = co.Id_Usuario
    WHERE u.Id_Usuario = :selectedUserId");
    $statement->bindParam(":selectedUserId", $selectedUserId, PDO::PARAM_INT);
    $statement->execute();
    $socioInfo = $statement->fetch(PDO::FETCH_ASSOC);

    // Devolver la información en formato JSON
    echo json_encode($socioInfo);
} else {
    // Si no es una solicitud POST o no se proporcionó el Id_Usuario, devolver un mensaje de error
    echo json_encode(["error" => "Invalid request"]);
}
?>
