<?php
//31. Realiza una web que lea un n�mero y muestre su tabla de multiplicar.
//El formulario estar� en el fichero �ejercicio_xx.html� y el procesado del formulario se har� en
//�ejercicio_xx.php�.
function tablamul($numero)
{
 for ($seguir = 0;$seguir <= 10; $seguir++){
 	echo $numero . " * " . $seguir . " = " . $numero * $seguir . "<br>";
 }	
	
	
	
}

$numero = $_REQUEST['numero'];

tablamul($numero);

?>