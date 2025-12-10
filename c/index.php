<?php
// URL base de destino
$destination = "https://verify.ecautomotriz.com/";

// Si existen parámetros GET, los agregamos a la URL
if (!empty($_SERVER['QUERY_STRING'])) {
    $destination .= '?' . $_SERVER['QUERY_STRING'];
}

// Redireccionar al usuario
header("Location: $destination", true, 301); // 301 = redirección permanente
exit;
?>