<?php
function Conectarse()
{
   if (!($link=mysqli_connect("127.0.0.1","ert1f1ca_userws","sh18197700ws")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysqli_select_db($link,"ert1f1ca_webservice"))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}
//$link=Conectarse();
//mysql_close($link); //cierra la conexion
?>