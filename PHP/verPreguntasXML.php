<?php

	include "ParametrosDB.php";
	$correo = $_GET["email"];
	
	if(!$xml=simplexml_load_file('../xml/preguntas.xml')){
		die("Ha ocurrido algun erro al acceder al fichero xml.");
	}
	
	echo "<body background=../Imagenes/Back.jpg>";
		echo "<center>";
			echo "<table border=1>";
				
					echo "<tr>";
						echo "<th> Correo </th>";
						echo "<th> Enunciado </th>";
						echo "<th> Respuesta correcta </th>";
					echo "</tr>";
				echo "</center>";
				$cont = 0;
				$contTotal = 0;
				foreach($xml->assessmentItem as $m){
					$contTotal = $contTotal + 1;
					if($correo==$m->attributes()->author){
						$cont = $cont + 1;
						$correo1 = $m->attributes()->author;
						$enunciado = $m->itemBody->p;
						$respuesta = $m->correctResponse->value;
						
					
						echo "<center>";
							echo "<tr>";
								echo "<td>".$correo1."</td>";
								echo "<td>".$enunciado."</td>";
								echo "<td>".$respuesta."</td>";
							echo "</tr>";
					
				}
				
			}	
			echo"</table>";
			echo "<h3> Preguntas insertadas: ".$cont."/".$contTotal."</h3>";
			echo "<a href='../layoutRuser.php?email=$correo'>Inicio</a><br>";
		echo "</center>";
		
	echo "</body>";
	
?>