<?php
class usuario {
	var $id_usuario;
	var $nombre;
	var $contrasena;
	var $estado;
	var $fecha_registro;
	var $fecha_culminacion;
	var $id_empleado;

	public function getid_usuario(){
		return $this->id_usuario;
	}
	public function getnombre(){
		return $this->nombre;
	}
	public function getcontrasena(){
		return $this->contrasena;
	}
	public function getestado(){
		return $this->estado;
	}
	public function getfecha_registro(){
		return $this->fecha_registro;
	}
	public function getfecha_culminacion(){
		return $this->fecha_culminacion;
	}
	public function getid_empleado(){
		return $this->id_empleado;
	}

	public function setid_usuario($val){
		$this->id_usuario = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
	public function setcontrasena($val){
		$this->contrasena = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
	public function setfecha_registro($val){
		$this->fecha_registro = $val;
	}
	public function setfecha_culminacion($val){
		$this->fecha_culminacion = $val;
	}
	public function setid_empleado($val){
		$this->id_empleado = $val;
	}
}
?>