<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

function validaNombre($nombrePr)
{
	global $conectar;
	
	mysql_select_db('bdprovincias');
	
	$consultaNombres = mysql_query("select * from tbl_provincias",$conectar);
	
	
	
    while ($compNombre = mysql_fetch_row($consultaNombres)){

    	if ($compNombre[1] == $nombrePr)
    	{
    		return true;
    	}
    	
    }
    return false;
}

if (!$_POST){
	
 echo "<form action=\"51.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"\"> ";
 echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
 echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
 
}else{
	
	if (isset($_POST['enviar']))
	{
		
		//echo "A entrado en el enviar <br>";
		
		if ($_REQUEST['nombrep'] != "" && validaNombre($_REQUEST['nombrep'])==false && preg_match("/^[a-z]+$/i", $_REQUEST['nombrep'])) {
			//echo "El nombre es valido <br>";
			
		$ConNumProv = mysql_query("select * from tbl_provincias" ,$conectar);
		
		$numProv = mysql_num_rows($ConNumProv);
		
		$numProv++;
		
		$sql = "INSERT INTO tbl_provincias VALUES ($numProv, '{$_REQUEST['nombrep']}',20)";
		
		if (! mysql_query($sql,$conectar))
		{
			echo "<p>No se ha insertado nada</p>";
			echo "<p>".mysql_error()."</p>";
			echo "<pre>$sql</pre>";
		}		
		
		
		echo "<form action=\"51.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"\"> ";
		echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
		echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
		
		} else {
			
			 echo "Nombre no valido";
			 echo "<form action=\"51.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"{$_REQUEST['nombrep']}\"> ";
             echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
             echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
		
		}
		

	
	}
	
	if (isset($_POST['ver']))
	{
		$muestraProv = mysql_query("select nombre from tbl_provincias where comunidad_id = 20",$conectar);
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