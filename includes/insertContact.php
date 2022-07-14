<?php 

require './conexion.php';

	
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$correo = $_POST['correo'];
		$date = $_POST['date'];


		$query_insert = mysqli_query($conection, "INSERT INTO `contactos`(`nombre`, `telefono`, `nacim`, `direccion`, `correo`) 
																VALUES ('$nombre','$telefono','$date','$direccion','$correo')");
	}

		



 ?>