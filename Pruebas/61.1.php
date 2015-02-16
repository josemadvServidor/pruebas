<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'bdprovincias');



if (!$_POST)
{
	?>
	<form action="61.1.php" method="post">
	Provincia: 
	<select name="provincias">
	<?php 
	$recogeProvincias = $mysqli->query("select nombre from tbl_provincias");
	
	while ($creaselect=$recogeProvincias->fetch_array())
	{
		echo "<option value=\"{$creaselect['nombre']}\">{$creaselect['nombre']} \n";
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
		<form action="61.1.php" method="post"> 
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
		
		if (!($borra = $mysqli->prepare("delete from tbl_provincias where nombre=(?)")))
		{
			echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		
        if(!($borra->bind_param("s",$_REQUEST['prov'])))
        {
        	echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }
		
	if (!$borra->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
       }else{
		
		?>
		Se ha procedido a borrar la provincia <?php $_REQUEST['prov']?>.<br>
		<form action="61.1.php" method="post">
		<input type="submit" name="no" value="Borrar otra provincia">
		<input type="submit" name="ver" value="Ver todas las provincias">
		</form>
		<?php 
		}
	    
			 
	}
	
	if (isset($_POST['no']))
	{
			?>
		
	<form action="61.1.php" method="post">
	Provincia: 
	<select name="provincias">
	<?php 
	$recogeProvincias = $mysqli->query("select nombre from tbl_provincias");
	while ($creaselect=$recogeProvincias->fetch_array())
	 {
		echo "<option value=\"{$creaselect['nombre']}\">{$creaselect['nombre']} \n";
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

		$muestraProv = $mysqli->query("select nombre from tbl_provincias");
		while ($prov = $muestraProv->fetch_array())
		{
			print $prov['nombre'] . "\n <br>";
		}
		}
}




$mysqli->close();
?>
</body>
</html>
