<?php

if(empty($_pagi_sql)){

die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");

}

if(empty($_pagi_cuantos)){

$_pagi_cuantos = 20;

}

if(!isset($_pagi_mostrar_errores)){

$_pagi_mostrar_errores = true;

}

if(!isset($_pagi_conteo_alternativo)){

$_pagi_conteo_alternativo = false;

}

if(!isset($_pagi_separador)){

$_pagi_separador = " | ";

}

if(isset($_pagi_nav_estilo)){

$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";

}else{

$_pagi_nav_estilo_mod = "";

}

if(!isset($_pagi_nav_anterior)){

$_pagi_nav_anterior ="<img src='img/anterior.gif' width='16' height='16' border='0' align='absmiddle'>";

}

if(!isset($_pagi_nav_siguiente)){

$_pagi_nav_siguiente = "<img src='img/siguiente.gif' width='16' height='16' border='0' align='absmiddle'>";

}

if(!isset($_pagi_nav_primera)){

$_pagi_nav_primera = "<img src='img/primero.gif' width='16' height='16' border='0' align='absmiddle'>";

}

if(!isset($_pagi_nav_ultima)){

$_pagi_nav_ultima = "<img src='img/ultimo.gif' width='16' height='16' border='0' align='absmiddle'>";

}

if (empty($_GET['_pagi_pg'])){

$_pagi_actual = 1;

}else{

$_pagi_actual = $_GET['_pagi_pg'];

}

if($_pagi_conteo_alternativo == false){

//echo "fredy";

//$con = pg_connect("dbname=licencia port=5432 user=postgres password=postgres ");

$_pagi_sqlConta = eregi_replace("select (.*) from", "SELECT COUNT(*) FROM", $_pagi_sql);

$_pa2 =mysqli_query($_pagi_sqlConta);

$_pagi_result2 = mysqli_result($_pa2,0,0);//mysql_query($_pagi_sqlConta);

//$_pagi_sqlConta = "SELECT COUNT(*) as a FROM (".$_pagi_sql.") as f";

//$_pagi_result2 =  mysql_query($_pagi_sqlConta);

//$_pagi_result2 = mysql_result($_pa2,"0","a");

//$_pa2 =pg_query($link,$_pagi_sqlConta);

//$_pagi_result2 = pg_result($_pa2,"0","a");



if($_pagi_result2 == false && $_pagi_mostrar_errores == true){

//die (" parra Error en la consulta de conteo de registros: $_pagi_sqlConta. // xxxxxxxxxxx$_pagi_result2xxxxxx postgres dijo: <b>".pg_result_error($_pa2)."</b>");

die ("<div align='center'><font face='verdana' size='-2' color='red'>No se encontraron resultados</font></div>");

}

////muestra la cantidad de registros

//echo"Cantidad de Registros ".$_pagi_result2;

$_pagi_totalReg=mysqli_result($_pa2,0,0);

//$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros

//echo"Total de Registros ".$_pagi_totalReg;

}else{

$_pagi_result3 = mysqli_query($_pagi_sql);

if($_pagi_result3 == false && $_pagi_mostrar_errores == true){

//die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. eche dijo: <b>".pg_error($con)."</b>");

die ("<div align='center'><font face='verdana' size='-2' color='red'>No se encontraron resultados</font></div>");

}

$_pagi_totalReg=mysqli_num_rows($_pagi_result3);

}

$_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);

$_pagi_enlace = $_SERVER['PHP_SELF'];

$_pagi_query_string = "?";

if(!isset($_pagi_propagar)){

if (isset($_GET['_pagi_pg'])) unset($_GET['_pagi_pg']);

$_pagi_propagar = array_keys($_GET);

}elseif(!is_array($_pagi_propagar)){

die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");

}

foreach($_pagi_propagar as $var){

if(isset($GLOBALS[$var])){

$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";

}elseif(isset($_REQUEST[$var])){

$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";

}

}

$_pagi_enlace .= $_pagi_query_string;

$_pagi_navegacion_temporal = array();

if ($_pagi_actual != 1){

$_pagi_url = 1;

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_primera</a>";

$_pagi_url = $_pagi_actual - 1;

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_anterior</a>";

}

if(!isset($_pagi_nav_num_enlaces)){

$_pagi_nav_desde = 1;

$_pagi_nav_hasta = $_pagi_totalPags;

}else{

$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;

$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;

$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;

if($_pagi_nav_desde < 1){

$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);

$_pagi_nav_desde = 1;

}

if($_pagi_nav_hasta > $_pagi_totalPags){

$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);

$_pagi_nav_hasta = $_pagi_totalPags;

if($_pagi_nav_desde < 1){

$_pagi_nav_desde = 1;

}

}

}

for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){

if ($_pagi_i == $_pagi_actual) {



$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";

}else{

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_i."'>".$_pagi_i."</a>";

}

}



if ($_pagi_actual < $_pagi_totalPags){

//faltaba colocar

$_pagi_url = $_pagi_actual + 1;

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_siguiente</a>";





$_pagi_url = $_pagi_totalPags;

$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pagi_pg=".$_pagi_url."'>$_pagi_nav_ultima</a>";

}

$_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);



$_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;



$_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";

$_pagi_result = mysqli_query($_pagi_sqlLim);



//echo $_pagi_result;



if($_pagi_result == false && $_pagi_mostrar_errores == true){

die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysqli_error($link)."</b>");

}

$_pagi_desde = $_pagi_inicial + 1;

$_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;

if($_pagi_hasta > $_pagi_totalReg){

$_pagi_hasta = $_pagi_totalReg;

}

$_pagi_info = "Desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg Registros";

$_pagi_info_min = "Del $_pagi_desde al $_pagi_hasta de $_pagi_totalReg";

?>