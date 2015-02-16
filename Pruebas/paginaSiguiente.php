<?php
$conectar = mysql_connect('127.0.0.1','root','');

mysql_select_db('bdprovincias');

if (!$_GET){}else{
	
	if (isset($_GET['iniciop'])){

   $recogePaises = mysql_query("select * from paises",$conectar);

   $numPaises = mysql_num_rows($recogePaises);
   ?>
   <form method="get" action="paginaSiguiente.php">
   <?php 
   
   $anteriorInicio = $_GET['iniciop'];
	
	$inicio = $anteriorInicio + 20;
	
	$muestra ="select * from paises Limit $inicio,20";
	
	$recogePaises = mysql_query($muestra,$conectar);
	
	while ($muestraPaises = mysql_fetch_array($recogePaises))
	{
		echo $muestraPaises['id'] . "  " . $muestraPaises['nombre'] . "<br>\n";
	}
	
	if ($inicio != 0){
		?>
	<p><a href="<?php echo "paginaAnterior.php?iniciop=$inicio"; ?>">Pagina anterior</a>
	
	<?php }
	
	if ($inicio < $numPaises ){?>
	<a href="<?php echo "paginaSiguiente.php?iniciop=$inicio"; ?>">Pagina siguiente</a></p>
	
	<?php 
	}
	?></form><?php 
	}
}
mysql_close($conectar);
?>