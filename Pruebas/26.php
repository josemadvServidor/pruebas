<?php
//26. Crea la funci�n FechaActual(dia, mes, anyo) que mostrar� la fecha actual en el formato
// �dia _semana (lunes...), num_dia de nombre_mes de num_anyo�. Prueba la funci�n.
//Utiliza el fichero �funciones_fecha.php� creado anteriormente.
include 'funcionesfecha.php';

function FechaActual($dia,$mes,$a�o)
{
 echo NombreDia($dia) . " " . $dia . " de " . NombreMes($mes) . " de " . $a�o;
	
}

FechaActual(date("w",time()), date("n",time()), date("Y",time()));
?>