<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar un Usuario </title>
</head>
<body>
<?php
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $contraseña = isset($_POST["password"]) ? mb_strtoupper(trim($_POST["password"]), 'UTF-8') : null;
 
 $sql1 = "UPDATE usuario " .
 "SET usu_contrasena = 'usuario eliminado'" .
 "WHERE usu_codigo = $codigo ";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha actualizado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/admin/controlador/eliminarA.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>

</html>