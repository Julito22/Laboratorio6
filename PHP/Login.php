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
				<p> <input id="input_2" type="submit" /> <br>
				<a href='./recuperarContrasena.php'> ¿Has olvidado tu contraseña?</a> <br>
				<a href='../layoutNR.html'> Volver al menu inicial</a>
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
			$str = (string)$pass;
			//$pass = string strval ( $pass )
			
			$passHash = mysqli_query( $mysql,"select Password from users where Email ='$username'");
			$row = mysqli_fetch_array($passHash);
			$passH = $row['Password'];
			mysqli_close( $mysql);
			
			if(password_verify($str, $passH)==FALSE){
				echo "<center>";
					echo ("Contraseña incorrecta<p><br>");
					echo "<img src='../Imagenes/tickRojo.png'><br>";
					echo " <a href='Login.php'>Puede intentarlo de nuevo</a><br>";
					echo "<a href='../layoutNR.html'>Ir al menu</a><br>";
				echo "</center>";
			}
			else{
				/*
				$usuarios = mysqli_query( $mysql,"select * from users where Email ='$username' and Password ='$pass'");			
				$cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
				mysqli_close( $mysql); //cierra la conexion
				*/
				
				session_start ();
				$_SESSION['mail'] = $username;
				if(strpos($_SESSION['mail'],"ehu.eus")==True){
					echo "<center>";
						echo "Login correcto<p>Puede insertar preguntas.</p>";
						echo "<img src='../Imagenes/tick.png'><br>";
						echo "<a href='../layoutRuser.php?email=$username'>Ir al menu</a><br>";
					echo "</center>";
				}
				else{
					echo "<center>";
						echo "Login correcto<p>Puede gestionar cuentas.</p>";
						echo "<img src='../Imagenes/tick.png'><br>";
						echo "<a href='../layoutRadmin.php?email=$username'>Ir al menu</a><br>";
					echo "</center>";
				}
			}
		}
	?>
</html>
