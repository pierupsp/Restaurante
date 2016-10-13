<?php
class mesa {
	var $id_mesa;
	var $id_tipomesa;
	var $nro_mesa;
	var $ubicacion;
	var $estado;

	public function getid_mesa(){
		return $this->id_mesa;
	}
	public function getid_tipomesa(){
		return $this->id_tipomesa;
	}
	public function getnro_mesa(){
		return $this->nro_mesa;
	}
	public function getubicacion(){
		return $this->ubicacion;
	}
	public function getestado(){
		return $this->estado;
	}

	public function setid_mesa($val){
		$this->id_mesa = $val;
	}
	public function setid_tipomesa($val){
		$this->id_tipomesa = $val;
	}
	public function setnro_mesa($val){
		$this->nro_mesa = $val;
	}
	public function setubicacion($val){
		$this->ubicacion = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
}
?>