<?php
class marca {
	var $id_marca;
	var $nombre;

	public function getid_marca(){
		return $this->id_marca;
	}
	public function getnombre(){
		return $this->nombre;
	}

	public function setid_marca($val){
		$this->id_marca = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
}
?>