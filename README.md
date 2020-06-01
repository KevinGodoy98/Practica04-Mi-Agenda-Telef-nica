1.	Creación de la tabla
 
Primeramente, creamos una base de datos, su nombre es “agenda”; esta contiene tablas como es teléfonos y usuarios. 
 
Nuestra tabla usuario contiene estos datos dado a que nos pide el nombre de usuario “juanito”, así como también su apellido y por su puesto su cedula. El rol que lleva dependerá si es administrador o cliente; ya que esto ayudara a tener ciertos privilegios propios en una empresa, como eliminar, editar, modificar, etc.

 
En la tabla Telefonos tenemos el numero del cliente o usuario y además tenemos que colocar si es celular o teléfono y que operadora es la compañía de celular o teléfono; el tipo será dependiendo (U) usuario o administrador (A) y finalmente colocaremos su operadora o compañía.

 
El último código como es “tel_usu_codigo” permitirá unir a la tabla usuario mediante una foreing_key hacia la primaria de usuario como es la “usu_codigo”.  


 
Finalmente, así es como quedara nuestra tabla teléfonos y usuario 

B.	Código
1.	ConexionBD
<?php

 $db_servername = "localhost";
 $db_username = "root";
 $db_password = "root";
 $db_name = "agenda";

 $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
 $conn->set_charset("utf8");

 # Probar conexión
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }else{
 echo "<p>Conexión exitosa!! :)</p>";
 }
?>
Para la conexión con nuestra base de datos lo primero será colocar el nombre del servidor como el localhost. 
Si tenemos nuestro nombre de usuario y password en nuestra base de datos tenemos que colocar de lo contrario mandamos como en este caso “root”.
En $db_name mandamos el nombre de nuestra base de datos; y lo colocamos como “agenda”. 
Ahora con el $conn = new mysql… validara los datos tanto de la base con los ingresados anteriormente; dándole permisos a estos y finalmente dentro de un If nos mostrara un mensaje si a sido exitosa la conexión o de lo contrario nos mandara un error. 

2.	Index (página principal)

 

C.	<a href="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/vista/Login.html"><img src="https://cdn.onlinewebfonts.com/svg/img_568656.png" height="50" width="50" alt="youtube"/></a> 

Nuestra pagina principal (index) le mandamos la dirección de la imagen en donde al darlo click nos llevara a nuestra página login.php.  
 
3.	Login HTML

<html lang="es">
<head>
    <meta name="keywords" content="Kevin Godoy,Wireless,Cargadores"/>
    <meta charset="utf-8" /> <!-- dar el formato utf-8 a nuestra pagina -->
    <title>Login</title>
    <link rel="stylesheet" href ="../../Login.CSS" type="text/css" />
</head>

Obtenemos el código de nuestro archivo Login.css

<fieldset>
       <legend>Iniciar Sesion:</legend>
             <p>Llene los siguintes datos:</p><br>
            <br>
             <div><label>Ingrese Usuario:</label><input type='text' id="usuario" name="usuario"></div><br>
             <div><label>Ingrese Contraseña:</label><input type='password' id="contraseña" name="contraseña" value='' ></div><br>
   </fieldset>
Dentro de nuestro código fieldest (para crear cuadro de texto) colocaremos los datos de usuario y su contraseña dentro de su respectivo cuadro de texto. Nuestra id, name nos permitirá reconocer los datos mandados tanto a la pagina PHP y JavaScript.
 <input type="submit"  id="btnValidar"  value="Ingresar"> 
El botón que nos permitirá ingresar a la siguiente página si el ingreso es exitoso de lo contario nos permitirá registrarnos. 

4.	Login.php
 
<?php
 session_start();
 include '../../config/ConexionBD.php';
 $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : null;
 $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_contrasena = MD5('$contrasena')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 $_SESSION['isLogged'] = TRUE;
 header("Location: ../vista/listarUsuarios.php");
 } else {
    echo "<script>
          alert('Cuenta no registrada');
          window.location.href='../vista/crear_usuario.html';
         </script>";
 }
 $conn->close();
?>

