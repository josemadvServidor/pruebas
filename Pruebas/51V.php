<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

if (!$_POST)
{?>
<form action="51V.php" method="post">
Provincia: 
<select name="provincias">
<?php 
$recogeProvincias = mysql_query("select nombre from tbl_provincias",$conectar);
while ($creaselect=mysql_fetch_row($recogeProvincias))
{
	echo "<option value=\"{$creaselect[0]}\">{$creaselect[0]} \n";
}
?>
</select>

Nuevo nombre: 
<input type="text" name="nuevoNombre" value="">
<input type="submit" name="cambiar" value="Cambiar"><br>
<input type="submit" name="ver" value="Ver todas las provincias">
</form>
<?php 
}else{
	if (isset($_POST['cambiar']))
	{
		//$actualizar = mysql_query("update tbl_provincias 
                          //        set nombre = {$_REQUEST['nuevoNombre']} 
                         //         where nombre = {$_REQUEST['provincias']}",$conectar);
        
$actualizar = "update tbl_provincias 
        set nombre = \"{$_REQUEST['nuevoNombre']}\" 
        where nombre = \"{$_REQUEST['provincias']}\"";
echo "<pre>$actualizar</pre>";
if (! mysql_query($actualizar,$conectar))
{
	echo "<p>No se ha podido actualizar nada</p>";
	echo "<p>".mysql_error()."</p>";
	echo "<pre>$sql</pre>";
}

        
		?>
		<form action="51V.php" method="post">
      Provincia: 
      <select name="provincias">
      <?php 
      $recogeProvincias = mysql_query("select nombre from tbl_provincias",$conectar);
      
      while ($creaselect=mysql_fetch_row($recogeProvincias))
      {
	    echo "<option value=\"{$creaselect[0]}\">{$creaselect[0]} \n";
      }
      ?>
      </select>

      Nuevo nombre: 
      <input type="text" name="nuevoNombre" value="">
      <input type="submit" name="cambiar" value="Cambiar"><br>
      <input type="submit" name="ver" value="Ver todas las provincias">
     </form> 
	
		<?php 
	}
	if (isset($_POST['ver']))
	{
		
		$muestraProv = mysql_query("select nombre from tbl_provincias",$conectar);
		while ($prov = mysql_fetch_row($muestraProv))
		{
			print $prov[0] . "\n <br>";
		}
	}


}
mysql_close($conectar);
?>
</body>
</html>