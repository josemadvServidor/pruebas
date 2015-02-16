<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>

<?php
include 'ClaseHora.php';

$inicio = new Hora();

$inicio->Asigna(9, 0, 0);



?>
<table border ="1">
<tr><td>Hora</td><td>Tarea</td></tr>

<?php 
do{
	echo "<tr><td>";
	echo $inicio->devHora() . ":" . $inicio->devMinutos() . "-";
	$inicio->Asigna($inicio->devHora(), $inicio->devMinutos() + 45, $inicio->devSegundos());
	echo $inicio->devHora() . ":" . $inicio->devMinutos();
	echo "</td><td width=500px></td></tr>";

}while ($inicio->devHora() != 15);
?>


</table>

</body>
</html>