<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar telefonos de personas </title>
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
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/admin/controlador/modificarT.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>
</body>

</html>

<!--
update Telefonos
set tel_numero = '0998550859',
tel_tipo = 'movil',
tel_operadora = 'movistar'
WHERE tel_codigo = '19';
-->