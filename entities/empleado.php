<?php
class empleado {
	var $id_empleado;
	var $turno;
	var $id_persona;
	var $estado;

	public function getid_empleado(){
		return $this->id_empleado;
	}
	public function getturno(){
		return $this->turno;
	}
	public function getid_persona(){
		return $this->id_persona;
	}
	public function getestado(){
		return $this->estado;
	}

	public function setid_empleado($val){
		$this->id_empleado = $val;
	}
	public function setturno($val){
		$this->turno = $val;
	}
	public function setid_persona($val){
		$this->id_persona = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
}
?>