<?php
// 19. Crea la función DiasMes(num_mes) que devolverá un entero que será
// el número de días que tiene un mes. Utilizando dicha
// función realizar un programa que imprima las fechas existentes entre
// el 1 de enero de 1999 y el 31 de diciembre de 2012.
// Las fechas se mostrarán separadas por una coma y cada mes aparecerá
// en una línea diferentes.
function DiaMes($num_mes) {
	if (($num_mes == 1) || ($num_mes == 3) || ($num_mes == 5) || ($num_mes == 7) || ($num_mes == 8) || ($num_mes == 10) || ($num_mes == 12)) {
		
		return 31;
	}
	
	if (($num_mes == 4) || ($num_mes == 6) || ($num_mes == 9) || ($num_mes == 11)) {
		
		return 30;
	}
	
	if ($num_mes == 2) {
		
		return 28;
	}
}
function Bisiesto($año) {
	if (($año % 4 == 0) && ($año % 100 != 0)) {
		return true;
	}
	if ($año % 400 == 0) {
		return true;
	}
	
	return false;
}

?>
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php

$dia = 0;
$mes = 1;
$año = 1999;

echo "<p>Comenzamos</p>";
do {
    $dia++;
	$fecha = "$dia/$mes/$año";
	$vuelta1 = false;
	print "$fecha ";
	
	if (($mes == 2) && (Bisiesto($año) == true) && ($dia == 28))
	{
		$fechaBisiesto = "29/$mes/$año ";
		print "$fechaBisiesto";
			
	}
		if (($mes == 12) && ($dia == 31)) {
		$dia = 0;
		$mes = 1;
		$año ++;
		echo "<p>Nuevo año</p>";
	}
	if ($dia == DiaMes ( $mes )) {
		echo "<p>Nuevo mes</p>";
		$dia = 0;
		
		
		
		
		echo "<br>";
		$mes ++;
		
		
	}
	

	
} while ( $año < 2013 );

?>



</body>
</html>
