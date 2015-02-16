<?php
//26. Crea la función FechaActual(dia, mes, anyo) que mostrará la fecha actual en el formato
// “dia _semana (lunes...), num_dia de nombre_mes de num_anyo”. Prueba la función.
//Utiliza el fichero “funciones_fecha.php” creado anteriormente.
include 'funcionesfecha.php';

function FechaActual($dia,$mes,$año)
{
 echo NombreDia($dia) . " " . $dia . " de " . NombreMes($mes) . " de " . $año;
	
}

FechaActual(date("w",time()), date("n",time()), date("Y",time()));
?>