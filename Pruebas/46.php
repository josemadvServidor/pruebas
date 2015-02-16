<?php
//46. Realiza una página en PHP que muestre las provincias que hay en España leyendo los datos de la base de datos.
$conectar = mysql_connect('127.0.0.1', 'root','') or die("No se puede conectar");
mysql_select_db('bdprovincias') or die("No se puede conectar con la base de datos");

$consulta = mysql_query("select * from tbl_provincias", $conectar) or die ("Fallo en la consulta");
$n_filas = mysql_num_rows($consulta);

if ($n_filas > 0)
{
	for ($i = 0; $i < $n_filas; $i++)
	{
		$fila = mysql_fetch_array($consulta);
		print $fila["cod"] . " " . $fila["nombre"] . "<br>";
	}
}
mysql_close($conectar);
?>