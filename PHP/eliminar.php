	
<?php
	session_start();
	
	include "ParametrosDB.php";
	$basededatos="usuarios";
	$correo = $_GET["email"];
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	$sql = mysqli_query($link, "DELETE FROM users WHERE  email='$correo'");
	mysqli_close($link);
	header("Location: ./gestionarCuentas.php?email=$correo");
		
	
	
?>
	
	
	