<?php
//31. Realiza una web que lea un número y muestre su tabla de multiplicar.
//El formulario estará en el fichero “ejercicio_xx.html” y el procesado del formulario se hará en
//“ejercicio_xx.php”.
function tablamul($numero)
{
 for ($seguir = 0;$seguir <= 10; $seguir++){
 	echo $numero . " * " . $seguir . " = " . $numero * $seguir . "<br>";
 }	
	
	
	
}

$numero = $_REQUEST['numero'];

tablamul($numero);

?>