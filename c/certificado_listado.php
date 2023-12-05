<?php
ini_set('soap.wsdl_cache_enabled', '0'); 
require_once('lib/nusoap.php');

require('config/funciones_jcdf.php');

$ws_numcer=$_GET["numcertificado"];
$ws_pla=$_GET["placa"];
$ws_cha=$_GET["chasis"];
$xml=require('consumir_data.php');

$DOM = new DOMDocument('1.0', 'ISO-8859-1');

$DOM->loadXML($xml);

$certificaciones = $DOM->getElementsByTagName('certificado');

$fec_consulta = $DOM->getElementsByTagName('informacion_al')->item(0)->nodeValue;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="javascript" src="js/libreria_jcdf.js"></script>
<script type="text/javascript" src="js/opt_mantenimiento.js"></script>

<style type="text/css">
<!--
.Estilo4 {color: #006666}
.cajatexto{font-family: Tahoma, Verdana, Arial; font-size: 11px; color: #333333; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-color:#CCCCCC;}
-->

</style>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
      <TR bgcolor="#FFFFFF">
        <td width="194" height="20" nowrap bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
        <td width="352" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
          <?=$_pagi_info?>
        </font></strong></Td>
      </TR>
    </table></td>
  </tr>
  <tr>
    <td><form id="frmList" name="frmList" action="" method="post" target="_parent" ><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <th width="30" height="23"><input type="checkbox" border="0" name="checkall" onClick="checkform(frmList,this)"></th>
            <th width="150" bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">N&deg; CERTIFICADO</font></div></th>
            <th width="110" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">TIPO</font></div></th>
            <th width="90" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">PLACA</font></div></th>
            <th width="260" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">PROPIETARIO</font></div></th>
            <th width="150" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CHASIS</font></div></th>
            <th width="110" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">FEC. EMISI&Oacute;N </font></div></th>
            <th width="110" nowrap bgcolor="#ebf3fb" onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">VIGENCIA</font></div></th>
            <th width="100" nowrap onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">EMITIDO EN</font></div></th>
            <th width="150" nowrap onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">OBSERVACION</font></div></th>
            <th width="100" nowrap onMouseOver="pintar(this,'#D7E1EA')" onMouseOut="pintar(this,'#ebf3fb')" style="cursor:pointer"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">ESTADO</font></div></th>
          </tr>

          <?php  foreach($certificaciones as $certificacion) { ?>
		  <?php 
		  	$placa=$certificacion->getElementsByTagName("cert_placa")->item(0)->nodeValue;
		  	if(substr($placa, 0, 4)=='@ET@') $placa='EN TRAMITE';
		  ?>
          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFFFFF')">
            <td height="22" align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?=$certificacion->getElementsByTagName("cert_numero")->item(0)->nodeValue?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=$certificacion->getElementsByTagName("cert_tipo")->item(0)->nodeValue?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=$placa?></font></nobr></div></td>
            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?=utf8_decode($certificacion->getElementsByTagName("cert_propietario")->item(0)->nodeValue)?></font></nobr></div></td>
            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?=$certificacion->getElementsByTagName("cert_chasis")->item(0)->nodeValue?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=normals(substr($certificacion->getElementsByTagName("cert_fechaemi")->item(0)->nodeValue,0,10))?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<?=normals(substr($certificacion->getElementsByTagName("cert_vigencia")->item(0)->nodeValue,0,10))?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=$certificacion->getElementsByTagName("cert_sede")->item(0)->nodeValue?></font></nobr></div></td>
            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><?=$certificacion->getElementsByTagName("cert_observacion")->item(0)->nodeValue?></font></nobr></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
				<?php 
				$feci=$certificacion->getElementsByTagName("cert_vigencia")->item(0)->nodeValue;
				$fecf=date("Y-m-d",time());
				$fecha_inicio = new DateTime($feci);
				$fecha_fin    = new DateTime($fecf);
				?>
                <?php if ($fecha_fin < $fecha_inicio) { ?>
                <img src="img/habilitado.gif" width="35" height="16" title="Vigente">
                <?php } else { ?>
                <img src="img/inhabilitado.gif" width="35" height="16" title="Vencido">
                <?php } ?>
            </font></div></td>
          </tr>
          <?php } ?>
    </table>
    </form></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
      <TR bgcolor="#FFFFFF">
        <td width="194" height="20" nowrap bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
        <td width="352" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
          <?=$_pagi_info?>
        </font></strong></Td>
      </TR>
    </table></td>
  </tr>
</table>
</body>
</html>