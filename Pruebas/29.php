<?php
//29. Crea la funci�n Max(array) que nos devolver� el valor m�ximo de un array. 
//Realiza una p�gina que pruebe dicha funci�n.

function MaxArray($array)
{
	$mayor = null;
	foreach ($array as $valor)
	{
		if ($mayor < $valor)
			{
				$mayor = $valor;
			}
		
	}
	return $mayor;
}

$array = array('qweqwwrqwrqwtdsg',2,3,4,5,true,8,false,'cadena',34);


echo MaxArray($array);
?>