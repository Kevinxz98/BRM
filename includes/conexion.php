<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$bd = 'brmkevin';

	$conection = @mysqli_connect($host,$user,$password,$bd);


	if(!$conection){
		echo "error en la conexion";
	} 

 ?>	