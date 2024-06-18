<?php   

session_start();
$carrito=$_SESSION['carrito'];

echo require_once('conexion.php');

    $str = "012345678901234567890123456789012345678901234567890";
    $password = "";
    for($it=0;$it<5;$it++) {
    $password .= substr($str,rand(0,64),1);
    }
    $ref = $password;

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){

        if (isset($_POST['guardar'])) {

            $persona = $_POST['persona'];
            $telefono = $_POST['telefono'];
            $dirrecion = $_POST['dirreccion'];
            $fecha = date('Y-m-d H:i:s');
            $img = "camisa1.jpg";
            $subtotal = 0;
            $email_cliente = $persona."gmail.com";

        
            #$valor=$_POST['precio'];
            #$precio= number_format($valor,0,',','.');

            foreach ($_SESSION['carrito'] as $producto) {
                $nombre_producto = $producto['nombre'];
                $id_producto = $producto['id'];
                $cantidad = $producto['cantidad'];
                $precio = $producto['precio'];
                $total = $producto['total'];
                $talla = $producto['talla'];
                $subtotal += $total;
                $subtotal = number_format($subtotal, 3, '.', ',');


                $query = "INSERT INTO detalleventas (venta_id, nombre_producto, img_producto, precio, cantidad, total, subtotal, nombre_cliente, email_cliente, tel_cliente  )
                VALUES ('$ref', '$nombre_producto', '$img', '$precio', '$cantidad', '$total', '$subtotal', '$persona', '$email_cliente', '$telefono' )";

                $conexion->query("UPDATE productos SET disponibilidad = disponibilidad -'$cantidad' where id = $id_producto ") or die($conexion->error);

                $result = mysqli_query($conexion,$query); 

                if (!$result) {
                    die('Error al insertar detalle de venta: ' . mysqli_error($conexion));
                }else {
                    echo "todo bien";
                }
    
                #print_r($insertar);
            }
            # code...
            
        }
        
        $numproducto = count($_SESSION['carrito']);  
        $estado ="Pendiente";
        $pagado ="No";  
        
        $query1 = "INSERT INTO ventas(idVenta,fechaVenta,cliente,numProducto,subTotal,estado,pagado)
        VALUES ('$ref', '$fecha', '$persona', '$numproducto', '$subtotal', '$estado', '$pagado')";
        $result1 = mysqli_query($conexion,$query1);
        
        $_SESSION['carrito'] = array();


    }else {
        echo "carrito no definido o vacio";
    }
        $query2 = "INSERT INTO clientes(email,nombre,telefono_cliente,direccion_cliente)
        VALUES ('$email_cliente', '$persona', '$telefono', '$dirrecion')";
        $result2 = mysqli_query($conexion,$query2);
        
    header("location: usuarios.php");
?>