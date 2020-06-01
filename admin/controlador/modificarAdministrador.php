<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar un Usuario </title>
</head>
<body>
<?php
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $apellido= isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
 $rol= isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null;
 $correo = isset($_POST["Correo"]) ? trim($_POST["Correo"]) : null;
 $contraseña =  isset($_POST["password"]) ? trim($_POST["password"]) : null;
 
 $sql1 = "UPDATE usuario " .
 "SET usu_cedula = '$cedula', " .
 "usu_nombres = '$nombre', " .
 "usu_apellidos = '$apellido', " .
 "usu_rol = '$rol', " .
 "usu_correo = '$correo', " .
 "usu_contrasena = MD5('$contraseña')" . 
 "WHERE usu_codigo = $codigo ";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha actualizado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/admin/controlador/modificarA.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>
</html>

