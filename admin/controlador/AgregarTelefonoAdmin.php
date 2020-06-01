<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Telefono</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>

<?php
 //incluir conexión a la base de datos
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $numero = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;      
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;    
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null; 
 $codigou = $_POST["codigou"];

 
 $sql1 = "INSERT INTO Telefonos VALUES (0,'$numero','$tipo','$operadora','$codigou')";        
    

 if ($conn->query($sql1) === TRUE) {
 echo "<p>Se ha creado los datos correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>El numero $numero ya esta registrado en el sistema </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/AgregarU.php?codigo=$codigo &codigou=$codigou' >Regresar</a>";
 //cerrar la base de datos
 $conn->close();
 ?>
</body>
</html>