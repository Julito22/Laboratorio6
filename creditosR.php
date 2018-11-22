<!DOCTYPE html>
<html>

	<?php

		$correo = $_GET["email"];
		//echo"<h1> $correo </h1>";
	?>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Creditos</title>
	<link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
	</head>
	<body>
		<li>
			<center>
			  <label> Autor del Proyecto: Julen Azpiroz </label><br>
			  <label> Especialidad dentro del grado: Computación </label><br>
			  <img src="./Imagenes/SeñorX.jpg"><br>
			  <label> San Sebastian </label><br>
			</center>
		</li>
		<center>
			<?php
				echo "<a href='./layoutRegistrado.php?email=$correo'>Volver al menu de inicio</a><br>";
			?>
		</center>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
			$("<img>").attr("width", 250).attr("alt","width")
		</script>
	</body>
</html>