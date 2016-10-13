<?php
class tipo_pedido {
	var $id_tipopedido;
	var $descripcion;

	public function getid_tipopedido(){
		return $this->id_tipopedido;
	}
	public function getdescripcion(){
		return $this->descripcion;
	}

	public function setid_tipopedido($val){
		$this->id_tipopedido = $val;
	}
	public function setdescripcion($val){
		$this->descripcion = $val;
	}
}
?>