<?php
class empresa {
	var $id_empresa;
	var $nombre_com;
	var $razon_social;
	var $ruc;
	var $direccion;
	var $telefono;

	public function getid_empresa(){
		return $this->id_empresa;
	}
	public function getnombre_com(){
		return $this->nombre_com;
	}
	public function getrazon_social(){
		return $this->razon_social;
	}
	public function getruc(){
		return $this->ruc;
	}
	public function getdireccion(){
		return $this->direccion;
	}
	public function gettelefono(){
		return $this->telefono;
	}

	public function setid_empresa($val){
		$this->id_empresa = $val;
	}
	public function setnombre_com($val){
		$this->nombre_com = $val;
	}
	public function setrazon_social($val){
		$this->razon_social = $val;
	}
	public function setruc($val){
		$this->ruc = $val;
	}
	public function setdireccion($val){
		$this->direccion = $val;
	}
	public function settelefono($val){
		$this->telefono = $val;
	}
}
?>