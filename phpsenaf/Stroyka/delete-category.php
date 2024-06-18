<?php   
  require_once('conexion.php');

    if (isset($_GET['id'])) {

        $id =   $_GET['id'];

        $eliminarcategoria =" DELETE FROM categorias WHERE id = $id ";
        mysqli_query($conexion, $eliminarcategoria) or die('no se borro la categoria ');


        header("location: app-categories-list.php");
        # code...
    }

?>