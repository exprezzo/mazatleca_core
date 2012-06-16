<?php

class Controlador{

	function render(){
		
	}
	/*var $nombre='Expresso';
	
	function render(){
																
		$nombre=$this->nombre;									#
		$tema="Default";										#		
		//-------------------------------------------------------
		//con autoloading ya no sera necesario esta parte 
		//require_once('../vistas/$tema/$nombre_view.php');		
		//require_once('../vistas/$tema/$nombre_view.php');		
		//-------------------------------------------------------
		$pagina = new Pagina();					#
		
		$vistaClassName=$nombre.'View';			#
		$vista=new $$vistaClassName;			#
		$pagina->setSeccion('contenido',$vista)	#
		
		$pagina->render();						#
	}*/
	function getModelObject(){
		if ( !isset($this->model) ){
			$this->model = new Model();
		}
		return $this->model;
	}
}
?>