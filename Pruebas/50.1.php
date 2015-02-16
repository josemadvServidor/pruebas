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
if (!$_POST)
{
	?>
	<form action="50.php" method="post">
	<select name="comunA">
	<?php 
	
	
	$consulta = mysql_query("select * from tbl_comunidadesautonomas" , $conectar);
	
	while ($fila = mysql_fetch_array($consulta))
	{
		print ("<option value=\"{$fila['nombre']}\"> {$fila['nombre']} \n");
	}
	
	?>
	</select>
	<input type="submit" name="envio" value="Enviar">
	</form>
	<?php 
	
}
else { 

$consultaid = mysql_query("select id from tbl_comunidadesautonomas where nombre='{$_REQUEST['comunA']}'" ,$conectar);

while ($buscaid = mysql_fetch_row($consultaid)){

$consulta2 = mysql_query("select * from tbl_provincias where comunidad_id ='{$buscaid[0]}' ", $conectar);

print "<b>" . $_REQUEST['comunA'] . ": </b>\n <br>";
	while ($provincias = mysql_fetch_row($consulta2))
	{
		print $provincias[1] . "<br>";
	}
                                               }

}
mysql_close($conectar);
?>

</body>
</html>