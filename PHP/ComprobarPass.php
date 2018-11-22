<?php

	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
		
	$ns="http://localhost/nusoap-0.9.5/samples";
	$server = new soap_server;
	$server->configureWSDL('pass',$ns);
	$server->wsdl->comprobarPasswords=$ns;
	
	$server->register('pass',
	array('x'=>'xsd:string','y'=>'xsd:string'),
	array('z'=>'xsd:string'),
	$ns);
	
	
	function pass($x,$y){
		$fp = file_get_contents('../toppasswords.txt');
		$m = strpos($fp, $x);
		if($m == false){
			$z='VALIDA';
			return $z;
		}
		else{
			$z='INVALIDA';
			return $z;
		}
		
	}
	/*
	function pass($x,$y){
		$z ='SIN SERVICIO';
		if($y!='1010'){
			return $z;
		}
		$z = 'VALIDA';
		$fp = fopen("../toppasswords.txt", "r");
		while (!feof($fp)){
			$linea = fgets($fp);
			if($linea==$x){
				$z = 'INVALIDA';
				return $z;
			}
		}	
		fclose($fp);
		return $z;
	}
	*/

	if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	$server->service($HTTP_RAW_POST_DATA);

?>