<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<table border="1">
<tr><td>CCAA</td><td>Provincias</td></tr>
<?php
//49. Realiza una página en PHP que muestre las provincias que tiene cada comunidad autónoma, en una tabla con el formato:

require 'db.php';

$bd = Db::getInstance();

$pvuelta = true;

$t=$bd->Consulta("select * from tbl_comunidadesautonomas");

while ($fila=$bd->LeeRegistro($t))
{
	$n_prov=$bd->num_filas("tbl_provincias", "comunidad_id={$fila["id"]}");

   
	$rs=$bd->Consulta("select nombre from tbl_provincias where comunidad_id={$fila["id"]} ");
	
	print "<tr><td rowspan=\"$n_prov\">" . $fila['nombre'] . "</td> ";
	
	while ($fila2=$bd->LeeRegistro($rs))
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



?>
</table>
</body>
</html>
