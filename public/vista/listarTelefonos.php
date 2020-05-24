<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
</head>
<body>

 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Correo</th>
 <th>Telefono</th>
 <th>Tipo</th>
 </tr>
 <?php
 include '../../config/ConexionBD.php';
$sql = "SELECT * FROM usuario";
$sql1= "SELECT * FROM Telefonos";

 $result = $conn->query($sql);
 $result1 = $conn->query($sql1);

 if ($result->num_rows > 0 && $result1->num_rows > 0) {

 while($row = $result->fetch_assoc() && $row1 = $result1->fetch_assoc()) {
 echo "<tr>";
 echo " <td>" . $row["usu_cedula"] . "</td>";
 echo " <td>" . $row['usu_nombres'] ."</td>";
 echo " <td>" . $row['usu_apellidos'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo " <td>" . $row1['tel_numero'] . "</td>";
 echo " <td>" . $row1['tel_tipo'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 ?>
 </table>
</body>
</html>