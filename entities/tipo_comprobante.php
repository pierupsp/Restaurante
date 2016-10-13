<?php
class tipo_comprobante {
	var $id_tipocomprobante;
	var $descripcion;

	public function getid_tipocomprobante(){
		return $this->id_tipocomprobante;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setid_tipocomprobante($val){
		$this->id_tipocomprobante = $val;
	}
	public function setdescripcion($val){
		$this->descripcion = $val;
	}
}
?>