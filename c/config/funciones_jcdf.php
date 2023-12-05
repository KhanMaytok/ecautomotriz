<?php
// Calcula la edad (formato: aÃ±o/mes/dia)
function edad($edad){
list($anio,$mes,$dia) = explode("-",$edad);
$anio_dif = date("Y") - $anio;
$mes_dif = date("m") - $mes;
$dia_dif = date("d") - $dia;
if ($anio_dif < 1 && $mes_dif > 0){
return $mes_dif." meses";
}
if ($anio_dif < 1 && $mes_dif < 1){
return $dia_dif." d&iacute;as";
}
if ($anio_dif == 1 && $mes_dif < 1){
return ($mes_dif + 12)." meses";
}
if ($mes_dif < 0){
$anio_dif--;
}
return $anio_dif." a&ntilde;os";
}

function tiempoampm($ampm){
	$cadena = strtotime($ampm);
	$cadena = date("h:i:s a.", $cadena);
	return $cadena;
}


function normal($fecha){ 
    $lafecha=date("d-m-Y",strtotime($fecha)); 
    return $lafecha; 
} 

function normals($fecha){ 
    $lafecha=date("d/m/Y",strtotime($fecha)); 
    return $lafecha;
}

function normal2p($fecha){ 
	$lafecha=date("d.m.Y",strtotime($fecha)); 
    return $lafecha; 
}

function getDecimalRand( $iLow, $iHigh, $iDecimalPlaces = 10 )
{
if($iHigh <= $iLow)
{
trigger_error('You cannot specify a value for $iHigh which is lower or of equal value to $iLow.',E_USER_ERROR);
return false;
}
for($i=0;$i<$iDecimalPlaces;$i++)
{
$sDecimal .= rand(0,9);
}
return sprintf('%s.%s',rand($iLow,$iHigh - 1),(is_null($sDecimal)) ? '0' : $sDecimal);
}

function red_dos_dec($valor) {
   $float_redondeado=round($valor * 100) / 100;
   return $float_redondeado;
}

function devuelvemes($fecha) 
    {
	$fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo
	$mes=date("m",$fecha); // nÃºmero del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="ENE"; 
          break; 
       case "02": 
          $mes="FEB"; 
          break; 
       case "03": 
          $mes="MAR"; 
          break; 
       case "04": 
          $mes="ABR"; 
          break; 
       case "05": 
          $mes="MAY"; 
          break; 
       case "06": 
          $mes="JUN"; 
          break; 
       case "07": 
          $mes="JUL"; 
          break; 
       case "08": 
          $mes="AGO"; 
          break; 
       case "09": 
          $mes="SET"; 
          break; 
       case "10": 
          $mes="OCT"; 
          break; 
       case "11": 
          $mes="NOV"; 
          break; 
       case "12": 
          $mes="DIC"; 
          break; 
       }
	 $dia=date("d",$fecha); // dÃ­a del mes en nÃºmero
	 $ano=date("Y",$fecha);
	 $fecha= $dia."  ".$mes."  ".$ano; // unimos el resultado en una unica cadena 
	 
     return $fecha; //enviamos la fecha al programa
	}

function traduce($fecha) 
    { 
    $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el nÃºmero del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Domingo"; 
          break; 
       case "1": 
          $diasemana="Lunes"; 
          break; 
       case "2": 
          $diasemana="Martes"; 
          break; 
       case "3": 
          $diasemana="Miércoles"; 
          break; 
       case "4": 
          $diasemana="Jueves"; 
          break; 
       case "5": 
          $diasemana="Viernes"; 
          break; 
       case "6": 
          $diasemana="Sábado"; 
          break; 
       } 
    $dia=date("d",$fecha); // dÃ­a del mes en nÃºmero 
    $mes=date("m",$fecha); // nÃºmero del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el aÃ±o en formato 4 digitos 
    $fecha= $diasemana.", ".$dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena 
    return $fecha; //enviamos la fecha al programa 
    } 
	
function traducesindia($fecha) 
    { 
    $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el nÃºmero del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Domingo"; 
          break; 
       case "1": 
          $diasemana="Lunes"; 
          break; 
       case "2": 
          $diasemana="Martes"; 
          break; 
       case "3": 
          $diasemana="Miércoles"; 
          break; 
       case "4": 
          $diasemana="Jueves"; 
          break; 
       case "5": 
          $diasemana="Viernes"; 
          break; 
       case "6": 
          $diasemana="Sábado"; 
          break; 
       } 
    $dia=date("d",$fecha); // dÃ­a del mes en nÃºmero 
    $mes=date("m",$fecha); // nÃºmero del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el aÃ±o en formato 4 digitos 
    $fecha= $dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena 
    return $fecha; //enviamos la fecha al programa 
    } 
	