Como sabemos PHP  es el código ejecutado en el servidor, generado en el HTML y enviado al cliente; una script que trabaja en conjunto con nuestra base de datos. 
$isset: permitirá ver si nuestra variable esta definida en nuestra script PHP.
$Post: nos permite recuperar datos enviados desde el formulario.
? trim: eliminara espacios en blanco de ambos lados de la cadena.
$ con el signo de dólar declararemos la variable.
Ahora declaramos nuestras respectivas variables como son $usuario, $contrasena, $sql, etc.
Para poder concatenar y validar que estos datos estén correctos, se realiza una sentencia en donde el correo y la contraseña serán validados.
Creamos una variable $result que se mandara a la conexión de nuestra base de datos  $conn->query($sql).
Dentro del IF nos devuelve un numero de filas de nuestro conjunto de resultados $result->num_rows > 0
Finalmente con $_session [‘islogged’] = true consultara a la base de datos si son correctos de esta manera dirigiéndonos a nuestra listarUsuario.html; de lo contario se nos direccionará a crear_usuario_html, ahí crearemos el usuario para poder ingresar en nuestro login.

5.	Crear usuario 
 

Para esta interfaz ya se antemano se realizó el diseño html y Css para de esta manera concentrarnos en el aprendizaje del código principal como es el PHP.

•	Veremos algo puntual de nuestro HTML
<form  method="POST" action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/crear_usuario.php" onsubmit="return validar()||EntrarPHP() ">
Permite validar nuestros datos que se concatenan en nuestra base de datos y el script PHP al clickear el botón PHP.

•	PHP Crear usuario.
•	?php
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

Al igual que en el anterior código el Include conectaremos con nuestra base de datos y de ahí se viene el método igual al login. Lo único diferente es el cabio de nuestras variables, ya dependiendo de lo que tengamos en nuestra tabla usuarios. Y además algo nuevo como es el mb_strtoupper que al ser una cadena de texto esta la pasara a mayúsculas.

$maxval = $conn->query("SELECT usu_codigo FROM usuario WHERE usu_codigo=(SELECT max(usu_codigo) FROM usuario)");

while ($row = $maxval->fetch_assoc()) {
    $Vusuario = $row['usu_codigo'];
}
$Vusuario+=1;
echo($Vusuario);
Se observa una sentencia dentro de otra la cual nos permite crear los usuarios de acuerdo al código, permitiendo a su vez que estos no se repitan fetch_assoc, lo que no permite es recuperar resultados de una matriz. $row utilizamos para obtener datos de la base; de esta manera comprobaremos en numero esta nuestra sentencia y le asignaremos un +1 una vez localizado el numero que se le asignado anteriormente $Vusuario+=1; y echo pues retornamos nuestros datos a la base.

$sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombre', '$apellido', '$rol','$Correo', MD5('$password'))";
$sql1 = "INSERT INTO Telefonos VALUES (0,'$numero','$tipo','$operadora','$Vusuario')";        
   
En dos variables tanto $sql & $sql1 creamos dos variables ya que tenemos datos de usuario y teléfono.
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
Y con el if solamente comprobaremos si los datos son correctos y serán mandados a la base de datos para obtener los resultados requeridos; en caso de que están correctamente ingresados nos mandara un mensaje. Algo adicional con la que contamos es la comprobación de la cedula; la cual determinara si esta ya a sido ingresada o nos recuperara un error en caso contrario; el error es el errno = 1062. Y finalmente $conn->close() cerramos la conección.

•	Listar Usuario.php
•	<?php 
 include '../../config/ConexionBD.php';
$sql = "SELECT * FROM usuario ";
 $result = $conn->query($sql);
De la misma forma que el anterior código seleccionamos los datos del usuario y lo guardamos en una variable y luego es mandada a llamar en la base de datos con el nombre de $result.

