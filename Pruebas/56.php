<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>

<?php
//56. Muestra la lista de pa�ses existentes en la base de datos pa�ses, de tal forma que solo se muestren 20 pa�ses de una vez. 
//Crea en tu p�gina un sistema de paginaci�n que te permitir� avanzar o retroceder para mostrar los siguientes pa�ses.

$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

//$tama�oPag = 20;

//$pagina = $_GET['pagina'];

//if (!$pagina)
//{
//$inicio = 0;	
//$pagina = 1;
//}else{
	
//	$inicio = ($pagina - 1) * $tama�oPag;
//}





if (!$_GET){
$inicio = 0;

$muestra ="select * from paises Limit $inicio,20";

$recogePaises = mysql_query($muestra,$conectar);

$numPaises = mysql_num_rows($recogePaises);

$numPaginas = $numPaises / 20;
	
while ($muestraPaises = mysql_fetch_array($recogePaises))
{
	echo $muestraPaises['id'] . "  " . $muestraPaises['nombre'] . "<br>\n";
}

if ($inicio != 0){
?>
<p><a href="<?php echo "paginaAnterior.php?iniciop=$inicio"; ?>">Pagina anterior</a>

<?php }

if ($inicio < $numPaises ){?>
<a href="<?php echo "paginaSiguiente.php?iniciop=$inicio"; ?>">Pagina siguiente</a></p>

<?php 
}
} else{

   

   if ($inicio != 0){
	?>
    <p><a href="<?php echo "paginaAnterior.php?inicio=$inicio"; ?>">Pagina anterior</a>

     <?php }

if ($inicio < $numPaises ){?>
<a href="<?php echo "paginaSiguiente.php?inicio=$inicio"; ?>">Pagina siguiente</a></p>

<?php 



}
}

mysql_close($conectar);
?>

</body>
</html>