<?php
//47. Realiza una página en PHP que nos diga cuantas provincias tiene cada CCAA.
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

$consulta = mysql_query("select * from tbl_comunidadesautonomas", $conectar);


while($fila = mysql_fetch_array($consulta))
{
  	
  	$consulta2 = mysql_query("select count(*) as cont from tbl_provincias where comunidad_id = {$fila["id"]}", $conectar);
  	$filac = mysql_fetch_array($consulta2);
  	
  	
  	print $fila["id"] . " " . $fila["nombre"] . " tiene " . $filac["cont"] . " provincias<br>";
}

mysql_close($conectar);
?>