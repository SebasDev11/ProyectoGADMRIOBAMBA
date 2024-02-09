<?php
include "Modulos/Login/Validar.php";
include "DAO/DAO.php";
$mensajeErrorR = '';
$respuesta = '';

if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $options = ['cost' => 15];
        $contrasena_encriptada = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT, $options);

        $sql = "INSERT INTO usuario (Nombre, Apellido, Cedula, Correo, Usuario, Nivel, Contrasena)
                VALUES (:Nombre, :Apellido, :Cedula, :Correo, :Usuario, :Nivel, :Contrasena)";

        // Prepara la sentencia
        $statement = $conn->prepare($sql);

        if ($statement) {
            // Vincula los parámetros
            $statement->bindParam(":Nombre", $_POST["Nombre"]);
            $statement->bindParam(":Apellido", $_POST["Apellido"]);
            $statement->bindParam(":Cedula", $_POST["Cedula"]);
            $statement->bindParam(":Correo", $_POST["Correo"]);
            $statement->bindParam(":Usuario", $_POST["Usuario"]);
            $statement->bindParam(":Nivel", $_POST["Nivel"]);
            $statement->bindParam(":Contrasena", $contrasena_encriptada);

            // Ejecuta la consulta
            $result = $statement->execute();

            if ($result) {
                // Registro exitoso, establece un mensaje de éxito en la sesión
                $mensajeErrorR = 'Usuario registrado correctamente';
            } else {
                // Error en la ejecución de la consulta
                echo 'Error en la ejecución de la consulta: ' . $conn->errorInfo()[2];
            }
        } else {
            // Error en la preparación de la consulta
            echo 'Error en la preparación de la consulta: ' . $conn->errorInfo()[2];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <!-- Bootstrap core CSS -->
	<link href="Recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Recursos/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
session_start();
// Verifica si hay mensajes en la sesión
if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "<?php echo $respuesta; ?>",
            confirmButtonText: "Volver a intentar",
            confirmButtonColor: "#00214c"
        });
    </script>
<?php
}

// SweetAlert solo se activa si hay mensajes de error
if (!empty($mensajeErrorR)) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "<?php echo $mensajeErrorR; ?>",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php
}
?>
    <div class="background-image">
        <img src="Recursos/images/fondologin.png" alt="Scenic Mountain">
    </div>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form method="post" id="register_form">
            <h1 id="ColorTitulo" style="padding: 20px 0px 0px 0px">Registra tu información</h1>
                <div class="form-control12">
                    <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="form-control" required />
                </div>
                <div class="form-control12">
                    <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" class="form-control" required />
                </div>
                <div class="form-control12">
                    <input type="text" name="Cedula" id="Cedula" placeholder="Cedula" class="form-control" maxlength="10" required pattern="[0-9]{10}" title="La cédula debe contener exactamente 10 dígitos numéricos." />
                </div>
                <div class="form-control12">
                    <input type="email" name="Correo" id="Correo" placeholder="Correo" class="form-control" required />
                </div>
                <div class="form-control12">
                    <input type="text" name="Usuario" id="Usuario" placeholder="Usuario" class="form-control" required />
                </div>
                <div class="form-control12">
                    <input type="password" name="Contrasena" id="Contrasena" placeholder="Contraseña" class="form-control" required />
                </div>
                <!-- Campo oculto para definir el rol como "usuario" -->
                    <input type="hidden" name="Nivel" value="Usuario" />
                <input type="hidden" name="operation" value="Add">
                <button type="submit" class="btn btn-blue text-center">Registrar</button>
            </form>
        </div>
        <div class="form-container login-container">
        <form method="post" name="login">
        <img id="logounach1" src="Recursos/Images/LogoRiobamba2023.png" alt="logo" style="position: absolute; top: 0; left: 0; z-index: 2; width: 100%;">
          <h1 id="ColorTitulo">Ingresa tu Información</h1>
          <div class="form-control2">
          <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" class="form-control"   data-validation-required-message="Por favor ingrese su usuario." required>
            <small class="email-error-2"></small>
            <span></span>
          </div>
          <div class="form-control2">
          <input type="password" id="Contrasena" name="Contrasena" placeholder="Contraseña" class="form-control"   data-validation-required-message="Por favor ingrese su contraseña." required>
            <small class="password-error-2"></small>
            <span></span>
          </div>
          <button  type="submit" class="btn btn-blue text-center"  name="submit" value="submit">Ingresar</button>
        </form>
      </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">
                        Bienvenido <br />
                    </h1>
                    <p>Si tienes una cuenta, inicia sesión aquí</p>
                    <button class="ghost" id="login">
                        Ingresar
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">
                        Registrate<br />
                        Ahora
                    </h1>
                    <p>
                        Si aún no tienes una cuenta, únete a nosotros.
                    </p>
                    <button class="ghost" id="register">
                        Registrarse
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="Recursos/js/main.js"></script>
</html>
