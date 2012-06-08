<?php 

class Pagina extends Vista{
	var $nombre="Main";
	var $vistas=array();
	var $nombreVistaActiva=''; //Esta variable la usaremos para marcar el menu activo y para el titulo de la pagina (el tag <title> dentro del <head> )
	var $tema;
	
	function Pagina($contenido=null){
		if (isset($contenido)){
			$this->rutaContenido=$contenido;
		}else{
			$this->rutaContenido=MZ_TEMA;
		}
	}
	/* Como la página está compuesta por diferentes secciones, aqui se agrega cada sección  */
	function setSeccion($seccion, $vista){
		if ( $vista instanceof Vista){	
			//Si la vista es válida, se agrega
			$this->vistas[$seccion]=$vista;					
		}else{
			/* en caso de que la vista sea incorrecta, ¿Que haremos?
			en modo development, mostramos mensaje de error, en modo produccion solo un return false y log del error		*/
			throw new Exception("La vista que intenta agregar es incorrecta");
			return false;
		}
				
		if ($seccion=='contenido'){
			$this->nombreVistaActiva=$vista->getNombre();
		}
		
		/*
			En la funcion render() de la pagina, se deben incluir en el header, los archivos js y css incluidos por la vista.
			¿Que estrategia usaremos?	
			Leer el arreglo styleSheets y agregar cada elemento a $this->styleSheets
			Leer el arreglo javascripts y agregar cada elemento a $this->styleSheets
			en el template de la pagina, en el header invocar la funcion incluirHojasDeEstilos y incluirJavascripts. volalá
		*/
		return true;
	}

	function renderSeccion($seccion){		
		if ( isset($this->vistas[$seccion]) && $this->vistas[$seccion] instanceof Vista){	
			//Si la vista es válida, se muestra
			$this->vistas[$seccion]->render();
			return true;
		}
		
		/*	¿Que haremos en caso de que la vista no sea válida?
		en modo development, mostramos mensaje de error, en modo produccion solo un return false y log del error		
		*/
		echo "<div style='color:red;'>La Seccion <strong>$seccion</strong> no puede mostrarse.</div>";	//Mostraremos un mensaje de error en esa seccion 
		return false;
	}

	/**/
	private function incluirHojasDeEstilos(){
		foreach($this->javascripts as $js){
			echo $js;
		}
	}
	
	private function incluirJavascripts(){
		foreach($this->styleSheets as $estilo){
			echo $estilo;
		}
	}
	
	
	/*function render($rutaContenido=null){
		//echo $this->getContenido();exit;
		//echo $this->getContenido();exit;
		$this->setContenido($rutaContenido);
		include $this->getContenido();
	}*/
	/*Usada por el menu para marcar al menu que corresponde con la vista activa */
	/*public function getNombreVistaActiva(){
		return $this->nombreVistaActiva;
	}*/
	#================================================================================
	#				MENU
	#================================================================================
	function setMenuActivo($menu){
		$this->menuActivo=$menu;
	}
	function getMenuActivo(){
		return $this->menuActivo;
	}
	
	function getMenuState($nombreMenu){
	
		if ( $this->getMenuActivo() == $nombreMenu ){			
			echo "selected";			
		}else{
			echo "unselected";
		}
	}
}

?>