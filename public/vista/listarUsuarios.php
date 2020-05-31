<!DOCTYPE html>
<html style="
    background: beige; ">
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
 <link rel="stylesheet" href ="tabla.css" type="text/css" />
</head>
<body>
<header style="
    background: #afbdb363;
    height: 118px;
">
            <div class="logo">
                <nav>
                    <a href="https://www.ups.edu.ec/sede-cuenca"><img src="https://www.pequeciencia.ups.edu.ec/imgcontenidos/2-3_Logo%20UPS.png" alt="logo" height="100" width="200"> </a>
                    
                </nav>
                
            </div>
            <br>
            <div class="boton">
                <a href="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/index.html"><input type="button" id="btnInicio" value="Inicio" style="float: right; width: 20%;display: inline-block;border-radius: 4px;background-color: chartreuse;border: none;color: #FFFFFF;text-align: center;font-size: 28px;padding: 20px;width: 200px;transition: all 0.5s;cursor: pointer;margin: 5px;cursor: pointer;display: inline-block;position: relative;transition: 0.5s;margin-left: 174px;margin-top: -231px;"></a>
            </div>
            <br>
             <br>
             <br>
            <div class="boton">
                <a href="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/index.html"><input type="button" id="btnInicio" value="Inicio" style="float: right; width: 20%;display: inline-block;border-radius: 4px;background-color: chartreuse;border: none;color: #FFFFFF;text-align: center;font-size: 28px;padding: 20px;width: 200px;transition: all 0.5s;cursor: pointer;margin: 5px;cursor: pointer;display: inline-block;position: relative;transition: 0.5s;margin-left: 174px;margin-top: -159px;"></a>
            </div>
        </header>

 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Rol</th>
 <th>Correo</th>
 <th>Contraseña</th>
 <th>Modificar Campos</th>
 </tr>


 <?php 
 include '../../config/ConexionBD.php';
$sql = "SELECT * FROM usuario ";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 echo "<tr>";

 echo " <td style=text-align:center>" . $row['usu_cedula']."</td>";

 echo " <td style=text-align:center>" . $row['usu_nombres'] ."</td>";
 
 echo " <td style=text-align:center>" . $row['usu_apellidos'] . "</td>";

 echo " <td style=text-align:center>" . $row['usu_rol'] . "</td>";

 echo " <td style=text-align:center>" . $row['usu_correo'] . "</td>";

 echo " <td style=text-align:center>" . $row['usu_contrasena'] . "</td>" ;"<br>";

 echo " <td> <a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarU.php?codigo=" . $row['tel_codigo'] . "'>Modificar numero</a> </td>";
 
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
 <th>Operadora</th>
 </tr>

 <?php

 include '../../config/ConexionBD.php';
$sql1= "SELECT * FROM Telefonos";

 $result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
    echo "<tr>";
    while($row1 = $result1->fetch_assoc()) {
    echo " <td style=text-align:center>" . $row1['tel_numero']."</td>";
    echo " <td style=text-align:center>" . $row1['tel_tipo']."</td>";
    echo " <td style=text-align:center>" . $row1['tel_operadora']."</td>";
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
    margin-top: 209px;
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