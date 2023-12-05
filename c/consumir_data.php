<?php
ini_set('soap.wsdl_cache_enabled', '0'); 
require_once('lib/nusoap.php');

$client = new nusoap_client('https://sicer.ecautomotriz.com/ws/wsSicer520.asmx?wsdl','wsdl');
$fec_act = date('d/m/Y H:i:s',time());
$param = array('user' => 'SICERWS', 'pwd' => 'SicerWs517', 'numcertificado' => $ws_numcer, 'placa' => $ws_pla, 'chasis' => $ws_cha);
$result = $client->call('obtenerCertificacion', $param);
  
  if ($client->fault) {
	return 'Fallo: '.$result;
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		return 'Error: ' . $err ;
	} else {		// Muestra el resultado
		return base64_decode($result); 
	}
}
?>