<?php
//Utilizando arrays crea la funci�n DiasMes(num_mes) que devolver� un entero que ser� el n�mero de d�as
// que tiene un mes. Utilizando dicha funci�n realiza un programa que imprima el n�mero de d�as que
// tienes los distintos meses. El nombre del mes se almacenar� en una array igualmente.

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

$nombresMes = array(
0 => 'Enero',
1 => 'Febrero',
2 => 'Marzo',
3 => 'Abril',
4 => 'Mayo',
5 => 'Junio',
6 => 'Julio',
7 => 'Agosto',
8 => 'Septiembre',
9 => 'Octubre',
10 => 'Noviembre',
11 => 'Diciembre'	
		
);

for ($sigue = 0; $sigue < 12; $sigue++)
{
	echo $nombresMes[$sigue] . " " . DiaMes($sigue + 1) . "<br>";
	
}
?>