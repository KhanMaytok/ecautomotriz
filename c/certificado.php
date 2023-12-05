<?php
include('config/confsession.php');

if (!isset($_GET["jcdf"]) && $_POST["imagen"]<>DevolverSesion('valor'))
	{
		DestruirSesion();
		header("location:index.php?error=N");
		exit;
	}
	
$key=base64_decode(base64_decode(substr($_GET["jcdf"],-12)));
$micer=base64_decode(substr($_GET["jcdf"],0,-12));
$keyvery=substr($micer,-6);
if($keyvery==$key){
	if(isset($_GET["jcdf"]))
	$_POST["numcertificado"]=$micer;
}else{
	DestruirSesion();
	header("location:index.php?error=C");
	exit;
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ECAUTOMOTRIZ | v5.1.7 Sistema de Consulta de Certificaci&oacute;n</title>



<script type="text/javascript" src="js/libreria_jcdf.js"> </script>
<script type="text/javascript" src="js/opt_mantenimiento.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="css/estilo_jcdf.css">

<style type="text/css">
body {
	background-color: #D7E1EA;
}
.opcmenusel {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	color: #597B97;
	font-weight:bold;
	font-size:14px
}
.opcmantenimiento {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	color: #597B97;
	font-weight:bold;
}
</style>
</head>
<body>
<?php
if(isset($_COOKIE["msgerror"]) || $_COOKIE["msgerror"]!=''){
	echo "<div style='margin-top:250px; position:absolute; width:350px; left:350px' id='error_pg' onclick=SINO('error_pg')><table border='0' width='500' height='100' cellspacing='0' cellpadding='0' background='img/msg.gif'><tr><td width=10>&nbsp;</td><td><span class='cajatexto'>".$_COOKIE["msgerror"]."</span></td><td width=75>&nbsp;</td></tr></table></div>";
}
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="29">
    <!-- Inicio Menú -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5"></td>
    <td width="10"><img src="themes/default/supizq.gif" width="10" height="10"></td>
    <td background="themes/default/horsup.gif"></td>
    <td width="10"><img src="themes/default/supder.gif" width="10" height="10"></td>
    <td width="5"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td background="themes/default/verizq.gif">&nbsp;</td>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50" height="60" align="center"><img src="img/icon_tramite.gif" width="32" height="32"></td>
        <td nowrap><div align="left" ><strong> &nbsp;&nbsp;<a href="index.php" class="opcmenusel">CONSULTA DE CERTIFICADOS VEHICULARES&nbsp;&nbsp;</a></strong></div></td>
    <!-- Inicio Opciones -->
        <td><table  border="0" align="right" cellpadding="0" cellspacing="5" bordercolor="#D7E1EA" class="frmlinex" >
          <tbody>
            <tr>
              <td width="55" height="50" nowrap="nowrap" class="P" id="opt_buscar" onClick="location='http://www.ecautomotriz.com/c/'" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><div align="center" class="opcmantenimiento"><img src="img/buscar.gif" alt="Buscar Registro" width="22" height="22" hspace="1" border="0" align="absmiddle"><br>
                Buscar</div></td>
            </tr>
          </tbody>
        </table></td>
    <!-- Fin Opciones -->
      </tr>
    </table></td>
    <td background="themes/default/verder.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td><img src="themes/default/infizq.gif" width="10" height="10"></td>
    <td background="themes/default/horinf.gif"></td>
    <td><img src="themes/default/infder.gif" width="10" height="10"></td>
    <td></td>
  </tr>
  </table>
    <!-- Fin Menú -->
    </td>
  </tr>
  <tr>
    <td valign="top" height="100%">
    <!-- Inicio Cuerpo -->
    <!-- Inicio Frame -->
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5" height="10"></td>
        <td width="10"><img src="themes/default/supizq.gif" width="10" height="10"></td>
        <td background="themes/default/horsup.gif"></td>
        <td width="10"><img src="themes/default/supder.gif" width="10" height="10"></td>
        <td width="5"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td background="themes/default/verizq.gif">&nbsp;</td>
        <td bgcolor="#FFFFFF"><iframe id="igrid" name="igrid"  src="certificado_listado.php?numcertificado=<?=$_POST["numcertificado"]?>&placa=<?=$_POST["placa"]?>&chasis=<?=$_POST["chasis"]?>" frameborder="0" height="100%" scrolling="yes" width="100%" style="background-image: url(img/logosh.gif); background-repeat: no-repeat; background-position:bottom;"></iframe></td>
        <td background="themes/default/verder.gif">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="10"></td>
        <td><img src="themes/default/infizq.gif" width="10" height="10"></td>
        <td background="themes/default/horinf.gif"></td>
        <td><img src="themes/default/infder.gif" width="10" height="10"></td>
        <td></td>
      </tr>
      </table>
    <!-- Fin Frame -->
    <!-- Fin Cuerpo -->
    </td>
  </tr>
</table>
<script> 
	document.getElementById('igrid').focus() 
</script>
</body>
</html>