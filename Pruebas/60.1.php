<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<table border="1">
<tr><td>CCAA</td><td>Provincias</td></tr>
<?php
//49. Realiza una página en PHP que muestre las provincias que tiene cada comunidad autónoma, en una tabla con el formato:

$mysqli = new mysqli('127.0.0.1', 'root', '', 'bdprovincias');

if ($mysqli->connect_error)
{
        
	die('Error de Conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$pvuelta = true;

$consulta = $mysqli->query("select * from tbl_comunidadesautonomas");

while ($fila = $consulta->fetch_array())
{
	
	
	$consulta2 = $mysqli->query("select nombre from tbl_provincias where {$fila["id"]}= comunidad_id");

	$n_prov = $consulta2->num_rows;
	
	print "<tr><td rowspan=\"$n_prov\">" . $fila['nombre'] . "</td> ";
	while ($fila2 = $consulta2->fetch_array())
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

$mysqli->close();

?>
</table>
</body>
</html>
