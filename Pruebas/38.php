<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php if (!$_POST){?>

<form action="38.php" method="post">
    <input type="text" name="numero" value="">
    <input type="submit" name="sumar" value="+1"> 
    </form>
    
<?php
}else{
//38. Realiza un formulario que contendr� un campo de texto en el que se almacenar� un n�mero y un
// bot�n [+1] . Al pulsar el bot�n [+1] se mostrar� de nuevo la p�gina y se  incrementar� en uno el 
//contenido del campo de texto. 

	?>
	<form action="38.php" method="post">
    <input type="text" name="numero" value=<?php 
    $numero = $_REQUEST['numero'];
    echo $numero + 1;
    ?>>
    <input type="submit" name="sumar" value="+1"> 	
	
	<?php 
	
	
	
	

}

?>
</form>
</body>
</html>