<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>

<?php
include 'ClaseHora.php';


if (!$_POST)
{
?>
<form action="59.php" method="post">
Hora Inicio:<br>
Hora: <input type="text" name="horaIni" value=""><br>
Minutos: <input type="text" name="minutoIni" value=""><br>
<br>
Hora Fin:<br>
Hora: <input type="text" name="horaFin" value=""><br>
Minutos: <input type="text" name="minutoFin" value=""><br>
<br>
Intervalos: <input type="text" name="intervalos" value=""><br>
<br>
<input type="submit" name="enviar" value="Enviar">
</form>


<?php 
}else{
$inicio = new Hora();

$inicio->Asigna($_REQUEST['horaIni'], $_REQUEST['minutoIni'], 0);



?>
<table border ="1">
<tr><td>Hora</td><td>Tarea</td></tr>

<?php 
do{
	echo "<tr><td>";
	echo $inicio->devHora() . ":" . $inicio->devMinutos() . "-";
	$inicio->Asigna($inicio->devHora(), $inicio->devMinutos() + $_REQUEST['intervalos'], $inicio->devSegundos());
	echo $inicio->devHora() . ":" . $inicio->devMinutos();
	echo "</td><td width=500px></td></tr>";

}while ($inicio->devHora() != $_REQUEST['horaFin'] || $inicio->devMinutos() != $_REQUEST['minutoFin']);
?>


</table>
<?php }?>
</body>
</html>
