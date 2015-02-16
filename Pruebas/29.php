<?php
//29. Crea la función Max(array) que nos devolverá el valor máximo de un array. 
//Realiza una página que pruebe dicha función.

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