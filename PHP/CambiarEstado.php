	
<?php

	session_start();
	
	include "ParametrosDB.php";
	$basededatos="usuarios";
	$correo = $_GET["email"];
	$bloqueado = $_GET["bloqueado"];
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	if($bloqueado=='no'){
		$sql = mysqli_query($link, "UPDATE users SET Bloqueado='si' WHERE  email='$correo'");
	}
	else{
		$sql = mysqli_query($link, "UPDATE users SET Bloqueado='no' WHERE  email='$correo' ");
	}
	mysqli_close($link);
	header("Location: ./gestionarCuentas.php?email=$correo");
	
	
?>
	