function short_name($str, $limit)
  {
    // Make sure a small or negative limit doesn't cause a negative length for substr().
    if ($limit < 3)
    {
      $limit = 3;
    }

    // Now truncate the string if it is over the limit.
    if (strlen($str) > $limit)
    {
      return substr($str, 0, $limit - 3) . '...';
    }
    else
    {
      return $str;
    }
  }
  
function zerofill($valor, $longitud){
 	$res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
 	return $res;
}

function filedata($path) {
        // Vaciamos la caché de lectura de disco
        clearstatcache();
        // Comprobamos si el fichero existe
        $data["exists"] = is_file($path);
        // Comprobamos si el fichero es escribible
        $data["writable"] = is_writable($path);
        // Leemos los permisos del fichero
        $data["chmod"] = ($data["exists"] ? substr(sprintf("%o", fileperms($path)), -4) : FALSE);
        // Extraemos la extensión, un sólo paso
        $data["ext"] = substr(strrchr($path, "."),1);
        // Primer paso de lectura de ruta
        $data["path"] = array_shift(explode(".".$data["ext"],$path));
        // Primer paso de lectura de nombre
        $data["name"] = array_pop(explode("/",$data["path"]));
        // Ajustamos nombre a FALSE si está vacio
        $data["name"] = ($data["name"] ? $data["name"] : FALSE);
        // Ajustamos la ruta a FALSE si está vacia
        $data["path"] = ($data["exists"] ? ($data["name"] ? realpath(array_shift(explode($data["name"],$data["path"]))) : realpath(array_shift(explode($data["ext"],$data["path"])))) : ($data["name"] ? array_shift(explode($data["name"],$data["path"])) : ($data["ext"] ? array_shift(explode($data["ext"],$data["path"])) : rtrim($data["path"],"/")))) ;
        // Ajustamos el nombre a FALSE si está vacio o a su valor en caso contrario
        $data["filename"] = (($data["name"] OR $data["ext"]) ? $data["name"].($data["ext"] ? "." : "").$data["ext"] : FALSE);
        // Devolvemos los resultados
        return $data;
}

/***************CONVERTIR NUMEROS A LETRAS ***********************/
function basico($numero) {
$valor = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho',
'nueve','diez','once','doce','trece','catorce','quince','dieciséis','diecisiete','dieciocho','diecinueve','veinte','veintiuno','veintidos','veintitres','veinticuatro','veinticinco',
'veintiséis','veintisiete','veintiocho','veintinueve');
return $valor[$numero - 1];
}
function decenas($n) {
$decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
70=>'setenta',80=>'ochenta',90=>'noventa');
if( $n <= 29) return basico($n);
$x = $n % 10;
if ( $x == 0 ) {
return $decenas[$n];
} else return $decenas[$n - $x].' y '. basico($x);
}

function centenas($n) {
$cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',
400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',
700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');
if( $n >= 100) {
if ( $n % 100 == 0 ) {
return $cientos[$n];
} else {
$u = (int) substr($n,0,1);
$d = (int) substr($n,1,2);
return (($u == 1)?'ciento':$cientos[$u*100]).' '.decenas($d);
}
} else return decenas($n);
}

function miles($n) {
if($n > 999) {
if( $n == 1000) {return 'mil';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-3);
$x = (int)substr($n,-3);
if($c == 1) {$cadena = 'mil '.centenas($x);}
else if($x != 0) {$cadena = centenas($c).' mil '.centenas($x);}
else $cadena = centenas($c). ' mil';
return $cadena;
}
} else return centenas($n);
}
function convertirLetras($n,$yn) {
if($yn==0) {
	return $n;
}else{
switch (true) {
case ( $n >= 1 && $n <= 29) : return strtoupper(basico($n)); break;
case ( $n >= 30 && $n < 100) : return strtoupper(decenas($n)); break;
case ( $n >= 100 && $n < 1000) : return strtoupper(centenas($n)); break;
case ($n >= 1000 && $n <= 999999): return strtoupper(miles($n));
}
}
}
function convertirMes($n,$yn) {
if($yn==0) {
	return $n;
}else{
	switch($n) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       }
	   return strtoupper($mes);
}
}
/*******************************/
?>