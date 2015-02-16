<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>

<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');


if (!$_GET){
	
	?>
	
	Listado de Provincias:<br>
	<?php 
	$recogeProv = mysql_query("select * from tbl_provincias",$conectar);
	while ($montaLista = mysql_fetch_array($recogeProv))
	{
		
		echo "<p>" . $montaLista['nombre'] . "  <a href=\"55modificar.php?idProv={$montaLista['cod']}&orden=modificar\">Modificar</a> 
		      <a href=\"55borrar.php?idProv={$montaLista['cod']}&orden=borrar&nombreProv={$montaLista['nombre']}\">Borrar</a></p> \n<br>" ;
		//<a href=\"50.php?comunA={$fila['id']}\"> {$fila['nombre']} </a>
	}
	
	?>
	
	

	<?php 

}






mysql_close($conectar);
?>

</body>
</html>