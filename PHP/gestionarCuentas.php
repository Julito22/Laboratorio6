
<?php
		
		session_start();
		if (!isset($_SESSION['mail'])){
			echo "<center>";
					echo "<br><br><br>";
					header("Location: ./negarAcceso.php");
			echo "</center>";
		}
		if(strpos($_SESSION['mail'],"ehu.eus")==True){
			echo "<center>";
					echo "<br><br><br>";
					header("Location: ./negarAcceso.php");
			echo "</center>";
		}

		
	$correo = $_GET["email"];	
	include "ParametrosDB.php";
	$basededatos="usuarios";
	
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	
	$dat = mysqli_query($link, "select * from users");
	
	echo "<body background=../Imagenes/Back.jpg>";
	
		echo "<table border=1>";
			echo "<center>";
				echo "<tr>";
					echo "<th> Email </th>";
					echo "<th> Nombre y Apellido </th>";
					echo "<th> Password </th>";
					echo "<th> Imagen </th>";	
					echo "<th> Bloqueado </th>";	
				echo "</tr>";
			echo "</center>";
	
		while ($row = mysqli_fetch_array($dat)){
				
				$input = $row['Email'];
				$input1 = $row['Bloqueado'];
				echo "<center>";
					echo "<tr>";
					
						echo "<td>".$row['Email']."</td>";
						echo "<td>".$row['NombreAp']."</td>";
						echo "<td>".$row['Password']."</td>";
						echo "<td>".$row['Imagen']."</td>";
						echo "<td>".$row['Bloqueado']."</td>";
						echo "<td> <input type='button' onclick=cambiar('$input','$input1') value ='Bloquear/Desbloquear'> </td>";
						echo "<td> <input type='button' onclick=eliminar('$input') value ='Eliminar'> </td>";
						
					echo "</tr>";
				echo "</center>";
			
		}	
		$dat->close();
		mysqli_close($link);
			
		echo"</table>";
		echo "<a href='../layoutRadmin.php?email=$correo'>Volver al menu</a>";
		
		
?>
<script>
function cambiar(inp1,inp2){
		document.location='./CambiarEstado.php?email='+inp1+'&bloqueado='+inp2;
}
function eliminar(inp1){
		document.location='eliminar.php?email='+inp1;
}
</script>



