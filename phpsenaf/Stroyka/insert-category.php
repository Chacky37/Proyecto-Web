<?php   
  require_once('conexion.php');

    if (isset($_POST['enviar'])) {

        $nombre =   $_POST['nombre'];

        $insertar ="INSERT INTO categorias(nombre)
        VALUES('$nombre')";

        mysqli_query($conexion, $insertar) or die("no se inserto categoria");
        #print_r($insertar);

        header("location: create-category.php");
        # code...
    }

?>