<?php
class persona {
	var $id_persona;
	var $nombre;
	var $apellido_paterno;
	var $apellido_materno;
	var $id_tipodoc;
	var $tipodoc_valor;

	public function getid_persona(){
		return $this->id_persona;
	}
	public function getnombre(){
		return $this->nombre;
	}
	public function getapellido_paterno(){
		return $this->apellido_paterno;
	}
	public function getapellido_materno(){
		return $this->apellido_materno;
	}
	public function getid_tipodoc(){
		return $this->id_tipodoc;
	}
	public function gettipodoc_valor(){
		return $this->tipodoc_valor;
	}

	public function setid_persona($val){
		$this->id_persona = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
	public function setapellido_paterno($val){
		$this->apellido_paterno = $val;
	}
	public function setapellido_materno($val){
		$this->apellido_materno = $val;
	}
	public function setid_tipodoc($val){
		$this->id_tipodoc = $val;
	}
	public function settipodoc_valor($val){
		$this->tipodoc_valor = $val;
	}
}
?>