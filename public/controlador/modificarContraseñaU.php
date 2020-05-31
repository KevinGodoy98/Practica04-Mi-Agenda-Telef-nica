<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar contraseña de un Usuario </title>
</head>
<body>
<?php
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $contraseña = isset($_POST["password"]) ? trim($_POST["password"]) : null;
 
 $sql1 = "UPDATE usuario  
 SET usu_contrasena = MD5('$contraseña')
 WHERE usu_codigo = '$codigo'";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha actualizado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarContraU.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>

</html>
