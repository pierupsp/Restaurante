<?php
class tipo_documento {
	var $id_tipodoc;
	var $descripcion;

	public function getid_tipodoc(){
		return $this->id_tipodoc;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setid_tipodoc($val){
		$this->id_tipodoc = $val;
	}
	public function setdescripcion($val){
		$this->descripcion = $val;
	}
}
?>