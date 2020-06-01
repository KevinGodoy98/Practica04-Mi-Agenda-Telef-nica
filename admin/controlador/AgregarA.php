<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
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

 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $apellido= isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
 $rol = isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null;
 $Correo = isset($_POST["Correo"]) ? trim($_POST["Correo"]): null;
 $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
 $numero = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;      
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;    
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null; 
    
    $maxval = $conn->query("SELECT usu_codigo FROM usuario WHERE usu_codigo=(SELECT max(usu_codigo) FROM usuario)");

    while ($row = $maxval->fetch_assoc()) {
        $Vusuario = $row['usu_codigo'];
    }
    $Vusuario+=1;
    echo($Vusuario);

 
 
 $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombre', '$apellido', '$rol','$Correo', MD5('$password'))";
 $sql1 = "INSERT INTO Telefonos VALUES (0,'$numero','$tipo','$operadora','$Vusuario')";        
    

 if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 //cerrar la base de datos
 $conn->close();
 ?>
</body>
</html>