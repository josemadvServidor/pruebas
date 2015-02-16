<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

if (!$_POST)
{
	?>
	<form action="54.php" method="post">
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
	

	<input type="submit" name="borrar" value="Borrar"><br>
	<input type="submit" name="ver" value="Ver todas las provincias">
	</form>
<?php 	
}else 
{
	if (isset($_POST['borrar']))
	{
	 ?>	
		<form action="54.php" method="post"> 
		 <input type="hidden" name="prov" value="<?php echo $_REQUEST['provincias'];?>">
		 
		 <?php 
		 var_dump($_REQUEST['provincias']);
		 ?>
		 
		¿Desea borrar la provincia <?php $_REQUEST['provincias'] ?>?.
    
     
     <input type="submit" name="si" value="Si">
     <input type="submit" name="no" value="No">
      </form>
     <?php 
		 
	}
	
	if (isset($_POST['si']))
	{
		var_dump($_REQUEST['prov']);
		$borra = "delete from tbl_provincias where nombre=\"{$_REQUEST['prov']}\"";
		if (!mysql_query($borra, $conectar))
		{
			echo "<p>No se ha podido borrar nada</p>";
			echo "<p>".mysql_error()."</p>";
			echo "<pre>$borra</pre>";
		}else{
		
		?>
		Se ha procedido a borrar la provincia <?php $_REQUEST['prov']?>.<br>
		<form action="54.php" method="post">
		<input type="submit" name="no" value="Borrar otra provincia">
		<input type="submit" name="ver" value="Ver todas las provincias">
		</form>
		<?php 
		}
	    
			 
	}
	
	if (isset($_POST['no']))
	{
			?>
		
	<form action="54.php" method="post">
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
	

	<input type="submit" name="borrar" value="Borrar"><br>
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