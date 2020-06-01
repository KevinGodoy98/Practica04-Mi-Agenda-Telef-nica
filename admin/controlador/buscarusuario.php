<?php
 //incluir conexión a la base de datos
 include '../../config/ConexionBD.php';
 $cedula = $_GET['BuscarParametro'];
 //echo "Hola " . $cedula;

 $sql = "SELECT u.usu_cedula,u.usu_nombres,u.usu_apellidos,u.usu_rol,u.usu_correo,u.usu_contrasena,t.tel_numero,t.tel_tipo ,t.tel_operadora
         from usuario u , Telefonos t
         where u.usu_codigo = t.tel_usu_codigo
         And u.usu_cedula ='$cedula'";



//cambiar la consulta para puede buscar por ocurrencias de letras
 $result =$conn->query($sql);

 echo " <table style='width:100%'>
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Rol</th>
 <th>Correo</th>
 <th>Contraseña</th>
 <th>Telefono</th>
 <th>Tipo</th>
 <th>Operadora</th>
 </tr>";

 if ($result->num_rows > 0 ) {

    while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo " <td style=text-align:center>" . $row['usu_cedula'] ."</td>";

    echo " <td style=text-align:center>" . $row['usu_nombres'] ."</td>";
    
    echo " <td style=text-align:center>" . $row['usu_apellidos'] . "</td>";
    
    echo " <td style=text-align:center>" . $row['usu_rol'] ."</td>";

    echo " <td style=text-align:center>" . $row['usu_correo'] ."</td>";

    echo " <td style=text-align:center>" . $row['usu_contrasena'] ."</td>";

    echo " <td style=text-align:center>" . $row['tel_numero'] . "</td>" ;"<br>";
    
    echo " <td style=text-align:center>" . $row['tel_tipo'] . "</td>" ;"<br>";

    echo " <td style=text-align:center>" . $row['tel_operadora'] ."</td>";
    
    echo "</tr>";
    }
   }else{
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
 
 }
 echo "</table>";
 $conn->close();

?>