<?php
class Model{
	function Model(){
		if ( !isset($this->db) ){
			try {
				$db = new PDO('mysql:host=localhost;dbname=saw;charset=UTF-8', 'root', '',array(
					PDO::ATTR_PERSISTENT => true
				));				
				$this->db=$db;
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}		
	}
	function getDb(){		
		return $this->db;
	}
}
?>