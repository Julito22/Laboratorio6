<?php

	include "ParametrosDB.php";

	$correo = $_GET["email"];
	$Enunciado = $_GET["enunciado"];
	$respuesta = $_GET["respuesta"];
	$complejidad = $_GET["complejidad"];
	$tema = $_GET["tema"];
	

	if(!$xml=simplexml_load_file('../xml/preguntas.xml')){
		die("Ha ocurrido algun erro al acceder al fichero xml.");
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
		$xml->asXML('../xml/preguntas.xml');
		
		header("Location: ./verPreguntasXML.php?email=$correo");
	}
	
	

?>