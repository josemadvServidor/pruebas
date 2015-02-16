<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

if (!$_GET)
{
	
}else{
	if (isset($_GET['idProv']))
	{
		?>
			<form action="55borrar.php" method="get"> 
			 <input type="hidden" name="prov" value="<?php echo $_GET['idProv'];?>">
			 

			 
			¿Desea borrar la provincia <?php echo $_GET['nombreProv']; ?>?.
	    
	     
	     <input type="submit" name="si" value="Si">
	     <input type="submit" name="no" value="No">
	      </form>
	      
	     <?php 
			 
	}
		
	if (isset($_GET['si']))
	{
			$borra = "delete from tbl_provincias where cod={$_GET['prov']}";
			if (!mysql_query($borra, $conectar))
			{
				echo "<p>No se ha podido borrar nada</p>";
				echo "<p>".mysql_error()."</p>";
				echo "<pre>$borra</pre>";
			}
				 
	}
		
	if (isset($_GET['no']))
	{
				include '55.php';
	}
	
}

mysql_close($conectar);
?>
