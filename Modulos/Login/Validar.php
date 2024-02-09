<?php
    include 'DAO/DAO.php';

    $msg = "";
    if (isset($_POST['submit'])) {
        
        $Usuario = ($_POST['Usuario']);
        $contrasena_encriptada = ($_POST['Contrasena']);
        $options = [ 'cost' => 15,];
        $contrasena_encriptada = password_hash($contrasena_encriptada, PASSWORD_DEFAULT, $options);
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE Usuario = :Usuario");
        $result = $sentencia->execute(
            array(
                ':Usuario' => $Usuario,
            )
        );
        $rest = $sentencia->fetchAll();
        
        if ($sentencia->rowCount() > 0) {
            if (password_verify($_POST['Contrasena'], $rest[0]["Contrasena"])) {
                session_start();
                $_SESSION['Usuario'] = $rest[0]["Usuario"];
                $_SESSION['Nivel'] = $rest[0]["Nivel"];
                header('Location:index.php');
            } else {
                session_start();
                $_SESSION['mensaje'] = "Error contraseña incorrecta!";
                header('Location:Login.php');
            }
        } else {
            session_start();
            $_SESSION['mensaje'] = "Usuario no encontrado!";
            header('Location:Login.php');
        }
    }
?>
