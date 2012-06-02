<?php 

class Vista{
	/*
	$nombre: Es el identificador de la vista, deberia ser unico, usamos un nombre como Home, Index, Nosotros, Contacto. Al mostrarse dentro de una pagina,
	la pagina podria usar esta variable para mostrar el titulo en el navegador u otras acciones...
	*/
	var  $nombre="";	
	
	/*Ruta al archivo php que contiene el codigo para pintar la vista*/
	var $rutaContenido='';
	
	//Hojas de estilo que se incluirán en el header
	var $styleSheets=array();
	
	//Archivos javascript que se incluirán en el header
	var $javascripts=array();
	
	function render($rutaContenido=null){
	
		if ($rutaContenido!=undefined){
			$this->setRutaContenido($rutaContenido);
		}
		
		//mostrar el html... puedes hacer un echo, cerrar las etiquetas php y empezar a escribir html, o incluir otro archivo con el contenido html...a tu gusto
		if ( !empty($this->rutaContenido) ){
			include $this->rutaContenido;
		}	
	}
	
	function getNombre(){
		return $this->nombre;
	}
	
	function setNombre($nombre){
		//verificar que el nombre sea una cadena
		if (is_string($nombre)){
			$this->nombre=$nombre;
		}else{
			throw new Exception("Debe establecer una cadena para el nombre");
		}		
	}
	
	function setRutaContenido($ruta){
		//Verificar que el archivo existe;
		/*
		//if (file_exists($ruta) ){
		
		}
		else{
		
		}
		
		*/
		
		$this->rutaContenido=$ruta;
	}
	function Vista(){
	}
}
?>