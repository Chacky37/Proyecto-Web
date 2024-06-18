<?php
session_start();

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Verificar si existe y no está vacío el carrito en la sesión
if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

    // Generar referencia única para la venta
    $str = "012345678901234567890123456789012345678901234567890";
    $password = "";
    for($it=0;$it<5;$it++) {
        $password .= substr($str,rand(0,64),1);
    }
    $ref = $password;

    // Procesar la venta si se envió el formulario 'guardar'
    if (isset($_POST['guardar'])) {

        // Obtener datos del formulario
        $persona = $_POST['persona'];
        $telefono = $_POST['telefono'];
        $dirreccion = $_POST['dirreccion'];
        $fecha = date('Y-m-d H:i:s');
        $img = "camisa1.jpg";
        $subtotal = 0;
        $email_cliente = $persona . "@gmail.com";

        foreach ($_SESSION['carrito'] as $producto) {
            $nombre_producto = $producto['nombre'];
            $id_producto = $producto['id'];
            $cantidad = $producto['cantidad'];
            $precio = $producto['precio'];
            $total = $producto['total'];
            $talla = $producto['talla'];
            $subtotal += $total;

            // Insertar detalles de la venta en detalleventas
            $query = "INSERT INTO detalleventas (venta_id, nombre_producto, img_producto, precio, cantidad, total, subtotal, nombre_cliente, email_cliente, tel_cliente)
                      VALUES ('$ref', '$nombre_producto', '$img', '$precio', '$cantidad', '$total', '$subtotal', '$persona', '$email_cliente', '$telefono')";
            
            echo "Consulta SQL: " . $query . "<br>";
            $result = mysqli_query($conexion, $query);

            if (!$result) {
                die('Error al insertar detalle de venta: ' . mysqli_error($conexion));
            }

            // Actualizar la disponibilidad del producto en la tabla productos
            $query_update = "UPDATE productos SET disponibilidad = disponibilidad - $cantidad WHERE id = $id_producto";
            $result_update = mysqli_query($conexion, $query_update);

            if (!$result_update) {
                die('Error al actualizar disponibilidad del producto: ' . mysqli_error($conexion));
            }
        }
        print_r($_SESSION['carrito']);
        // Limpiar el carrito después de procesar la venta
        $_SESSION['carrito'] = array();

        // Redirigir después de procesar la venta
        #header("Location: usuarios.php");
        exit;
    }

} else {
    echo "El carrito no está definido o está vacío.";
}
?>
