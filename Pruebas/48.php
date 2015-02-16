<?php
//48. Realiza una página en PHP que muestre las provincias que tiene cada comunidad autónoma, con el siguiente formato:
//CCAA1 : prov1, prov2, …
//CCAA2: …..

$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

$consulta = mysql_query("select * from tbl_comunidadesautonomas" , $conectar);
 
while ($fila = mysql_fetch_array($consulta))
{
    print $fila['nombre'] . ": ";
	$consulta2 = mysql_query("select nombre from tbl_provincias where {$fila["id"]}= comunidad_id", $conectar);
	
	while ($fila2 = mysql_fetch_array($consulta2))
	{
	   print $fila2['nombre'] . ", ";
	}
	 print "<br>";
}

mysql_close($conectar);
?>