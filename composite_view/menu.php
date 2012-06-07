<?php 

class Menu extends Vista{
	var $menuActivo;
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