f ($result->num_rows > 0) {

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
En esta sección es donde comprobará los datos y además un estilo para q se listen en nuestra página. 
El <td style=text-aling:center> y con el $row obtenemos los datos así lograremos mostrar datos de manera horizontal.  se mostrarán los datos cedula, nombres, apellidos, y correo. Caso contrario no se mostrarán.

 



<table style=width:100%>
 <tr>
 <th>Telefono</th>
 <th>Tipo</th>
 </tr>
 Así se logrará obtener datos mas ordenados; es decir en cajas de texto.
th, td {
    width: 25%;
    text-align: center;
    vertical-align: top;
    border: 2px solid #000;
    row-gap: 2;
    column-span: 3;
    border-spacing: 2;
    padding-block-end: 2;

 }
y complementado con las tablas.css

Ahora se observa que obtenemos los datos del teléfono la cual se loa hace de la misma manera de usuario 
<?php

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

Y terminamos con el pie de pagina 
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
 
6.	Listar Teléfono Anónimo
•	HTML Listar
<div id="buscar"  onsubmit="return buscarPorCedula()">
<input placeholder="Ingrese el correo o cedula a solicitar..." type="search" style="
      margin-top: 55px;
      margin-left: 400px;
      width: 680px;
" id="BuscarParametro">     
 <input type="button"  id="btnBuscar"  name="btnBuscar" value="Buscar"> 
 Para poder buscar los datos lo que necesitamos es necesario el onsubmit nos permite buscar por medio de la id de las personas. Además obtenemos el boton buscar 
<div class="boton">
    <a href="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/index.html"><input type="button" id="btnInicio" value="Inicio" style="float: right; width: 20%;display: inline-block;border-radius: 4px;background-color: chartreuse;border: none;color: #FFFFFF;text-align: center;font-size: 28px;padding: 20px;width: 200px;transition: all 0.5s;cursor: pointer;margin: 5px;cursor: pointer;display: inline-block;position: relative;transition: 0.5s;margin-left: 174px;margin-top: -241px;"></a>
</div>
El botón lo que hace es direccionarnos a nuestro index. Y por supuesto esta con código CSS para ubicarlo en de mejor manera.
•	Listar PHP

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
$cedula = $_GET [‘buscarParametro’] permite obtener los datos a buscar en este caso la cedula.
Declaramos la variable y la sentencia se lo que se trata es recuperar los datos nombres, apellidos, numero de teléfono, y el tipo; donde los códigos sean iguales y la cedula sea igual a la que digitamos por medio de la sentencia creada por $cedula
El resultado se buscara mediante la sentencia $result = $conn->query($sql) a la que conecta a la base de datos y será mostrado mediante tablas.

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
Al igual que el anterior código comprobara en todo nuestros datos y lo realizara recorriendo por medio de un array y en caso de ser correcto se mostrara los datos o caso contrario este mostrara un mensaje de no existen usuarios registrados en el sistema <td colspan=’7’>. 


7.	ValidarContrasenaU.Js
Entrando ya en la parte de Ajax esta nuestro validar contraseña 
document.getElementById("btnValidar").addEventListener("click",ValidarContrasena);
function ValidarContrasena(){
    pass = document.getElementById('password').value;
    if(pass.length >= 8)
    {     
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var simbolo = false;
        
        for(var i = 0;i<pass.length;i++)
        {
            if(pass.charCodeAt(i) >= 65 && pass.charCodeAt(i) <= 90)
            {
                mayuscula = true;
            }
            else if(pass.charCodeAt(i) >= 97 && pass.charCodeAt(i) <= 122)
            {
                minuscula = true;
            }
            else if(pass.charCodeAt(i) >= 48 && pass.charCodeAt(i) <= 57)
            {
                numero = true;
            }
            else
            {
                simbolo = true;
            }
        }
        if(mayuscula == true && minuscula == true && simbolo == true && numero == true)
        {
            alert('Password Valido');
           
            return true;
            
        }
    }
    alert('Password Invalido')
    document.getElementById('password').value = "";
    
    return false;
  
}
Para validar estos datos de Ajax 
Document.getElementById: permite recuperar datos de la lista 
addEventListener: Escuchara los datos por medio del click. Y el validar la contraseña.

pass = document.getElementById('password').value; una vez recuperado los datos de la contraseña la  guardamos en una variable. En este caso pass. Dentro del if validamos los datos que sean mayor pass.length >= 8. 
var mayuscula = false;
var minuscula = false;
var numero = false;
var simbolo = false;
Aquí es donde validaran los datos si cumplen estas sentencias. 
for(var i = 0;i<pass.length;i++)
        {
            if(pass.charCodeAt(i) >= 65 && pass.charCodeAt(i) <= 90)
            {
                mayuscula = true;
            }
En esta sección validamos los datos letra por letra y que cumpla con lo solicitado y esto de lo realiza con la ayuda del chart(i) ya que según el código ASCCI que sea entre 65-90(letras mayusculas); 97-122(letras minúsculas); 48-57(numérico) y finalmente los simbólicos. Si esto es valido se guardara los datos; caso contrario nos mandara invalido.

8.	ModificarUsuario.php
 

$codigo = $_POST["codigo"];
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
$tipo= isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
$operadora= isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
Primero recuperamos los datos de la base de datos y la guardamos en una variable 

$sql1 = "UPDATE Telefonos " .
"SET tel_numero = '$telefono', " .
"tel_tipo = '$tipo', " .
"tel_operadora = '$operadora'" . 
"WHERE tel_codigo = $codigo ";
Como observamos esta es una sentencia de base de datos que nos ayuda a validar los datos como son teléfono, tipo y operador de la tabla Teléfonos.

if ($conn->query($sql1) === TRUE) {
echo "Se ha actualizado los datos personales correctamemte!!!<br>";
} else {
echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
}
echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarU.php?codigo=$codigo'>Regresar</a>";
$conn->close();
?>

dentro del if se validarán los datos de acuerdo al $codigo ingresado en donde este ubicado nuestros datos. Si los datos del código no son correctos se mostrará un error.

9.	ModificarUser.php
Modificara los datos de la tabla usuario
Método para modificar los usuarios por medio de la búsqueda del código; el cual nos permite modificar la cedula, en nombre, apellido y correo.
 
  <?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
        include '../../config/ConexionBD.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        

       while($row = $result->fetch_assoc()) {
       
?>

Lo primero que témenos es la validación de nuestro código; para que dependiendo a lo ingresado se reconocerá la sentencia que la hemos guardado en una variable $sql. En $row se scomprobara que si el código es correcto pues se nos realizara la sentencia.
<form id= "formulario" method="POST"   action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificar_Usuario.php" >
                <fieldset style="
    WIDTH: 50%;
    margin-top: 112px;
    margin-left: 375px;
">
                   <legend>Modificar:</legend>
                        <br>
                            <br>

                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                        <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cedula:&nbsp;&nbsp;&nbsp;</label><input type='text' id="cedula" name="cedula" value='<?php echo $row["usu_cedula"] ?>'></div><br>
                         <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre:&nbsp;</label><input type='text' id="nombre" name="nombre" value='<?php echo $row["usu_nombres"] ?>' ></div><br>
                         <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apellido:</label><input type='text' id="apellido" name="apellido" value='<?php echo $row["usu_apellidos"] ?>' ></div><br>
                         <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo:&nbsp;&nbsp;&nbsp;</label><input id="Correo" name="Correo" type='text' value=' <?php echo $row["usu_correo"] ?>'></div><br>
                         <input type="submit"  id="btnValidar"  value="Aceptar" style="float: right;width: 20%; " > 
                       
                         <br><br>
                            
               </fieldset>
            </form>

Al inicio tenemos que si le damos click se nos mandara a la dirección de modificar_usuario.php
Con <php echo $row[“usu_nombre”]: recuperara y será guardado en una variable, al igual que el código, apellido y correo. 
} else {
echo "<p>Ha ocurrido un error inesperado !</p>";
echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();

?> 

Si la sentencia no se cumple nos mandara un error.
10.	modificarU.php

 
Esta sentencia modificara los datos de la tabla Telefono 
<?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM Telefonos where tel_codigo=$codigo";
        include '../../config/ConexionBD.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        

       while($row = $result->fetch_assoc()) {
       
?>
De la misma forma que el de modificar usuario este permitirá realizarlo por medio de la recuperación de datos de la tabla teléfono.
  <form id= "formulario" method="POST" action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarUsuario.php">
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
Aquí esta los datos que se recuperan en un $row y se guardaran en una variable y al hacer click se lo llevaran a modificarUsuario.php donde se valida esta sentencia.
}

} else {
echo "<p>Ha ocurrido un error inesperado !</p>";
echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
 De igual manera se mostrará un error si esto no se cumple. 
11.	Modificar_usuario.php
Para modificar los datos se lo realizar de acuerdo a la sentencia Update y se podrá modificar cedula, nombre, apellido y correo. 
<?php
 include '../../config/ConexionBD.php';
 $codigo = $_POST["codigo"];
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $apellido= isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
 $correo = isset($_POST["Correo"]) ? trim($_POST["Correo"]) : null;
 
 $sql1 = "UPDATE usuario " .
 "SET usu_cedula = '$cedula', " .
 "usu_nombres = '$nombre', " .
 "usu_apellidos = '$apellido', " .
 "usu_correo = '$correo'" . 
 "WHERE usu_codigo = $codigo ";
 if ($conn->query($sql1) === TRUE) {
 echo "Se ha actualizado los datos correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql1. "<br>" . mysqli_error($conn) . "<br>";
 }
 echo "<a href='/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarUser.php?codigo=$codigo'>Regresar</a>";
 $conn->close();
 ?>


12.	ModificarContraU
Este permite modificar la contraseña y lo principal que se realiza es recuperar los datos por medio del ingreso del código del usuario.

<?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
        include '../../config/ConexionBD.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        

       while($row = $result->fetch_assoc()) {
?>
De la misma manera como venimos trabajando con el resto de código recuperaremos nuestro código y lo realizaremos mediante recuperación y validación de la cadena de datos de nuestra base.
<form id= "formulario" method="POST"   action="/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/controlador/modificarContraseñaU.php" >
                <fieldset style="
    WIDTH: 50%;
    margin-top: 112px;
    margin-left: 375px;
">
                   <legend>Modificar:</legend>
                        <br>
                            <br>
                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                        <div><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingrese la nueva Contraseña:</label><input type='password' id="password" name= "password"  value= "<?php echo $row["usu_contrasena"] ?>" style="width:310px"></div><br>
                         <input type="submit"  id="btnValidar"  value="Aceptar" style="float: right;width: 20%; " > 
Al dar en aceptar se nos mandara a modificarContrasenaU.php la password se guardará en una variable si existe el código adecuado, caso contrario se nos manda un error.
13.	ModificarContraseñaU 
Para modificar los la contraseña se necesita recuperar los datos de la base de datos y se validara los datos de acuerdo al código ingresado un vez coordinado con la sentencia UPDATE  se validara los datos y  se modificara.	
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

14.	EliminarUsuario.php
$sql1 = "UPDATE Telefonos " .
"SET tel_numero = '$telefono', " .
"tel_tipo = '$tipo', " .
"tel_operadora = '$operadora'" . 
"WHERE tel_codigo = $codigo ";
El código de eliminar usuario se lo realizara de la misma manera que el modificar lo que cambia esta sentencia es el update y se podrá eliminar telefono, tipo, operador. De acuerdo al código ingresado. 

Así como es el de modificar, de la misma forma se realizara el eliminar, por una parte se recuperará el código HTML y por otra se realizara el cambio.

15.	Buscar:
 
function buscarUsuario(){
     new URLSearchParams(Location.search);
    var correo = params.get('correo');
    if (correo == "") {
        document.getElementById("usu").innerHTML = "";
        } else {
        if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        //alert("llegue");
        document.getElementById("usu").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/vista/User.php?usuario="+correo,true);
        xmlhttp.send();
        }
        return false;
}
window.XMLHttpRequest: se puede actualizar las partes de los datos de la página web sin tener que volver cargar los datos de la página web.

document.getElementById: esto nos devolverá el elemento que deseemos en este caso muestra cedula y correo.

ActiveXObject("Microsoft.XMLHTTP"); Este es una validación de Internet Explorer para admitir el tipo XMLHttpRequest.

.onreadystatechange estos son controladores que serán llamados cuando readystatechange esta activo; es decir cada vez que readyState admite cambios.

this.readyState == 4 && this.status == 200): Lo que esta realizando es validar de acuerdo a los códigos del Ajax. 

En fin lo que está realizando esta sentencia es validar datos de la cedula en función a lo que hayamos digitado.
 
16.	Agregar Teléfono:

Este permitirá agregar los teléfonos de los usuario como es su teléfono , tipo y operadora 
 
$sql1 = "INSERT INTO Telefonos VALUES (0,'$numero','$tipo','$operadora','$codigou')";        
   

if ($conn->query($sql1) === TRUE) {
echo "<p>Se ha creado los datos correctamemte!!!</p>";
} else {
if($conn->errno == 1062){
echo "<p class='error'>El numero $numero ya esta registrado en el sistema </p>";
}else{
echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";

El código se insertara de acuerdo al código de la tabla de teléfonos.  
