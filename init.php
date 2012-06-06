<?php 
if (!isset($_SESSION))session_start();
/*if ( !defined('RUTA_BASE') ){
	define("RUTA_BASE", "");	//Cuando se accede al controlador directamente (No mediante el front controller)
	define("RUTA_MVC","../");
}*/
//incluir modelo principal

//incluir controlador principal

//incluir vista principal
require_once('composite_view/vista.php');
require_once('composite_view/menu.php');
require_once('composite_view/pagina.php');
require_once('modelo.php');
require_once('controlador.php');

include('../config.php');
?>