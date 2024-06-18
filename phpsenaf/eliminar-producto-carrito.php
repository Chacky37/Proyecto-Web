<?php 
    session_start();
    if (empty($_SESSION['Carrito'])==false) {
        # code...
        $carrito =$_SESSION['carrito'];
    }
   
    if (isset($_SESSION['carrito'])) {
       $carrito =$_SESSION['carrito'];
        # code...
    }
   
   
    $id_producto_a_eliminar = $_GET['id_producto']; // Aquí deberías tener el id del producto que quieres eliminar

    // Recorre el array $_SESSION['carrito'] para encontrar y eliminar el producto con ese id
    if(isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $indice => $producto) {
            if ($producto['id'] == $id_producto_a_eliminar) {
                // Eliminar el producto del carrito usando unset()
                // Ejemplo: Eliminar el elemento en el índice $indice
                array_splice($_SESSION['carrito'], $indice, 1);
                #unset($_SESSION['carrito'][$indice]);
                echo "El producto con id $id_producto_a_eliminar ha sido eliminado del carrito.";
                break; // Rompe el bucle una vez que se elimine el producto
            }
        }
    } else {
        echo "El carrito está vacío o no está definido.";
    }

    header("location: usuarios.php")
  ?>