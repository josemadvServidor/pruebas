<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<table border="1">
<tr><td>CCAA</td><td>Provincias</td></tr>
<?php
//49. Realiza una página en PHP que muestre las provincias que tiene cada comunidad autónoma, en una tabla con el formato:

$conectar = mysql_connect('127.0.0.1','root','');

$pvuelta = true;

mysql_select_db('bdprovincias');

$consulta = mysql_query("select * from tbl_comunidadesautonomas" , $conectar);

while ($fila = mysql_fetch_array($consulta))
{
	
	
	$consulta2 = mysql_query("select nombre from tbl_provincias where {$fila["id"]}= comunidad_id", $conectar);

	$n_prov = mysql_num_rows($consulta2);
	
	print "<tr><td rowspan=\"$n_prov\">" . $fila['nombre'] . "</td> ";
	while ($fila2 = mysql_fetch_array($consulta2))
	{
		if ($pvuelta == false)
		{
		print "<tr><td>" . $fila2['nombre'] . "</td></tr>";
		}
		if ($pvuelta == true)
		{
			print "<td>" . $fila2['nombre'] . "</td></tr>";
			$pvuelta == false;
		}
	}
	$pvuelta == true;
}

mysql_close($conectar);

?>
</table>
</body>
</html>