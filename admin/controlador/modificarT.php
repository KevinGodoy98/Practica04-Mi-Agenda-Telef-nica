<!DOCTYPE html>
<html style="
    background: beige; ">
<head>
 <meta charset="UTF-8">
 <title>Modificar Telefonos Usuario</title>
 <link rel="stylesheet" href ="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/vista/tabla.css" type="text/css" />
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
        <?php
         $codigo = $_GET["codigo"];
         $sql = "SELECT * FROM Telefonos where tel_codigo=$codigo";
         include '../../config/ConexionBD.php';
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
         

        while($row = $result->fetch_assoc()) {
        
 ?>





        <aside>
            <h2  style="
    text-align: center;
">Formulario</h2>
            <!--<form id="formulario01" method="POST" onsubmit="return validar()||EntrarPHP() " action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/crear_usuario.php" >-->
            <form id= "formulario" method="POST" action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/admin/controlador/modificarTelAdmin.php">
                <fieldset style="
    WIDTH: 50%;
    margin-top: 112px;
    margin-left: 375px;
">
                   <legend>Modificar:</legend>
                        <br>
                            <br>
                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                        <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono:</label><input type='text' id="telefono" name= "telefono" value= "<?php echo $row["tel_numero"] ?>"></div><br>
                        <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo(telf):</label><input type='text' id="tipo" name= "tipo" value="<?php echo $row["tel_tipo"]; ?>"></div><br>
                        <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operadora:</label><input type='text' id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>"></div><br>
                         <input type="submit"  id="btnValidar"  value="Aceptar" style="float: right;width: 20%;"> 
                       
                         <br><br>
                            
               </fieldset>
            </form>
            <spam id="p" style="display: none;">error</spam>
        </aside>
        <?php
 }

 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?> 

<footer id="piepagina" style="
    margin-top: 117px;
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