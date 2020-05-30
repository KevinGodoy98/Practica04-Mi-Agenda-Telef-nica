<?php
 //incluir conexión a la base de datos
 include '../../config/ConexionBD.php';
 $cedula = $_GET['BuscarParametro'];
 //echo "Hola " . $cedula;

 $sql = "SELECT u.usu_nombres,u.usu_apellidos,t.tel_numero,t.tel_tipo 
         from usuario u , Telefonos t
         where u.usu_codigo = t.tel_usu_codigo
         And u.usu_cedula ='$cedula'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Telefono</th>
 <th>Tipo</th>
 </tr>";

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    echo "<tr>";
   
    echo " <td style=text-align:center>" . $row['usu_nombres'] ."</td>";
    
    echo " <td style=text-align:center>" . $row['usu_apellidos'] . "</td>";
    
    echo " <td style=text-align:center>" . $row['tel_numero'] . "</td>" ;"<br>";
    
    echo " <td style=text-align:center>" . $row['tel_tipo'] . "</td>" ;"<br>";
    
    echo "</tr>";
    }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>




<!--$sql = "SELECT * FROM usuario ";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 echo "<tr>";

 echo " <td style=text-align:center>" . $row['usu_cedula']."</td>";

 echo " <td style=text-align:center>" . $row['usu_nombres'] ."</td>";
 
 echo " <td style=text-align:center>" . $row['usu_apellidos'] . "</td>";

 echo " <td style=text-align:center>" . $row['usu_correo'] . "</td>" ;"<br>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 
 ?>
<table style=width:100%>
 <tr>
 <th>Telefono</th>
 <th>Tipo</th>
 </tr>

 //<//?php

 include '../../config/ConexionBD.php';
$sql1= "SELECT * FROM Telefonos";

 $result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
    echo "<tr>";
    while($row1 = $result1->fetch_assoc()) {
    echo " <td style=text-align:center>" . $row1['tel_numero']."</td>";
    echo " <td style=text-align:center>" . $row1['tel_tipo']."</td>";
    echo "</tr>";
    }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen telefonos registradas en el sistema </td>";
 echo "</tr>";
 }
 
 ?>
 </table>
</table>
<footer id="piepagina" style="
    margin-top: 134px;
    clear: both;
    border: rgb(86, 87, 143);
    padding: 0px;
    border-bottom: outset;
    border-color: darkslategrey;
    border-top: 2px solid black;
    background-color: #afbdb363;
">
                Cargatodo • 411 Azuay Kevin AZ  • 07-411-46-47<br>
               <p>Gracias por visitarnos <em>Vuelva pronto</em></p>
               <p>Última Actualización:
               <time datetime="2020-04-23">Abril 23 2020 8:25 p.m.</time></p>
               <p><cite>Kevin Godoy Mendía @2020 Derechos Reservados</cite></p>
</footer>
</body>

</html>




     <div class="logo">
                <nav>
                    <a href="https://www.ups.edu.ec/sede-cuenca"><img src="https://www.pequeciencia.ups.edu.ec/imgcontenidos/2-3_Logo%20UPS.png" alt="logo" height="100" width="200"> </a>
                    
                </nav>
                
            </div>
            <br>
            <div class="buscar">
            <input placeholder="Ingrese el correo o cedula del solicitante.." type="search" style="
                  margin-top: 55px;
                  margin-left: 400px;
                  width: 680px;
            ">     
             <input type="button"  id="btnBuscar"  name="Buscar" value="Buscar"> 
            </div>-->
            