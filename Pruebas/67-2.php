<?php
session_start();


if (isset($_REQUEST['cerrar']))
{
	session_destroy();
}

if (!isset($_SESSION['dentro']))
{
	?><form action="67-2.php" method="post">
	Usuario: <input type="text" name="usuario" value=""><br>
	Contraseña: <input type="text" name="contraseña" value=""><br>
	<input type="submit" name="enviar" value="Enviar"></form>
<?php 
}



	if (isset($_POST['enviar']))
	{
		$_SESSION['dentro']=TRUE;
		$_SESSION["usuario"] = $_REQUEST['usuario'];
		$_SESSION["contraseña"] = $_REQUEST['contraseña'];
		
		$conectar = mysql_connect('127.0.0.1',$_SESSION["usuario"],$_SESSION["contraseña"]);
		var_dump($conectar);
        mysql_select_db('bdprovincias');

        $recogeCA = mysql_query("select * from tbl_comunidadesautonomas",$conectar);
	    echo "<form action=\"67.php\" method=\"post\">Seleccione CCAA <select name=\"ccaa\">";
	    var_dump($recogeCA);
        while ($creaSelect = mysql_fetch_array($recogeCA))
        {
        	?>
        <option value="<?=$creaSelect['id']?>"> <?=$creaSelect['nombre']?>
        <?php 
        }
        ?>
        <input type="hidden" name="usuario" value="<?=$_REQUEST['usuario']?>">
        <input type="hidden" name="contraseña" value="<?=$_REQUEST['contraseña']?>">
        <input type="submit" name="busca" value="Busca CCAA"></form>
        <a href="67.php?cerrar=1">Cerrar sesion</a>
	      <?php               
	
	}
		
    if (isset($_POST['busca'])){
        	
      $id = $_REQUEST['ccaa'];

      $conectar = mysql_connect('127.0.0.1',$_REQUEST['usuario'],$_REQUEST['contraseña']);
      
      mysql_select_db('bdprovincias');
      
      $recogeP = mysql_query("select * from tbl_provincias where comunidad_id={$_REQUEST['ccaa']}",$conectar);

      while ($muestraProv = mysql_fetch_array($recogeP))
      {
           echo $muestraProv['nombre'] . "<br>\n";
      }
      
     }
  
