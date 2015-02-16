<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<?php
function GetHTMLPregunta($pregunta /* array */)
{
	echo '<b>' . $pregunta ['texto pregunta'] . '</b><br>';
	if ($pregunta ['tipo'] == 'radio') {
		// Pregunta tipo radio
		foreach ( $pregunta ['respuestas'] as $respuesta ) {
			echo "<input type=\"radio\" name=\"{$pregunta['campo']}\" value=\"{$respuesta['valor']}\" id=\"{$respuesta['valor']}\">  ";
			echo "<label for=\"{$respuesta['valor']}\"> {$respuesta['etiqueta']} </label>";
		}
	} else {
		// pregunta tipo checkbox
		foreach ( $pregunta ['respuestas'] as $respuesta ) {
			echo "<input type=\"checkbox\" name=\"{$pregunta['campo']}[]\" value=\"{$respuesta['valor']}\" id=\"{$respuesta['valor']}\">  ";
			echo "<label for=\"{$respuesta['valor']}\"> {$respuesta['etiqueta']} </label>";
		}
		
	}
	
	echo '<br>';
}

$preguntaSexo = array (
		'texto pregunta' => 'Sexo:',
		'tipo' => 'radio',
		'campo' => 'sexo',
		'respuestas' => array (
				'H' => array (
						'etiqueta' => 'Hombre',
						'valor' => 'H' 
				),
				'M' => array (
						'etiqueta' => 'Mujer',
						'valor' => 'M' 
				) 
		) 
);

$preguntaTipoDeporte = array(
	'texto pregunta' => 'Tipo de deporte: ',
		'tipo' => 'radio',
		'campo' => 'tdeporte',
		'respuestas' => array (
	             'futbol' => array(
	                           'etiqueta' => 'Futbol',
	             		       'valor' => 'Futbol' 
                                ),
				'tenis' => array(
						'etiqueta' => 'Tenis',
						'valor' => 'Tenis'
				),
				'Ciclismo' => array(
						'etiqueta' => 'Ciclismo',
						'valor' => 'Ciclismo'
				),
				
				
                              )
		
		
		
);

$preguntaAficiones = array (
		'texto pregunta' => 'Aficiones: ',
		'tipo' => 'checkbox',
		'campo' => 'aficiones',
		'respuestas' => array (
				'Deporte' => array (
						'etiqueta' => 'Deporte',
						'valor' => 'Deporte' 
				),
				'Cine' => array (
						'etiqueta' => 'Cine',
						'valor' => 'Cine' 
				),
				'Teatro' => array (
						'etiqueta' => 'Teatro',
						'valor' => 'Teatro' 
				) 
		)
		 
);

$preguntaEstudios = array (
		'texto pregunta' => 'Estudios:',
		'tipo' => 'checkbox',
		'campo' => 'estudios',
		'respuestas' => array (
				'ESO' => array (
						'etiqueta' => 'ESO',
						'valor' => 'ESO' 
				),
				'GMedio' => array (
						'etiqueta' => 'C.F.G. Medio',
						'valor' => 'C.F.G. Medio' 
				),
				'GSuperior' => array (
						'etiqueta' => 'C.F.G. Superior',
						'valor' => 'C.F.G. Superior' 
				),
				'Grado' => array (
						'etiqueta' => 'Grado',
						'valor' => 'Grado' 
				) 
		)
		 
);

$preguntaVacaciones = array (
		'texto pregunta' => 'Lugar Vacaciones:',
		'tipo' => 'radio',
		'campo' => 'vacaciones',
		'respuestas' => array (
				'Mediterraneo' => array (
						'etiqueta' => 'Mediterráneo',
						'valor' => 'Mediterráneo' 
				),
				'Caribe' => array (
						'etiqueta' => 'Caribe',
						'valor' => 'Caribe' 
				),
				'EEUU' => array (
						'etiqueta' => 'EEUU',
						'valor' => 'EEUU' 
				),
				'Centro europa' => array (
						'etiqueta' => 'Centro Europa',
						'valor' => 'Centro Europa' 
				) 
		)
		 
);

