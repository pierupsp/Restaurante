<?php
class tipo_pago {
	var $id_tipopago;
	var $descripcion;

	public function getid_tipopago(){
		return $this->id_tipopago;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setid_tipopago($val){
		$this->id_tipopago = $val;
	}
	public function setdescripcion($val){
		$this->descripcion = $val;
	}
}
?>