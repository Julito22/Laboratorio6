<?php

	session_start();
	echo "<body background='../Imagenes/Back.jpg'>";
		if (!isset($_SESSION['mail'])){
				echo "<center>";
						echo "<br><br><br>";
						echo "No puedes acceder aqui sin haberte registrado como usuario.<br>";
						echo "<a href='../layoutNR.html'>Ir al menu.</a><br>";
				echo "</center>";
		}
		else{
			if(strpos($_SESSION['mail'],"ehu.eus")==False){
			echo "<center>";
					echo "<br><br><br>";
					echo "No puedes acceder aqui como administrador, solo como usuario.<br>";
					echo "<a href='../layoutNR.html'>Ir al menu.</a><br>";
			echo "</center>";
			}
			else{
				echo "<center>";
					echo "<br><br><br>";
					echo "No puedes acceder aqui como usuario, solo como administrador.<br>";
					echo "<a href='../layoutNR.html'>Ir al menu.</a><br>";
			echo "</center>";
			}
		}
?>