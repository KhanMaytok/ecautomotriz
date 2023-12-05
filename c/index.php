<?php
session_cache_limiter('nocache,private');             
include("config/confsession.php");

include("config/Cvalidacion.php");
$val=new Cvalidacion();
$valor=$val->valida();
Sesion('valor',$valor);

$numcertbus = "";
if(isset($_GET['jcdf'])) { 
	$numcertbus = substr(base64_decode($_GET['jcdf']),0,24); 
	header("location:certificado.php?jcdf=".$_GET['jcdf']."");
	exit;
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ECAUTOMOTRIZ | v5.1.7 Sistema de Consulta de Certificaci&oacute;n</title>



<script type="text/javascript" src="js/libreria_jcdf.js"> </script>
<script type="text/javascript" src="js/formato.js"></script>

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
<script language="JavaScript">
<!--
function validar(form1)
{
	if (form1.numcertificado.value=="" && form1.placa.value=="" && form1.chasis.value=="") { 
		alert("Por Favor, Ingrese uno de los datos para la búsqueda del Certificado.");
		form1.numcertificado.focus(); 
		return (false);
	}
	if (form1.imagen.value=="") { 
		alert("Por Favor, Ingrese Código de Seguridad.");
		form1.imagen.focus(); 
		return (false);
	}
	return true;
}
//-->
</script>
</head>
<body>
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
        <td nowrap><div align="left" ><strong> &nbsp;&nbsp;<a href="#" class="opcmenusel">CONSULTA DE CERTIFICADOS VEHICULARES</a></strong></div></td>
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
        <td bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="10" bgcolor="#FFFFFF">
    	<tbody>
        	<tr>
            	<td height="100%" valign="top"><table width="100%" height="100%" border="0" align="center">
            	  <tr>
            	    <td width="100%" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF" style="background-image: url(img/logosh.gif); background-repeat: no-repeat; background-position:bottom;">
            	      <tbody>
            	        <tr>
            	          <td valign="top"><form name="form1" method="post" action="certificado.php" autocomplete="off" onSubmit="return validar(this)">
		    <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="720">
              <tbody>
                <tr>
                  <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                              <tbody>
                                <tr>
                                  <th align="left"  width="20%"> </th>
                                  <th height="26" width="50%"> <span class="G">BUSQUEDA DE CERTIFICADO </span></th>
                                  <th align="right" width="25%"> </th>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
			    <tr>
			      <td colspan="5"><table width="50%" border="0" cellpadding="0" cellspacing="0">
			        <tbody>
			          <tr>
			            <td  height="10" width="10">&nbsp;</td>
			            <td  align="left" width="90%"><span class="Estilo2">&nbsp;BUSCAR CERTIFICADO POR</span></td>
			            <td align="right"  height="20"></td>
			            </tr>
			          </tbody>
			        </table></td>
			      </tr>
                <tr valign="middle">
                  <td width="1%" class="marco">&nbsp;</td>
                  <td width="22%" align="right" class="etiqueta">&nbsp;</td>
                  <td width="1%" class="objeto">&nbsp;</td>
                  <td width="78%" class="objeto">&nbsp;</td>
                  <td width="1%" class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td align="right" class="etiqueta">N&deg; Certificado&nbsp;&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><input name="numcertificado" type="text" class="cajatexto" id="numcertificado" onKeyPress="return AceptaTodo(event,this,30,form1)" size="30" onFocus="this.style.backgroundColor ='#FFFFBC';" onBlur="this.style.backgroundColor ='#FFFFFF';" value="<?=$numcertbus?>"></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td align="right" class="etiqueta">Placa&nbsp;&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><input name="placa" size="30" class="cajatexto" id="placa" type="text" onKeyPress="return AceptaTodonguion(event,this,19,form1)" style="text-align:center" onFocus="this.style.backgroundColor ='#FFFFBC';" onBlur="this.style.backgroundColor ='#FFFFFF';"></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td align="right" class="etiqueta">Chasis&nbsp;&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><input name="chasis" size="30" class="cajatexto" id="chasis" type="text" onKeyPress="return AceptaTodo(event,this,50,form1)" onFocus="this.style.backgroundColor ='#FFFFBC';" onBlur="this.style.backgroundColor ='#FFFFFF';"></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td class="etiqueta" align="right">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td rowspan="2" align="right" class="etiqueta">C&oacute;digo de Seguridad&nbsp;&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><img src="verify.png?t<?=date("d/m/Y H:i:s",time())?>" width="135" height="22" align="absbottom" draggable="false" /></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><input name="imagen" type="text" class="cajatexto" size="20" style="text-align:center; height:22px; width:135px;" /></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td class="etiqueta" align="right">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td class="etiqueta" align="right">&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><?php if(isset($_GET["error"]))
		{
		if($_GET["error"] == "N")
			echo "<TABLE width=100%><TR><TD align=center><Font size=1 color=red>[ Error: C&oacute;digo de Seguridad Incorrecto ]</Font></TD></TR></TABLE>";
		elseif($_GET["error"] == "C")
			echo "<TABLE width=100%><TR><TD align=center><Font size=1 color=red>[ Aviso: Datos de verificación alterados, Comuníquese con S&H Ingenieros. Posible falsificación ]</Font></TD></TR></TABLE>";
		}
		?></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tbody>
                      <tr>
                        <td class="spaceRow" colspan="7" height="1"></td>
                        </tr>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" width="100%"><input name="buscar" type="submit" class="boton" id="buscar" value=".:: Buscar ::."></td>
                              <td width="50%"></td>
                              <td align="right" width="25%"><input name="volver" type="button" class="boton" id="volver" onClick="location='http://www.ecautomotriz.com'" value=".:: Volver ::.">                                  </td>
                              </tr>
                            </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
            </table>
			 
            </form></td>
          	          </tr>
          	        </tbody>
          	      </table></td>
          	    </tr>
          	  </table></td>
            </tr>
        </tbody>
    </table></td>
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
</body>
</html>