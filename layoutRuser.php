<!DOCTYPE html>
<html>

	<?php
		
		session_start ();	
		$correo = $_GET["email"];
		$email = $_SESSION['mail'];
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
				<?php echo"<h3>Bienvenido ".$email."</h3>" ?>
			</header>
		<nav class='main' id='n1' role='navigation'>
			<span>
				<?php
					echo "<a href='./layoutRuser.php?email=$correo'>Inicio</a><br>";
				?>
			</span>
			<span>
				<?php
					echo "<a href='PHP/gestionarPreguntas.php?email=$correo'>Gestionar Preguntas</a><br>";
				?>
			</span>
			<span>
				<?php
					echo "<a href='./PHP/verPreguntasXML.php?email=$correo'>ver XML</a><br>";
				?>
			</span>
			<span>
				<?php
					echo "<a href='./creditosRU.php?email=$correo'>Creditos</a><br>";
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
