<?php
class tipo_cliente {
	var $id_tipocliente;
	var $descripcion;

	public function getid_tipocliente(){
		return $this->id_tipocliente;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setid_tipocliente($val){
		$this->id_tipocliente = $val;
	}
	public function setdescripcion($val){
		$this->descripcion = $val;
	}
}
?>