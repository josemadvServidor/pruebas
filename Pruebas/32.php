<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<?php
//32. Realiza una web que lea el nombre y apellidos de una persona y los muestre en may�sculas.
// V�anse las funci�n strtoupper(). En la p�gina que muestra el resultado tendremos la opci�n de 
//volver a mostrar el formulario para pedir m�s datos (enlace).


echo strtoupper($nombreCompleto = $_REQUEST['nombre'] . " " . $_REQUEST['apellidos']);
?>
<br><br>
<a href="32.html">Volver</a>
</body>
</html>