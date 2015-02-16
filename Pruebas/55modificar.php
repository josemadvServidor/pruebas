

<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

if (!$_GET)
{
	
	
}else{
	
	if (isset($_GET['idProv']))
	{
	?>
	<form action="55modificar.php" method="get">
	<input type="hidden" name="idprov" value="<?php echo $_GET['idProv'];?>">
    Nuevo nombre: 
    <input type="text" name="nuevoNombre" value="">
    <input type="submit" name="cambiar" value="Cambiar"><br>
    </form>
	
	<?php 
	}
	
	if (isset($_GET['cambiar']))
	{
	$actualizar = "update tbl_provincias
                   set nombre = \"{$_GET['nuevoNombre']}\"
			       where cod = \"{$_GET['idprov']}\"";

	if (! mysql_query($actualizar,$conectar))
	{
	    echo "<p>No se ha podido actualizar nada</p>";
	    echo "<p>".mysql_error()."</p>";
		echo "<pre>$actualizar</pre>";
	
     }
	} 
}
mysql_close($conectar);
?>