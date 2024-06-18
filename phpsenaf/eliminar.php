<?php

    require_once('conexion.php');

    $clieid = $_GET['id'];

    $eliminar =" DELETE FROM usuarios WHERE idUsuario = $clieid ";
    mysqli_query($conexion, $eliminar) or die('no se borro el usuario ');


    header("location: usuarios.php");

?>