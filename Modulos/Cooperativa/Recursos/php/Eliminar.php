<?php
include('../../../../DAO/DAO.php');

if(isset($_POST["Id_Cooperativa"])) {
    $Id_Cooperativa = $_POST["Id_Cooperativa"];
    
    $statement = $conn->prepare("DELETE FROM cooperativa WHERE Id_Cooperativa = :Id_Cooperativa");
    $result = $statement->execute(array(':Id_Cooperativa' => $Id_Cooperativa));
    
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
