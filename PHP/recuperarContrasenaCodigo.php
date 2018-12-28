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
		<form action="recuperarContrasenaCodigo.php" method="post">
			<center>
				<h2>Recuperar contraseña </h2>
				<p> Email : <input type="email" required name="email" size="21" value="" />
				<p> Introduce tu nueva contraseña : <input type="pass" required name="pass" size="21" value="" />
				<p> Repite tu nueva contraseña : <input type="pass2" required name="pass2" size="21" value="" />
				<p> Introduce el codigo de recuperacion : <input type="code" required name="code" size="21" value="" />
				<p> <input id="input_2" type="submit" /> <br> <br> <br>
				<a href='../layoutNR.html'> Volver al menu inicial</a>
			</center>
		</form>
	</body>

	<?php

		include "ParametrosDB.php";
		$basededatos="usuarios";
		
		$email = trim($_POST['email']);
		$contrasena = trim($_POST['pass']);
		$contrasenaRep = trim($_POST['pass2']);
		$code = trim($_POST['code']);
		$emailRegEx = "/^([a-zA-Z])+[0-9][0-9][0-9]\@ikasle\ehu\.(es|eus)$/";
		
		if ($email!="" && $contraseña!="" && $contrasenaRep!="" && $code !=""){
			
			if($contrasena != $contrasenaRep){
				$contrasenaErr = "Las contraseñas introducidas no coinciden";
				echo $contrasenaErr;
			}
			else{
				
				if($_SESSION['code']==$code && $_SESSION['email']== $email){
						
					$sql = "UPDATE registro SET Password = '$contrasena' WHERE email ='$email'";
					
					if( mysqli_query($conn, $sql)) {
							
						echo "Se ha actualizado la contrasena correctamente.";
					}
					else{
						echo "Ha habido un error.";
					}
				}
				else{
					
					echo "Codigo o e-mail incorrecto.";
				}
		}
	?>
</html>



