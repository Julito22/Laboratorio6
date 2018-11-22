<?php

	include "ParametrosDB.php";

	$correo = $_POST["Correo"];
	$Enunciado = $_POST["Enunciado"];
	$respuesta = $_POST["respuesta"];
	$respuesta1 = $_POST["respuesta1"];
	$respuesta2 = $_POST["respuesta2"];
	$respuesta3 = $_POST["respuesta3"];
	$complejidad = $_POST["complejidad"];
	$tema = $_POST["tema"];
	$imagen = $_POST["imagen"];
	$error=false;
	
	
	
	if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
		echo("El email introducido no es correocto");
		echo"<br>";
		$error=true;
	}
	if(((empty($correo))==true)||((empty($Enunciado))==true)||((empty($respuesta))==true)||((empty($respuesta1))==true)||((empty($respuesta2))==true)||((empty($respuesta3))==true)||((empty($tema))==true)){
		echo("No puede haber un campo obligatorio vacio");
		echo"<br>";
		$error=true;
	}
	if((0>$complejidad)||($complejidad>5)){
			echo("El valor de complejidad debe ser un numero comprendido entre 0 y 5.");
			echo"<br>";
			$error=true;
	}
	
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	
	$sql = "INSERT INTO preguntas (Correo, Enunciado, Respuesta_correcta, Respuesta_incorrecta1, Respuesta_incorrecta2, Respuesta_incorrecta3, Complejidad, Tema, Imagen) VALUES('$correo', '$Enunciado', '$respuesta', '$respuesta1', '$respuesta2', '$respuesta3', $complejidad, '$tema', '$imagen')";
	
	if(!mysqli_query($link, $sql)){
		die("Ha ocurrido algun error.");
	}
	
	if(!$xml=simplexml_load_file('../xml/preguntas.xml')){
		die("Ha ocurrido algun erro al acceder al fichero xml.");
		$error==False;
	}
	else{
	
		$xml=simplexml_load_file('../xml/preguntas.xml');
		
		$assessmentItem=$xml->addChild('assessmentItem');
		$assessmentItem->addAttribute('subject', $tema);
		$assessmentItem->addAttribute('author', $correo);
		$itemBody=$assessmentItem->addChild('itemBody');
		$itemBody->addChild('p', $Enunciado);
		$correct=$assessmentItem->addChild('correctResponse');
		$correct->addChild('value', $respuesta);
		$incorrect=$assessmentItem->addChild('incorrectResponses');
		$incorrect->addChild('value', $respuesta1);
		$incorrect->addChild('value', $respuesta2);
		$incorrect->addChild('value', $respuesta3);
		$xml->asXML('../xml/preguntas.xml');
		
	}
	
	
	if($error==False){
		
		echo "<body background=../Imagenes/Back.jpg>";
			echo "<center>";
				echo "<h2 > La pregunta ha sido introducida con exito </h2><br>";
				echo "<a href='layoutRegistrado.html'> Volver al menu de inicio </a><br>";
				echo "<a href='../pregunta.html'> Insertar otra pregunta </a><br>";
				echo "<a href='verPreguntas.php'> Ver tabla de pregunta (base de datos). </a><br>";
				echo "<a href='verPreguntasXML.php'> Ver preguntas (fichero XML). </a><br>";
				echo "<img src='../Imagenes/Homer.png'><br>";
			echo "</center>";
		echo "</body>";
	}
	
	else{
		echo("No se ha enviado la pregunta");
	}
	

?>