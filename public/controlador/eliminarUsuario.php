<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Telefonos </title>
</head>
<body>
<?php
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
 $tipo= isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $operadora= isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;

 $sql1 = "UPDATE Telefonos " .
 "SET tel_numero = '$telefono', " .
 "tel_tipo = '$tipo', " .
 "tel_operadora = '$operadora'" . 
 "WHERE tel_codigo = $codigo ";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha eliminado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/eliminarU.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>
</html>