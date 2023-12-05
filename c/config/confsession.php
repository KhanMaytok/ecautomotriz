<?php
session_start();

function Sesion($param_nom,$param_valor)
{
	$_SESSION[$param_nom] = $param_valor;
}

function DevolverSesion($param_nom) 
{
	return $_SESSION[$param_nom];
}

function DestruirSesion()
{
	foreach ($_SESSION as $param_nom => $param_valor) {
		$_SESSION[$param_nom]='';
		unset($_SESSION[$param_nom]);
	}
	@session_unset();
	@session_destroy();
}
?>