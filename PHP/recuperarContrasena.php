<?php
	session_start();
?>
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
		<form action="recuperarContrasena.php" method="post">
			<center>
				<h2>Recuperar contraseña </h2>
				<p> Inroduzca el Email : <input type="email" required name="email" size="21" value="" />
				<p> <input id="input_2" type="submit" /> <br> <br> <br>
				<a href='../layoutNR.html'> Volver al menu inicial</a>
			</center>
		</form>
	</body>
	

	<?php


	//SMTP = localhost;

	//smtp_port = 25;

		include "ParametrosDB.php";
		$basededatos="usuarios";
		
		if (isset($_POST['email'])){
			$email=$_POST['email'];
				
			if ($email!=""){
				
				
				$mysql= mysqli_connect($server, $user, $pass, $basededatos) or die(mysqli_connect_error());
				$result = mysqli_query( $mysql,"select * FROM users WHERE Email ='$email'");
				mysqli_close( $mysql);
				
				if($result){
					$row = mysqli_fetch_row($result);
				}
				if($row[0]==$email){
					
					$to = $email;
					$subject = "Recuperacion de contraseña";
					$codigo = rand(10000,9999);
					
					$_SESSION['code']=$codigo;
					$_SESSION['email']=$email;
					
					$message = "
					<html>
					<head>
					<title> Recuperacion de contraseña </title>
					</head>
					<body>
					<h3>Pasos a realizar para recuperar tu contraseña:</h3>
					<o1>
						<li>Entra en el link proporcionado.</li>
						<li>Introduce el codigo proporcionado y la nueva contraseña.</li>
						<li>Si todo va bien la pagina te lo notificara y habras cambiado tu contraseña.</li>
					</o1>
					<h3>Link a la pagina de recuperación:</h3>
					<h2><a href='./recuperarContrasenaCodigo.php?email=".$email."' id='layout'> Aqui</a></h2>
					<h3>Código de recuperarción:</h3>
					<h2>".$codigo."</h2>
					</body>
					</html>
					";
					
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
					$headers .= "To: Usuario <".$email.">" . "\r\n";
					$headers .= 'From: Recuperar Password <admin000@ehu.es>' . "\r\n";
					
					
					mail($to,$subject,$message,$headers);
					
					echo "El e-mail se ha enviado correctamente.";	
					
				
				}
				else{
						echo "el e-mail introducido no existe";
				}
			}
		}
	?>
</html>

