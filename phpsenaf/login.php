<?php
	session_start();// Esta funcion siempre tiene que ir al principio
	include_once('conexion.php');// invoca al archivo conexion.php

	$us = $_POST['user']; // son los valores que envio desde el teclado
	$pw = $_POST['passw'];

    $qry = "SELECT * FROM usuarios WHERE usuLogin = '".$us."' AND usuPassword ='".$pw."' ";

	$resultado = mysqli_query($conexion,$qry);

	if ($reg=mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

		// despues del =, es lo que esta en la BD
		$_SESSION['id']=$reg["idUsuario"];
		

		echo "<script>location.href='usuarios.php';</script>";//es un redireccionamiento automatico a la pagina linkeado
	}
	else{
		echo "<script>alert('Clave o Usuario Incorrecto');</script>";
		echo "<script>location.href='index.php';</script>";
	}

 ?>









