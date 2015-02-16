<?php
session_start();
if (isset($_REQUEST['cerrar']))
{

	session_destroy();
	echo "Destruyo la sesion. Recargue la página para continuar.";
	exit;
	
}



if (isset($_SESSION["iniciada"])==false)
{
	// Sesión sin iniciar
	
	// ¿Me han enviado el formulario?
	if ($_POST)
	{
		echo "asigno valores a usuario y contraseña";
		$_SESSION["usuario"] = $_REQUEST['usuario'];
		$_SESSION["contrasenia"] = $_REQUEST['contrasenia'];
		// Sesion Iniciada
		$_SESSION["iniciada"]=TRUE;
		
		MuestroFormularioSeleccionComunidad();
	}
	else
	{
		MuestraFormularioInicioSesion();
	}
	echo "creo sesion y muestro formulario";
	exit;
	
}else{
	// ¿Me han enviado la comunidad?
	if (!isset($_POST['busca']))
	{	// No han enviado comunidad
		// Muestro formuarlio sekeccuib comunidad
		MuestroFormularioSeleccionComunidad();
	}
	else 
	{
		// Han enviado comunidad
		MuestraProvincias();
	}
		
}
	
	


function MuestraProvincias()
{   
    echo "Muestro provincias"; 
   
	
	$conectar = mysql_connect('127.0.0.1',$_SESSION["usuario"],$_SESSION["contrasenia"]);
	
	mysql_select_db('bdprovincias');
	
	$recogeP = mysql_query("select * from tbl_provincias where comunidad_id={$_REQUEST['ccaa']}",$conectar);
	
	while ($muestraProv = mysql_fetch_array($recogeP))
	{
		echo $muestraProv['nombre'] . "<br>\n";
	}
	?>
	      <a href="67.php">Volver</a>
	      <?php 
	
}

function MuestroFormularioSeleccionComunidad()
{
	echo "Muestro formulario de selccion de comunidad";
	$conectar = mysql_connect('127.0.0.1',$_SESSION["usuario"],$_SESSION["contrasenia"]);
	mysql_select_db('bdprovincias');
	
	$recogeCA = mysql_query("select * from tbl_comunidadesautonomas",$conectar);
	echo "<form action=\"67-3.php\" method=\"post\">Seleccione CCAA <select name=\"ccaa\">";
	while ($creaSelect = mysql_fetch_array($recogeCA))
	{
		?>
		<option value="<?=$creaSelect['id']?>"> <?=$creaSelect['nombre']?>
		        <?php 
		        }
		        ?>
		        <input type="submit" name="busca" value="Busca CCAA">
			</form> <a href="67-3.php?cerrar=1">Cerrar sesion</a>
<?php 	
}




function MuestraFormularioInicioSesion()
{
	?>
<form action="67-3.php" method="post">
		Usuario: <input type="text" name="usuario" value=""><br> Contraseña: <input
			type="text" name="contrasenia" value=""><br> 
			<input type="submit" name="enviar" value="Enviar">
	</form>	
	<?php 
}