$preguntaLugarVacaciones = array (
		'texto pregunta' => 'Parte',
		'tipo' => 'radio',
		'campo' => 'lugarvacaciones',
		'respuestas' => array (
				'Cataluña' => array (
						'etiqueta' => 'Cataluña',
						'valor' => 'Cataluña'
				),
				'Valencia' => array (
						'etiqueta' => 'Valencia',
						'valor' => 'Valencia'
				),
				'Andalucia' => array (
						'etiqueta' => 'Andalucia',
						'valor' => 'Andalucia'
				),
				'Tunez' => array (
						'etiqueta' => 'Tunez',
						'valor' => 'Tunez'
				)
		)
			
);
?>
</head>
<body>
	<form action="41.php" method="post">
<?php
if (! $_POST) {
	GetHTMLPregunta ( $preguntaSexo );
	echo '<br>';
	GetHTMLPregunta ( $preguntaAficiones );
	echo '<br>';
	GetHTMLPregunta ( $preguntaEstudios );
	echo '<br>';
	GetHTMLPregunta ( $preguntaVacaciones );
	echo '<br>';
	
	?>
<input type="submit" name="envio" value="Enviar">

<?php
} else {
	 if (isset($_POST['envio'])){

foreach ($_POST as $campo=>$valor)
{
	if (is_array($valor))
	{
		// El campo es un array. Su nombre era nombre[]
		foreach($valor as $v)
		{
			echo "\n<input type=\"hidden\" name=\"{$campo}[]\" value=\"$v\">";
		}
	}
	else
		echo "\n<input type=\"hidden\" name=\"$campo\" value=\"$valor\">";
}
	?>

<?php 
foreach ($_REQUEST['aficiones'] as $aficion)
{
	if ($aficion == 'Deporte')
	{
		echo '<br>';
		GetHTMLPregunta($preguntaTipoDeporte);
	}
}


foreach ($_REQUEST['estudios'] as $estudio)
{
	if ($estudio == 'ESO')
	{
		echo '<br>En que año se obtuvo la ESO:  <input type="text" name=\"añoeso\" value="">' ;
	}
}

if ($_REQUEST['vacaciones']=='Mediterráneo')
{
	echo '<br>';
	GetHTMLPregunta($preguntaLugarVacaciones);
	echo '<br>';
	
}?>
<input type="submit" name="segundoenvio" value="Enviar">
<br>
<?php } 
 if (isset($_POST['segundoenvio'])) {
	
	?><b>Sexo: </b> <?php echo $_REQUEST['sexo'] . '.<br>'?>
	<b>Aficiones: </b> <?php
		
		if (isset ( $_REQUEST ['aficiones'] [0] )) {
			echo $_REQUEST ['aficiones'] [0] . ', ';
		}
		if (isset ( $_REQUEST ['aficiones'] [1] )) {
			echo $_REQUEST ['aficiones'] [1] . ', ';
		}
		if (isset ( $_REQUEST ['aficiones'] [2] )) {
			echo $_REQUEST ['aficiones'] [2];
		}
		
	
		
	    echo '<br>';
		?>
	<b>Estudios: </b> <?php 
	if (isset ( $_REQUEST ['estudios'] [0] )) {
		echo $_REQUEST ['estudios'] [0] . ', ';
	}
	if (isset ( $_REQUEST ['estudios'] [1] )) {
		echo $_REQUEST ['estudios'] [1] . ', ';
	}
	if (isset ( $_REQUEST ['estudios'] [2] )) {
		echo $_REQUEST ['estudios'] [2] . ', ';
	}
	if (isset ( $_REQUEST ['estudios'] [3] )) {
		echo $_REQUEST ['estudios'] [3] . ', ' ;
	}
	
	
	
	?>
	<br>
	<b>Lugar de vacaciones: </b>
	<?php
	echo $_REQUEST['vacaciones'] . '<br>';
	
   if (isset($_POST['tdeporte']))
   {
   	echo "Tipo de deporte: {$_REQUEST['tdeporte']}";
   echo '<br>';	
   }
   
   if (isset($_REQUEST['añoeso']))
   {
    echo "Hizo la ESO en {$_REQUEST['añoeso']}";
   }
   
   if (isset($_REQUEST['lugarvacaciones']))
   {
   	echo "Lugar del mediterraneo: {$_REQUEST['lugarvacaciones']}";
   }
	?>
	
	
	<?php
	}	
}

  ?>

</form>
</body>
</html>