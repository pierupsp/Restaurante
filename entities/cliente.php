<?php
class cliente {
	var $id_cliente;
	var $telefono;
	var $email;
	var $id_tipocliente;
	var $id_persona;
	var $id_empresa;

	public function getid_cliente(){
		return $this->id_cliente;
	}
	public function gettelefono(){
		return $this->telefono;
	}
	public function getemail(){
		return $this->email;
	}
	public function getid_tipocliente(){
		return $this->id_tipocliente;
	}
	public function getid_persona(){
		return $this->id_persona;
	}
	public function getid_empresa(){
		return $this->id_empresa;
	}

	public function setid_cliente($val){
		$this->id_cliente = $val;
	}
	public function settelefono($val){
		$this->telefono = $val;
	}
	public function setemail($val){
		$this->email = $val;
	}
	public function setid_tipocliente($val){
		$this->id_tipocliente = $val;
	}
	public function setid_persona($val){
		$this->id_persona = $val;
	}
	public function setid_empresa($val){
		$this->id_empresa = $val;
	}
}
?>