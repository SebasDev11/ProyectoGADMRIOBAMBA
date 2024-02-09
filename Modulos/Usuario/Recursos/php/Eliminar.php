<?php
include('../../../../DAO/DAO.php');

if(isset($_POST["Id_Usuario"])) {
    $Id_Usuario = $_POST["Id_Usuario"];
    
    $statement = $conn->prepare("DELETE FROM usuario WHERE Id_Usuario = :Id_Usuario");
    $result = $statement->execute(array(':Id_Usuario' => $Id_Usuario));
    
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
