<!DOCTYPE html>
<html>
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
		<body background="../Imagenes/Back.jpg">
		<form action="Login.php" method="post">
			<center>
				<h2>Identificación de usuario </h2>
				<p> Email : <input type="email" required name="email" size="21" value="" />
				<p> Password: <input type="password" required name="pass" size="21" value="" />
				<p> <input id="input_2" type="submit" />
			</center>
		</form>
	</body>
	
	<?php

		include "ParametrosDB.php";
		$basededatos="usuarios";
			
		if (isset($_POST['email'])){
			
			$mysql= mysqli_connect($server, $user, $pass, $basededatos) or die(mysqli_connect_error());
			
			/*$mysql = mysqli_connect("localhost","root","","prueba");
			if($link->connect_error){
				die("La conexion falló:" . $link->connect_error);
			}*/
			
			
			
			
			$username=$_POST['email'];
			$pass=$_POST['pass'];
			$usuarios = mysqli_query( $mysql,"select * from users where Email ='$username' and Password ='$pass'");
			
			$cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
			mysqli_close( $mysql); //cierra la conexion
			
			if($cont==1){
				echo "<center>";
					echo "Login correcto<p>Puede insertar preguntas.</p>";
					echo "<img src='../Imagenes/tick.png'><br>";
					echo "<a href='../layoutRegistrado.php?email=$username'>Ir al menu</a><br>";
				echo "</center>";
				} 
			else {
				echo "<center>";
					echo ("Par&aacute;metros de login incorrectos<p><br>");
					echo "<img src='../Imagenes/tickRojo.png'><br>";
					echo " <a href='Login.php'>Puede intentarlo de nuevo</a><br>";
					echo "<a href='../layoutNR.html'>Ir al menu</a><br>";
				echo "</center>";
			}
		}
	?>
</html>
