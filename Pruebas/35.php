<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<?php
//35. Realizar una página que lea un formulario en el que se lean los siguientes campos:
//Nombre:
//Apellidos:
//Sexo: H o M (checkbox)
//Curso: 1º SMR, 2º SMR, 1º ASIR, 2º ASIR, 1º DAW, 2º DAW (select/combobox). Por defecto aparecerá en blanco
//Fecha de nacimiento

function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}

function muestraErrores()
{
	global $errores;
	
	if (isset($errores['nombre'])){
		
		echo '<font color="red">' . $errores['nombre'] . '</font><br>';
	}
	
	if (isset($errores['apellidos'])){
	
		echo '<font color="red">' . $errores['apellidos'] . '</font><br>';
	}
	
	if (isset($errores['sexo'])){
	
		echo '<font color="red">' . $errores['sexo'] . '</font><br>';
	}
	
	if (isset($errores['curso'])){
	
		echo '<font color="red">' . $errores['curso'] . '</font><br>';
	}
	
	if (isset($errores['fechanac'])){
	
		echo '<font color="red">' . $errores['fechanac'] . '</font><br>';
	}

}

$errores = array();
$hayErrores = false;
if (!$_POST)
{ ?>
	<form action="35.php" method="post">
	Nombre: <input type="text" name="nombre"> <br>
	Apellidos: <input type="text" name="apellidos"> <br>
	Sexo: H <input type="radio" name="sexo" value="H"> 
	      M <input type="radio" name="sexo" value="M"> <br>
	Curso: <select name="curso">
	       <option value="">
           <option value="1º SMR">1º SMR
           <option value="2º SMR">2º SMR
           <option value="1º ASIR">1º ASIR
           <option value="2º ASIR">2º ASIR
           <option value="1º DAW">1º DAW
           <option value="2º DAW">2º DAW
	</select>  <br>
	Fecha de nacimiento: <input type="text" name="dia"> <input type="text" name="mes"> <input type="text" name="año"><br>
	Comentario: <br>
	<textarea rows="5" cols="40" name="comentario"></textarea><br>
	<input type="submit" name="Guardar"> 
	</form> 
	<?php 
} else {
	
$nombre=$_REQUEST['nombre'];

if ($nombre == '')
{
	$errores['nombre'] = "El campo del nombre no puede estar vacio";
	$hayErrores = true;
}

$apellidos=$_REQUEST['apellidos'];

if ($apellidos == '')
{
	$errores['apellidos'] = "El campo apellidos no puede estar vacio";
	$hayErrores = true;
}


if (isset($_REQUEST['sexo']) == false)
{
	$errores['sexo'] = "Se debe seleccionar un sexo";
	$hayErrores = true;
} else {
	
$sexo = $_REQUEST['sexo'];

}



$curso=$_REQUEST['curso'];

if ($curso == '')
{
	$errores['curso'] = "Se debe seleccionar un curso";
	$hayErrores = true;
}

$dia=$_REQUEST['dia'];
$mes=$_REQUEST['mes'];
$año=$_REQUEST['año'];



if ( $mes == '' || $dia == '' || $año == '' || checkdate($mes, $dia, $año) == false)
{
	$errores['fechanac'] = 'La fecha de nacimiento no es valida';
	$hayErrores = true;
}

$comentario = $_REQUEST['comentario'];

if ($hayErrores == false)
{
	$edad = date("Y",time()) - $año;
	if ($mes > date("m",time()))
	{
		$edad++;
	}
	
	if ($mes == date("m",time()) && $dia >= date("j",time()))
	{
		$edad++;
	}
	
echo ' Resultados: <br> Nombre: ' . $nombre . 
		'<br>Apellidos: ' . $apellidos . 
		'<br>Sexo:' . $sexo . 
		'<br>' . 'Curso: ' . $curso . 
		'<br>' . 'Fecha de Nacimiento: ' . $dia . '/' . $mes  . '/' . $año . 
		'<br> Edad: ' . $edad . 
		'<br> Comentario: '.
		'<br>' . nl2br($_REQUEST['comentario'])
         /*str_replace('\n', '<br/>', $comentario)*/ ;


}else {
?>
     
    <form action="35.php" method="post">
Nombre: <input type="text" name="nombre" value=<?php echo $nombre?>> <br>

Apellidos: <input type="text" name="apellidos" value=<?php echo $apellidos?>> <br>

Sexo: H <input type="radio" name="sexo" value="H" >
      M <input type="radio" name="sexo" value="M" > <br>
      
Curso: <select name="curso" >
<option value="">
<option value="1º SMR" <?php if ($curso == '1º SMR'){ echo selected; }?>>1º SMR
<option value="2º SMR" <?php if ($curso == '2º SMR'){  echo selected; }?>>2º SMR
<option value="1º ASIR" <?php if ($curso == '1º ASIR'){ echo selected; }?>>1º ASIR
<option value="2º ASIR" <?php if ($curso == '2º SMR'){ echo selected; }?>>2º ASIR
<option value="1º DAW"  <?php if ($curso == '1º DAW'){ echo selected; }?>>1º DAW
<option value="2º DAW"  <?php if ($curso == '2º SMR'){ echo selected; }?>>2º DAW
</select>  <br>

Fecha de nacimiento: <input type="text" name="dia" value=<?php echo $dia?>>
 <input type="text" name="mes" value=<?php echo $mes?>> 
 <input type="text" name="año" value=<?php echo $año?>><br>
 
 Comentario: <br>
	<textarea rows="5" cols="40" name="comentario">
	<?php echo nl2br($_REQUEST['comentario']); ?>
	</textarea>
	<br>
	
<input type="submit" value="Guardar"><br>
</form>
  <?php  
    
muestraErrores();

      }
}
?> 
</body>
</html>