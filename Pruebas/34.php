<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<?php
//34. Realiza una web que lea un n�mero y muestre su tabla de multiplicar. La aplicaci�n debe cumplir los siguientes requisitos:
//El formulario se mostrar� y procesar� en una �nica URL
// (un solo fichero, o varios con include/require). 
//Si el valor  introducido no es un n�mero, o si no est� en el rango 1..10 
//mostraremos un mensaje de error notificando dicha incidencia y dando la opci�n de 
//introducir de nuevo el valor.
//Se mostrar�n en los campos el valor err�neo para que el usuario pueda ver el valor introducido.

if (!$_POST){
?>
<form action="34.php" method="post">
Introduzca numero: <input type="text" name="numero"><input type="submit" name="Enviar">

</form>
<?php 
} else {
	
$numero = $_REQUEST['numero'];

if (($numero > 1) && ($numero <= 10))
{
for($seguir = 0; $seguir <= 10; $seguir++){
echo $numero . " * " . $seguir . " = " . $numero * $seguir . "<br>";	

} 
} else {
	?>
<form action="34.php" method="post">
<?php echo "Valor no valido <br>"?>
Introduzca numero: <input type="text" name="numero" <?php echo "value=$numero"?> >  
<input type="submit" name="Enviar">

</form>
<?php 
}
 }






?>
</body>
</html>