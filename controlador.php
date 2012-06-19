<?php

class Controlador{

	function render($vista){
		//Muestra una vista ubicada en vistas/paginas/
		echo "Mostrar Vista: $vista";		
	}

	function getModelObject(){
		if ( !isset($this->model) ){
			$this->model = new Model();
		}
		return $this->model;
	}
	
	private function renderVista($menuText,$contenido){

		#===============================================================================================================================
		#			Preparar las vistas
		#===============================================================================================================================
		$paginaObj= new Pagina();						
		$menu =  new Menu('default/menu_cms.html.php');		
		$menu->paginas=$paginas;
		$paginaObj->setSeccion('menu',$menu);	
		$menu->setMenuActivo($menuText);
		
		/* Contenido cargado desde la base de datos*/		
		$contenido =  new Vista('temas/naturalist/contenido.html.php');
		$contenido->paginas=$paginas;
		$paginaObj->setSeccion('contenido',$contenido);
		/*
		// FORMA MANUAL: Contenido almacenado en archivos php
		
		$menuText='CONTACT';		
		$contenido='default/home.html.php';
		$contenido =  new Vista($contenido, $menuText);
		$pagina->setSeccion('page1',$contenido);
		
		$contenido='default/docs.html.php';
		$contenido =  new Vista($contenido, $menuText);
		$pagina->setSeccion('page2',$contenido);
		
		$contenido='default/download.html.php';
		$contenido =  new Vista($contenido, $menuText);
		$pagina->setSeccion('page3',$contenido);
		
		$contenido='default/contact.html.php';
		$contenido =  new Vista($contenido, $menuText);
		$pagina->setSeccion('page4',$contenido);
		
		$contenido='default/cms.html.php';
		$contenido =  new Vista($contenido, $menuText);
		$pagina->setSeccion('page5',$contenido);
		*/
		$paginaObj->render();
	}
}
?>