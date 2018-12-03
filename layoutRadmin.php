<!DOCTYPE html>
<html>

	<?php
		
			
		$correo = $_GET["email"];
		//echo"<h1> $correo </h1>";

	?>
	
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Preguntas</title>
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
		<div id='page-wrap'>
			<header class='main' id='h1'>
				<span class="right"><a href="./PHP/Logout.php">Logout</a></span>
				<h2>Quiz: el juego de las preguntas</h2>
			</header>
		<nav class='main' id='n1' role='navigation'>
			<span>
				<?php
					echo "<a href='./layoutRadmin.php?email=$correo'>Inicio</a><br>";
				?>
			</span>
			<span>
				<?php
					echo "<a href='PHP/gestionarCuentas.php?email=$correo'>Gestionar cuentas</a><br>";
				?>
			</span>
			<span>
				<?php
					echo "<a href='./creditosRA.php?email=$correo'>Creditos</a><br>";
				?>
			</span>
		</nav>
		<section class="main" id="s1">
		
		<div>
			<!-- <img src="./Imagenes/Quiz.png"> -->
		</div>
		</section>
		<footer class='main' id='f1'>
			<a href='https://github.com/Julito22/Laboratorio5'>Link GITHUB</a>
		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	  <script>
		$("#imagem").attr("width", 50).attr("alt","width")
	</script>
	
	
	</body>



</html>
