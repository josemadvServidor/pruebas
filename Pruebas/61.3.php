<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'bdprovincias');

function validaNombre($nombrePr)
{
	global $mysqli;
	

	
	$consultaNombres = $mysqli->query("select * from tbl_provincias");
	
	
	
    while ($compNombre = $consultaNombres->fetch_array()){

    	if ($compNombre['nombre'] == $nombrePr)
    	{
    		return true;
    	}
    	
    }
    return false;
}

if (!$_POST){
	
 echo "<form action=\"61.3.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"\"> ";
 echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
 echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
 
}else{
	
	if (isset($_POST['enviar']))
	{
		
		//echo "A entrado en el enviar <br>";
		
		if ($_REQUEST['nombrep'] != "" && validaNombre($_REQUEST['nombrep'])==false && preg_match("/^[a-z]+$/i", $_REQUEST['nombrep'])) {
			//echo "El nombre es valido <br>";
			
		$ConNumProv = $mysqli->query("select * from tbl_provincias");
		
		$numProv = $ConNumProv->num_rows;
		
		$numProv++;
		
		$insertar = $mysqli->prepare("INSERT INTO tbl_provincias VALUES (?,?,20)");
		
		$n = $_REQUEST['nombrep'];
		
		$insertar->bind_param($numProv, $n);
		
        
		
		if (! $insertar->execute())
		{
			echo "<p>No se ha insertado nada</p>";
			echo "<p>".mysql_error()."</p>";
		}		
		
		
		echo "<form action=\"61.3.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"\"> ";
		echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
		echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
		
		} else {
			
			 echo "Nombre no valido";
			 echo "<form action=\"61.3.php\" method=\"post\"> Provincia: <input type=\"text\" name=\"nombrep\" value=\"{$_REQUEST['nombrep']}\"> ";
             echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
             echo "<input type=\"submit\" name=\"ver\" value=\"Ver provincias\"></form>";
		
		}
		

	
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
