
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
///18. Crea la función EsPrimo(numero) que devuelva un booleano que 
///indique si el número pasado como parámetro es primo.
/// Utilizando dicha función mostrar en una página los números primos
/// menores de 100 que existen.

function EsPrimo($numero)
{
	// Busco divisores
	for($div = 2; $div < $numero; $div++)
	{
		if ($numero % $div == 0)
		{
			// Encontrado divisor
			return false;
				
		}
	}
	// No hay divisores
	
	
	return true;
	
}

for ($menorCien = 0;$menorCien < 100; $menorCien++)
{
	$boolPrimo = EsPrimo($menorCien);
	
	if ($boolPrimo == true)  
    { 
      	print $menorCien . "<br>";
    }
}

?>

</body>
</html>
