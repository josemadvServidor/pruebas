
<html>
<head>
<meta charset="ISO-8859-1">
</head>
<body>
<?php
///18. Crea la funci�n EsPrimo(numero) que devuelva un booleano que 
///indique si el n�mero pasado como par�metro es primo.
/// Utilizando dicha funci�n mostrar en una p�gina los n�meros primos
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
