<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<?php
//35. Realizar una p�gina que lea un formulario en el que se lean los siguientes campos:
//Nombre:
//Apellidos:
//Sexo: H o M (checkbox)
//Curso: 1� SMR, 2� SMR, 1� ASIR, 2� ASIR, 1� DAW, 2� DAW (select/combobox). Por defecto aparecer� en blanco
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
           <option value="1� SMR">1� SMR
           <option value="2� SMR">2� SMR
           <option value="1� ASIR">1� ASIR
           <option value="2� ASIR">2� ASIR
           <option value="1� DAW">1� DAW
           <option value="2� DAW">2� DAW
	</select>  <br>
	Fecha de nacimiento: <input type="text" name="dia"> <input type="text" name="mes"> <input type="text" name="a�o"><br>
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
$a�o=$_REQUEST['a�o'];



if ( $mes == '' || $dia == '' || $a�o == '' || checkdate($mes, $dia, $a�o) == false)
{
	$errores['fechanac'] = 'La fecha de nacimiento no es valida';
	$hayErrores = true;
}

$comentario = $_REQUEST['comentario'];

if ($hayErrores == false)
{
	$edad = date("Y",time()) - $a�o;
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
		'<br>' . 'Fecha de Nacimiento: ' . $dia . '/' . $mes  . '/' . $a�o . 
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
<option value="1� SMR" <?php if ($curso == '1� SMR'){ echo selected; }?>>1� SMR
<option value="2� SMR" <?php if ($curso == '2� SMR'){  echo selected; }?>>2� SMR
<option value="1� ASIR" <?php if ($curso == '1� ASIR'){ echo selected; }?>>1� ASIR
<option value="2� ASIR" <?php if ($curso == '2� SMR'){ echo selected; }?>>2� ASIR
<option value="1� DAW"  <?php if ($curso == '1� DAW'){ echo selected; }?>>1� DAW
<option value="2� DAW"  <?php if ($curso == '2� SMR'){ echo selected; }?>>2� DAW
</select>  <br>

Fecha de nacimiento: <input type="text" name="dia" value=<?php echo $dia?>>
 <input type="text" name="mes" value=<?php echo $mes?>> 
 <input type="text" name="a�o" value=<?php echo $a�o?>><br>
 
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