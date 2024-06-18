<?php 

require_once('../admin/conexion.php');

    if (isset($_POST['enviar'])) {

        
        $id = $_POST['id'];
        $estado =   $_POST['exampleRadio1'];
        $pagado = $_POST['exampleRadio2'];

        $orden =" UPDATE ventas SET estado='$estado', pagado='$pagado' WHERE id = $id ";

        mysqli_query($conexion, $orden ) or die('no se consulto ventas');
          
        header("location: app-orders-list.php");



    }

