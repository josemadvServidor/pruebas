<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');
//50. Realiza una página que permita seleccionar la comunidad autónoma en un formulario  y nos muestre
// las provincias que hay en la CCAA seleccionada.
if (!$_GET)
{
	?>
	<form action="50.php" method="GET">
	<select name="comunA">
	<?php 
	
	
	$consulta = mysql_query("select * from tbl_comunidadesautonomas" , $conectar);
	
	while ($fila = mysql_fetch_array($consulta))
	{
		print ("<option value=\"{$fila['id']}\"> {$fila['nombre']} \n");
	}
	
	?>
	</select>
	<input type="submit" name="envio" value="Enviar">
	</form>
	<ul>
	<?php 
	
	
	$consulta = mysql_query("select * from tbl_comunidadesautonomas" , $conectar);
	
	while ($fila = mysql_fetch_array($consulta))
	{
		print ("<li><a href=\"50.php?comunA={$fila['id']}\"> {$fila['nombre']} </a></li>\n");
	}
	
	?>
	</ul>
<?php 
	
}
else { 

$consulta2 = mysql_query("select * from tbl_provincias where comunidad_id ='{$_REQUEST['comunA']}' ", $conectar);

	print "<b>" . $_REQUEST['comunA'] . ": </b>\n <br>";
	while ($provincias = mysql_fetch_row($consulta2))
	{
		print $provincias[1] . "<br>";
	}
                                               }

mysql_close($conectar);
?>

</body>
</html>