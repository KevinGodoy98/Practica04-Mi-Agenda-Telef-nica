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
 $correo = isset($_POST["Correo"]) ? trim($_POST["Correo"]) : null;
 
 $sql1 = "UPDATE usuario " .
 "SET usu_cedula = '$cedula', " .
 "usu_nombres = '$nombre', " .
 "usu_apellidos = '$apellido', " .
 "usu_correo = '$correo'" . 
 "WHERE usu_codigo = $codigo ";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha actualizado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarUser.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>

</html>