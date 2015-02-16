<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<form action="40.php" method="post">
<?php
//La página tendrá los siguientes botones que permitirán realizar la suma, resta, multiplicación o
// división de los números introducidos en los campos operador 1  y operador 2. Una vez realizada 
//la operación seguirán mostrando el valor del campo en los campos operadores y mostrarán el 
//resultado en el campo “Resultado”. Los campos Operación y Resultado serán de solo lectura
if (!$_POST){
?>
Operador 1: 
<input type="text" name="op1" value=""><br>
Operador 2:
<input type="text" name="op2" value=""><br>
Operación: 
<input type="text" name="operacion" value="" readonly><br>
Resultado:
<input type="text" name="resultado" value="" readonly><br>
Seleccione una operación: <br>
<input type="submit" name="suma" value="+  Suma">
<input type="submit" name="resta" value="-  Resta">
<input type="submit" name="multiplica" value="*  Multiplicar">
<input type="submit" name="divide" value="/  Dividir">
</form>
<?php
} else {
$op1 = $_REQUEST['op1'];
$op2 = $_REQUEST['op2'];

// Si sumamos
 if (isset($_POST['suma'])){
   $operacion = $op1 + $op2;
 	?>
 <form action="40.php" method="post">	
 	Operador 1: 
<input type="text" name="op1" value=<?php echo $op1;?>><br>
Operador 2:
<input type="text" name="op2" value=<?php echo $op2; ?>><br>
Operación: 
<input type="text" name="operacion" value="+" readonly><br>
Resultado:
<input type="text" name="resultado" value=<?php echo $operacion; ?> readonly><br>
Seleccione una operación: <br>
<input type="submit" name="suma" value="+  Suma">
<input type="submit" name="resta" value="-  Resta">
<input type="submit" name="multiplica" value="*  Multiplicar">
<input type="submit" name="divide" value="/  Dividir">
</form>
 	<?php 
 }
	
  if (isset($_POST['resta'])){
   $operacion = $op1 - $op2;
 	?>
 <form action="40.php" method="post">	
 	Operador 1: 
<input type="text" name="op1" value=<?php echo $op1;?>><br>
Operador 2:
<input type="text" name="op2" value=<?php echo $op2; ?>><br>
Operación: 
<input type="text" name="operacion" value="-" readonly><br>
Resultado:
<input type="text" name="resultado" value=<?php echo $operacion; ?> readonly><br>
Seleccione una operación: <br>
<input type="submit" name="suma" value="+  Suma">
<input type="submit" name="resta" value="-  Resta">
<input type="submit" name="multiplica" value="*  Multiplicar">
<input type="submit" name="divide" value="/  Dividir">
</form>
 	<?php 
 }

 
   if (isset($_POST['multiplica'])){
   $operacion = $op1 * $op2;
 	?>
 <form action="40.php" method="post">	
 	Operador 1: 
<input type="text" name="op1" value=<?php echo $op1;?>><br>
Operador 2:
<input type="text" name="op2" value=<?php echo $op2; ?>><br>
Operación: 
<input type="text" name="operacion" value="*" readonly><br>
Resultado:
<input type="text" name="resultado" value=<?php echo $operacion; ?> readonly><br>
Seleccione una operación: <br>
<input type="submit" name="suma" value="+  Suma">
<input type="submit" name="resta" value="-  Resta">
<input type="submit" name="multiplica" value="*  Multiplicar">
<input type="submit" name="divide" value="/  Dividir">
</form>
 	<?php 
 }


  if (isset($_POST['divide'])){
   $operacion = $op1 / $op2;
 	?>
 <form action="40.php" method="post">	
 	Operador 1: 
<input type="text" name="op1" value=<?php echo $op1;?>><br>
Operador 2:
<input type="text" name="op2" value=<?php echo $op2; ?>><br>
Operación: 
<input type="text" name="operacion" value="/" readonly><br>
Resultado:
<input type="text" name="resultado" value=<?php echo $operacion; ?> readonly><br>
Seleccione una operación: <br>
<input type="submit" name="suma" value="+  Suma">
<input type="submit" name="resta" value="-  Resta">
<input type="submit" name="multiplica" value="*  Multiplicar">
<input type="submit" name="divide" value="/  Dividir">
</form>
 	<?php 
 }
?>	

<?php 
}


?>



</body>
</html>