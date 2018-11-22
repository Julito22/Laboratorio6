<!DOCTYPE html>
<html>
	<?php

		$correo = $_GET["email"];

	?>

  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='../estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
			<span class="right"><a href="../layoutNR.html">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span>
			<?php
				echo "<a href='../layoutRegistrado.php?email=$correo'>Inicio</a><br>";
			?>
		</span>
		<span>
			<?php
				echo "<a href='./gestionarPreguntas.php?email=$correo'>Gestionar Preguntas</a><br>";
			?>
		</span>
		<span>
			<?php
				echo "<a href='../creditosR.php?email=$correo'>Creditos</a><br>";
			?>
		</span>
	</nav>
    <section class="main" id="s1">
		<div>
			<h1> Editar pregunta </h1>
			<form method="get">
			<input type = "button" value = "Ver Pregunta" onclick= "verPreguntas()"> 
			<input type = "button" value = "Insertar Pregunta" onclick= "insertarPregunta()"> 
				<center>
					<p> Enunciado de la pregunta : <input type="text" required name="enunciado" size="21" value="" id="enunciado" />
					<p> Respuesta correcta: <input type="text" required name="respuesta" size="21" value="" id="respuesta" />
					<p> Dificultad (del 0 al 5): <input type="text" required name="complejidad" size="21" value=""id="complejidad" />
					<p> Tema: <input type="text" name="tema" size="21" value="" id="tema"/>
				</center>
			</form>
		</div>
    </section>
	<div id="tabla">
		<body background="../Imagenes/Back.jpg">
	</div>
	<footer class='main' id='f1'>
		<a href='https://github.com/Julito22/Laboratorio3b'>Link GITHUB</a>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script language = "javascript">
		XMLHttpRequestObject = new XMLHttpRequest();
		XMLHttpRequestObject.onreadystatechange = function(){
			//alert (XMLHttpRequestObject.readyState);
			if (XMLHttpRequestObject.readyState==4){
				var obj = document.getElementById('tabla');
				obj.innerHTML = XMLHttpRequestObject.responseText;
			}
		}
		function verPreguntas(){
			var mail = "<?php echo $correo; ?>";
			XMLHttpRequestObject.open("GET",'./verPreguntasXML.php?email='+mail);
			XMLHttpRequestObject.send(null);
		}
		function insertarPregunta(){
			var mail = "<?php echo $correo; ?>";
			var enunciado = $("#enunciado").val();
			var respuesta = $("#respuesta").val();
			var complejidad = $("#complejidad").val();
			var tema = $("#tema").val();
			XMLHttpRequestObject.open("GET",'./insertarPreguntasXML.php?email='+mail+'&enunciado='+enunciado+'&respuesta='+respuesta+'&complejidad='+complejidad+'&tema='+tema);
			//XMLHttpRequestObject.open("GET",'./verPreguntasXML.php?email='+mail);
			XMLHttpRequestObject.send(null);
			//verPreguntas();
		}
	</script> 
	</body>

</html>



