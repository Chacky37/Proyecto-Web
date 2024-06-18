<?php

 session_start();

 // Verificar si $_SESSION['carrito'] existe y es un array
 if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
	 $_SESSION['carrito'] = array();
 }
 
 include 'conexion.php';

 $id= $_POST['id_producto'];
 
 $resultado = $conexion->query("SELECT * FROM productos WHERE id = $id ;") or die($conexion->error);
 $producto = mysqli_fetch_array($resultado);

	if(isset($_SESSION['carrito'])&& $producto['id']!=null){

		$carrito=$_SESSION['carrito'];

		if($producto['id']!=null){

			$idp = $producto['id'];
			$nombre = $producto['nombre'];
			$precio = $producto['precio'];
			$cantidad= $_POST['cantidad'];
			$talla =  $_POST['talla'];
		
			$total= ($cantidad * $precio );
			$total = number_format($total, 3, '.', ',');

		}else {
			echo "error en la consulta de base de datos";
		}
		
	
		$carrito[] = array(
			"nombre" => $nombre,
			"precio" => $precio,
			"cantidad" => $cantidad,
			"total" => $total,
			"id" => $idp,
			"talla" => $talla
		);
		
		$_SESSION['carrito']=$carrito;	

		#echo $carrito[0]['nombre'];
	}else {
		echo "el carrito no esta definido o no existe";
	}

	header("location: usuarios.php");
		                           
?>
