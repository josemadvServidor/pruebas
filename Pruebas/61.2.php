<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'bdprovincias');

if ($mysqli->connect_error)
{
        
	die('Error de Conexi�n (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//50. Realiza una p�gina que permita seleccionar la comunidad aut�noma en un formulario  y nos muestre
// las provincias que hay en la CCAA seleccionada.
if (!$_GET)
{
	?>
	<form action="61.2.php" method="GET">
	<select name="comunA">
	<?php 
	
	
	$consulta = $mysqli->query("select * from tbl_comunidadesautonomas");
	
	while ($fila = $consulta->fetch_array())
	{
		print ("<option value=\"{$fila['id']}\"> {$fila['nombre']} \n");
	}
	
	?>
	</select>
	<input type="submit" name="envio" value="Enviar">
	</form>
	<ul>
	<?php 
	
	
	$consulta = $mysqli->query("select * from tbl_comunidadesautonomas");
	
	while ($fila = $consulta->fetch_array())
	{
		print ("<li><a href=\"61.2.php?comunA={$fila['id']}\"> {$fila['nombre']} </a></li>\n");
	}
	
	?>
	</ul>
<?php 
	
}
else { 


if (!($consulta2=$mysqli->prepare("select * from tbl_provincias where comunidad_id ='?' ")))
{
	echo "Fall� la preparaci�n: (" . $mysqli->errno . ") " . $mysqli->error;
}

if(!($consulta2->bind_param("i", $idP)))
{
	echo "Fall� la vinculaci�n de par�metros: (" . $consulta2->errno . ") " . $consulta2->error;
}
$idP =$_REQUEST['comunA'];
if (!$consulta2->execute()) {
	echo "Fall� la ejecuci�n: (" . $consulta2->errno . ") " . $consulta2->error;
}




//$consulta2 = $mysqli->query("select * from tbl_provincias where comunidad_id ='{$_REQUEST['comunA']}' ");

	print "<b>" . $_REQUEST['comunA'] . ": </b>\n <br>";
	while ($provincias = $consulta2->fetch_array())
	{
		print $provincias['nombre'] . "<br>";
	}
                                               }

$mysqli->close();
?>

</body>
</html>
