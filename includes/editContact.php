<?php 
require './conexion.php';

$id = $_GET['id'];

if ($_POST['nombre']) {
	$nombre = $_POST['nombre'];

	$queryUpdateNom = mysqli_query($conection, "UPDATE `contactos` SET `nombre`='$nombre' WHERE id = $id");

}



if ($_POST['telefono']) {
	$telefono = $_POST['telefono'];

	$queryUpdateTel = mysqli_query($conection, "UPDATE `contactos` SET `telefono`='$telefono' WHERE id = $id");

}


if ($_POST['direccion']) {
	$direccion = $_POST['direccion'];

	$queryUpdateDire = mysqli_query($conection, "UPDATE `contactos` SET `direccion`='$direccion' WHERE id = $id");

}



if ($_POST['correo']) {
	$correo = $_POST['correo'];

	$queryUpdateMail = mysqli_query($conection, "UPDATE `contactos` SET `correo`='$correo' WHERE id = $id");

}


if ($_POST['date']) {
	$date = $_POST['date'];

	$queryUpdateDate = mysqli_query($conection, "UPDATE `contactos` SET `nacim`='$date' WHERE id = $id");

}


 ?>