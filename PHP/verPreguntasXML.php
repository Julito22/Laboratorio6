<?php

	include "ParametrosDB.php";
	$correo = $_GET["email"];
	echo $correo;
	
	if(!$xml=simplexml_load_file('../xml/preguntas.xml')){
		die("Ha ocurrido algun erro al acceder al fichero xml.");
	}
	
	echo "<body background=../Imagenes/Back.jpg>";
		echo "<table border=1>";
			echo "<center>";
				echo "<tr>";
					echo "<th> Correo </th>";
					echo "<th> Enunciado </th>";
					echo "<th> Respuesta correcta </th>";
				echo "</tr>";
			echo "</center>";
		
			foreach($xml->assessmentItem as $m){
				if($correo==$m->attributes()->author){
					$correo1 = $m->attributes()->author;
					$enunciado = $m->itemBody->p;
					$respuesta = $m->correctResponse->value;
					
				
					echo "<center>";
						echo "<tr>";
							echo "<td>".$correo1."</td>";
							echo "<td>".$enunciado."</td>";
							echo "<td>".$respuesta."</td>";
						echo "</tr>";
					echo "</center>";
				}
				
			}	
			
		echo"</table>";
		echo "<a href='../layoutRegistrado.php?email=$correo'>Inicio</a><br>";
		
	echo "</body>";
	
?>