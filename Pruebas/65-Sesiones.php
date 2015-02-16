<?php
session_start();
if (!isset($_SESSION["visitas"]))
{
	$_SESSION["visitas"] = 0;
	
}else{
	
	$_SESSION["visitas"]++;
}

echo "Se ha iniciado la pagina " . $_SESSION["visitas"] . 
         " veces en este ordenador y con este navegador";