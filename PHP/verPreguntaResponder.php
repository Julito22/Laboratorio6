<!DOCTYPE html>
<html>
    <?php

	if(!$xml=simplexml_load_file('../xml/preguntas.xml')){
		die("Ha ocurrido algun erro al acceder al fichero xml.");
	}
	
	$contTotal = 0;
	foreach($xml->assessmentItem as $m){
		$contTotal = $contTotal + 1;
	}
	$random = rand(1,$contTotal);
	$contTotal= 0;
	foreach($xml->assessmentItem as $m){
		$contTotal = $contTotal + 1;
	
		if($contTotal==$random){
			$correo1 = $m->attributes()->author;
			$enunciado = $m->itemBody->p;
			$respuesta = $m->correctResponse->value;
			$respuesta1 = $m->IncorrectResponse1->value;
			$respuesta2 = $m->IncorrectResponse2->value;
			$respuesta3 = $m->IncorrectResponse3->value;
		}
	}
	$respuestaCorrecta = $respuesta;
	$todos = FALSE;
	$valorRespuesta1 = 5;
	$valorRespuesta2 = 5;
	$valorRespuesta3 = 5;
	$valorRespuesta4 = 5;
	$respuestas= array($respuesta , $respuesta1, $respuesta2, $respuesta3);
	while($todos == FALSE){
	    
	    $random=rand(0,3);
	    if($valorRespuesta1 ==5){
	        $valorRespuesta1=$random;
	    }
	    else if(($valorRespuesta2==5)and($valorRespuesta1!=$random)){
	        $valorRespuesta2=$random;
	    }
	    else if(($valorRespuesta3==5)and($valorRespuesta2!=$random)and($valorRespuesta1!=$random)){
	        $valorRespuesta3=$random;
	    }
	    else if(($valorRespuesta4==5)and($valorRespuesta3!=$random)and($valorRespuesta2!=$random)and($valorRespuesta1!=$random)){
	        $valorRespuesta4=$random;
	        $todos =TRUE;
	    }
	}
	/*
	echo $valorRespuesta1;
	echo $valorRespuesta2;
	echo $valorRespuesta3;
	echo $valorRespuesta4;
	echo "<br>";
	echo $respuesta;
	echo $respuesta1;
	echo $respuesta2;
	echo $respuesta3;
	echo "<br>";
	*/
	$respuesta = $respuestas[$valorRespuesta1];
	$respuesta1 = $respuestas[$valorRespuesta2];
	$respuesta2 = $respuestas[$valorRespuesta3];
	$respuesta3 = $respuestas[$valorRespuesta4];
	?>
	
	<body background=../Imagenes/Back.jpg>
	    <section class="main" id="s1">
    		<center>
				<?php 
				
    		    echo "<form action='./verPreguntaResponder.php' method='post'";
    		        
    		    echo"<h3> ".$enunciado."</h3><br>";
    		    echo "<div id='respuestas'>";
    				echo" <input type='radio' name='resp' id ='resp1' value='$respuesta'>'$respuesta' <br>";
    				echo" <input type='radio' name='resp' id ='resp2' value='$respuesta1'>'$respuesta1' <br>";
    				echo" <input type='radio' name='resp' id ='resp3' value='$respuesta2'>'$respuesta2'<br>";
    				echo" <input type='radio' name='resp' id ='resp4' value='$respuesta3'>'$respuesta3'<br> ";
    				echo" <input type ='submit' name='submit' value = 'Generar otra pregunta'><br><br>";
    			echo"</div>";
				
				?>
				</form>
                <input type = "button" value = "Comprobar resultado" onclick= "verResultado()"><br><br>
                <a href='../layoutNR.html'>Voler al menu inicial</a>
                
                
               
            </center>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		
			<script> 
    		function verResultado(){
    			var resp1 = "<?php echo $respuesta; ?>";
    			var resp2 = "<?php echo $respuesta1; ?>";
    			var resp3 = "<?php echo $respuesta2; ?>";
    			var resp4 = "<?php echo $respuesta3; ?>";
    			var respCorrecta = "<?php echo $respuestaCorrecta; ?>";
                var respuestaSeleccionada;
                if(document.getElementById('resp1').checked){
                    respuestaSeleccionada = document.getElementById('resp1').value;
                
                }else if(document.getElementById('resp2').checked){
                    respuestaSeleccionada = document.getElementById('resp2').value;
                
                }else if(document.getElementById('resp3').checked){
                    respuestaSeleccionada = document.getElementById('resp3').value;
                }
                else if(document.getElementById('resp4').checked){
                    respuestaSeleccionada = document.getElementById('resp4').value;
                }
                
                if(respCorrecta == respuestaSeleccionada){
                    alert("Respuesta Correcta, Muy bien!!");
                }
                else{
                    
                    alert("Respuesta incorrecta, lo sentimos.")
                }
    		}
    	    </script>
			
    	</section>	
    </body>
</html>