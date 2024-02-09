<?php
include('../../../../DAO/DAO.php');

if(isset($_POST["Id_Vehiculo"])) {
    $Id_Vehiculo = $_POST["Id_Vehiculo"];
    
    $statement = $conn->prepare("DELETE FROM vehiculo WHERE Id_Vehiculo = :Id_Vehiculo");
    $result = $statement->execute(array(':Id_Vehiculo' => $Id_Vehiculo));
    
    if ($result) {
        $response = array('success' => true, 'message' => 'Registro eliminado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al eliminar el registro');
    }
} else {
    $response = array('success' => false, 'message' => 'No se proporcionó el ID del usuario');
}

echo json_encode($response);
?>