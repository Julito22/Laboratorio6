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
		<form id="registro" action="Registrar.php" method="post">
			<center>
				<h2>Registrar nuevo usuario </h2>
				<label> Nombre & Apellidos : <input type="text" required name="nombre" id="nombre" size="21" value="" /></label><br>
				<label> Email : <input type="email" required name="email" id="email" size="21" value="" /></label><br>
				<label> Contraseña: <input type="password" required name="pass" id="pass" size="21" value="" /></label><br>
				<label> Repetir contraseña: <input type="password" required name="pass2" id="pass2" size="21" value="" /></label><br>
				<label>Imagen(opcional): <input name = "imagen" type="file" id="imagen"></label><br>
				<p> <input id="input_2" type="submit" />
			</center>
		</form>
		<center><a href='../layoutNR.html'>Volver a la pagina principal</a>
		

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js">
        </script>
        <script>
        
            var comprobarMail = function(email){
                var caract = new RegExp(/^([a-zA-Z0-9_.+-])+[0-9][0-9][0-9]+[\@ikasle\.ehu\.eus]+$/);
           
                if (caract.test(email) == false){
                    return false;
                }else{
                    return true;
                }
            }
           
            var comprobar = function(){
                
                var correo = $("#email").val();
                var nombre = $("#nombre").val();
                var pass = $("#pass").val();
				var pass2 = $("#pass2").val();
                
                if((correo.length==0)||(nombre.length==0)||(pass.length==0)){
                    alert("Los campos obligatorios no pueden estar vacios.")
                    return false;
                }
                if(comprobarMail(correo)==false){
                    alert("Correo mal introducido!!, recuerda que debes escribirlo de la siguiente forma: (caracteres)+3 digitos+'@ikasle.ehu.eus'")
					return false;
                }
                if(pass!=pass2){
                    alert("Las contraseñas no coinciden.")
                    return false;
                }
				if(pass.length<8){
					alert("La contraseña debe ocupar mas de 8 caracteres.");
					return false;
				}
				
				return true;
            }
        
			$("#registro").submit(function(){
				return comprobar();
			});
        </script>
	</body>
	

	<?php
	
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	if((isset($_POST['email']))&&(isset($_POST['nombre']))&&(isset($_POST['pass']))){
		
		include "ParametrosDB.php";
		
		$basededatos="usuarios";
		
		
		
		$username=$_POST['email'];
		$name=$_POST['nombre'];
		$password=$_POST['pass'];
		$imagen = $_POST["imagen"];
		
		$soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
		$soapclient1 = new nusoap_client( 'http://localhost/Sistemas_Web/Lab5/PHP/ComprobarPass.php?wsdl',true);
		$result = $soapclient->call('comprobar',array( 'x'=>$_POST['email']));
		$result1 = $soapclient1->call('pass',array( 'x'=>$_POST['pass'],'y'=>'1010'));
		
		/*
		echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient1->request, ENT_QUOTES) . '</pre>';
		echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient1->response, ENT_QUOTES) . '</pre>';
		echo '<h2>Debug</h2>';
		echo '<pre>' . htmlspecialchars($soapclient1->debug_str, ENT_QUOTES) . '</pre>';
		*/
		
		
		if($result1=='INVALIDA'){
			echo "<center>";
					echo "Registro incorrecto, la contraseña no es VALIDA, es demasiado simple, prueba con otra contraseña mas compleja.<br>";
					echo "<img src='../Imagenes/HomerSad.jpg'><br>";
					echo "<a href='./Registrar.php'>Volver a intentarlo.</a><br>";
					echo "<a href='../layoutNR.html'>Ir al menu.</a><br>";
			echo "</center>";
		}
		else{
			if($result=='NO'){
				echo "<center>";
						echo "Registro incorrecto, al parecer no eres VIP.<br>";
						echo "<img src='../Imagenes/HomerSad.jpg'><br>";
						echo "<a href='./Registrar.php'>Volver a intentarlo.</a><br>";
						echo "<a href='../layoutNR.html'>Ir al menu.</a><br>";
				echo "</center>";
			}
			else{
			
				$Bloqueado = "no";
				$mysql= mysqli_connect($server, $user, "", $basededatos) or die(mysqli_connect_error());
				$sql = "INSERT INTO users (Email, NombreAp, Password, Imagen, Bloqueado) VALUES('$username', '$name', '$password', '$imagen', '$Bloqueado')";
				
				
				if(!mysqli_query($mysql, $sql)){
					die("Ha ocurrido algun error.");
				}
				
				else{
					echo "<center>";
						echo "Registro correcto, puede insertar preguntas.<br>";
						echo "<img src='../Imagenes/Homer.png'><br>";
						echo "<a href='../layoutNR.html'>Ir al menu</a><br>";
					echo "</center>";
				}
			}
		}
	}
	?>
</html>
