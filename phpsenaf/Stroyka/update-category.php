<?php   
  require_once('../admin/conexion.php');

    if (isset($_POST['actualizar'])) {

        $id=$_POST['id'];
        $nombre =   $_POST['nombre'];

        // $insertar ="INSERT INTO categorias(nombre)
        // VALUES('$nombre')";
        $actualizar_categoria ="UPDATE categorias SET nombre='$nombre' WHERE id=$id ";

        mysqli_query($conexion, $actualizar_categoria) or die("no se inserto categoria");
        #print_r($insertar);

        header("location: app-categories-list.php");
        # code...
    }

?>