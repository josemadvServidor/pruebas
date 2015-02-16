<?php
//39. Realiza el ejercicio anterior, pero en lugar de utilizar un cuadro de texto el número 
//lo mostraras en un párrafo.
?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php if (!$_POST){?>

<form action="39.php" method="post">
   <input type="hidden" name="numero" value=<?php echo $numero;?>>
    <input type="submit" name="sumar" value="+1"> 
    </form>
    
<?php
}else{

	?>
	<form action="39.php" method="post">
   <p><input type="hidden" name="numero" value=<?php 
    $sumauno = $_REQUEST['numero'];
    echo $sumauno + 1;
    ?>></p>
    <input type="submit" name="sumar" value="+1"> 	
	<?php 

}

?>
</form>
</body>
</html>