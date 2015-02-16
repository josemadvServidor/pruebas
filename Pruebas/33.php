<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>



<?php
//33. Utilizando una sola URI / URL “ejercicio_xx.php” realiza el ejercicio anterior. 
//Véase el artículo “Autollamada de páginas”.

if (!$_POST)
{
	


?>
	<form action="33.php" method="post">
	Nombre : <input type="text" name="nombre">  <br>
    Apellidos : <input type="text" name="apellidos"> <br>
    <input type="submit" name="Enviar"> <br>
	</form>
	
	<?php 
} else {

echo "<br> Nombre completo: " . strtoupper($nombreCompleto = $_POST['nombre'] . " " . $_POST['apellidos']);
}

?>
</body>
</html>