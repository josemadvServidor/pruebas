<html>
<head>
</head>
<body>
<?php
//30. Se desea almacenar informaci�n sobre coches, para cada coche se almacenar� la siguiente informaci�n:
//matr�cula
//color
//modelo
//marca
//Realiza un array que almacene informaci�n de 5 o m�s coches.
//Rea liza la funci�n MuestraCoches($lista) que mostrar� por pantalla informaci�n de los coches 
//en una tabla.
//A�ade dos coches adicionales al array, despu�s de mostrar, y vuelve a mostrar toda la lista.
//Nota: Se utilizar� un array para almacenar la informaci�n de cada coche. Los indices, 
//ser�n el nombre de los atributos que deseamos almacenar.
// Esto se puede hacer tambi�n utilizando objetos (clases).

$listaCoches = array(
	0 => ['matricula' => '6969GGW', 'color' => 'azul', 'modelo'=> 'modelo1', 'marca' => 'marca1'],
	1 => ['matricula' => '6869GGW', 'color' => 'verde', 'modelo'=> 'modelo2', 'marca' => 'marca2'],	
	2 => ['matricula' => '6769GGW', 'color' => 'negro', 'modelo'=> 'modelo3', 'marca' => 'marca3'],
    3 => ['matricula' => '6569GGW', 'color' => 'blanco', 'modelo'=> 'modelo4', 'marca' => 'marca4'],
    4 => ['matricula' => '6469GGW', 'color' => 'rojo', 'modelo'=> 'modelo5', 'marca' => 'marca5'],
);

function MuestraCoches($lista){
	echo "<table border='1'> <tr><td>Matricula</td><td>Color</td><td>Modelo</td><td>Marca</td></tr>";
	for ( $seguir = 0 ; $seguir < count($lista) ; $seguir++ ){
		
	echo "<tr> <td>" . $lista[$seguir]['matricula'] . "</td><td>" . $lista[$seguir]['color'] . "</td><td>" . $lista[$seguir]['modelo'] . "</td><td>" . $lista[$seguir]['marca'] . "</td></tr>";
	
	}
	echo "</table>";
}

MuestraCoches($listaCoches);

$listaCoches[5] = ['matricula' => '6968GGW', 'color' => 'otro1', 'modelo'=> 'modelo6', 'marca' => 'marca6'];

$listaCoches[6] = ['matricula' => '6975GGW', 'color' => 'otro2', 'modelo'=> 'modelo7', 'marca' => 'marca7'];

echo "<br>";
MuestraCoches($listaCoches);
?>

</body></html>