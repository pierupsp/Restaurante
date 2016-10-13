<?php
class tipo_mesa {
	var $id_tipomesa;
	var $nombre;
	var $estado;

	public function getid_tipomesa(){
		return $this->id_tipomesa;
	}
	public function getnombre(){
		return $this->nombre;
	}
	public function getestado(){
		return $this->estado;
	}

	public function setid_tipomesa($val){
		$this->id_tipomesa = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
}
?>