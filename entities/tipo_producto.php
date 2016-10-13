<?php
class tipo_producto {
	var $id_tipoproducto;
	var $nombre;

	public function getid_tipoproducto(){
		return $this->id_tipoproducto;
	}
	public function getnombre(){
		return $this->nombre;
	}

	public function setid_tipoproducto($val){
		$this->id_tipoproducto = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
}
?>