<?php
$servername = "localhost";
$database = "gadmovilidadr";
$username = "root";
$password = "";
// Create connection
$conn = new PDO ( 'mysql:host=localhost;dbname=gadmovilidadr', $username, $password );
// Check connection
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
//echo "Conexion exitosa";

?>