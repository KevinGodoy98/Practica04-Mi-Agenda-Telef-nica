<?php
 session_start();
 include '../../config/ConexionBD.php';
 $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : null;
 $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_contrasena = MD5('$contrasena')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()){
      $_SESSION['isLogged'] = TRUE;
      if($row['usu_rol']=='A'){
        header("Location: ../vista/listarUsuarios.php");
      }else{
            if($row['usu_rol']=='U'){
              
                  header("Location: ../vista/User.php?correo=$usuario");
            }
      }
      
   }
      
 } else {
    echo "<script>
          alert('Cuenta no registrada');
          window.location.href='../vista/crear_usuario.html';
         </script>";
 }
 $conn->close();
?>