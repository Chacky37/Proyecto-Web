<?php 

require_once('conexion.php');

    if (isset($_POST['actualizar'])) {

        $iduser = $_POST['id'];
        $usuario = $_POST['usuario'];
        $password=$_POST['contraseña'];
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];

        $editaruser=" UPDATE usuarios SET usuLogin='$usuario', usuRol='$rol',
         usuEstado='$estado', usuPassword='$password' WHERE idUsuario = $iduser ";

        mysqli_query($conexion, $editaruser) or die('no se consulto usuarios');
          
        echo "<script> window.location='usuarios.php'; </script>" ;

    }

?>
