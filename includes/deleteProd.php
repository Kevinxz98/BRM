<?php 
require './conexion.php';

$id = $_GET['id'];

$querydelprod = mysqli_query($conection, "DELETE FROM `contactos` WHERE id = $id");

if ($querydelprod) {
	header("Location: ../");
}

 ?>