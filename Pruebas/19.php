<?php
// 19. Crea la funci�n DiasMes(num_mes) que devolver� un entero que ser�
// el n�mero de d�as que tiene un mes. Utilizando dicha
// funci�n realizar un programa que imprima las fechas existentes entre
// el 1 de enero de 1999 y el 31 de diciembre de 2012.
// Las fechas se mostrar�n separadas por una coma y cada mes aparecer�
// en una l�nea diferentes.
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
function Bisiesto($a�o) {
	if (($a�o % 4 == 0) && ($a�o % 100 != 0)) {
		return true;
	}
	if ($a�o % 400 == 0) {
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
$a�o = 1999;

echo "<p>Comenzamos</p>";
do {
    $dia++;
	$fecha = "$dia/$mes/$a�o";
	$vuelta1 = false;
	print "$fecha ";
	
	if (($mes == 2) && (Bisiesto($a�o) == true) && ($dia == 28))
	{
		$fechaBisiesto = "29/$mes/$a�o ";
		print "$fechaBisiesto";
			
	}
		if (($mes == 12) && ($dia == 31)) {
		$dia = 0;
		$mes = 1;
		$a�o ++;
		echo "<p>Nuevo a�o</p>";
	}
	if ($dia == DiaMes ( $mes )) {
		echo "<p>Nuevo mes</p>";
		$dia = 0;
		
		
		
		
		echo "<br>";
		$mes ++;
		
		
	}
	

	
} while ( $a�o < 2013 );

?>



</body>
</html>
