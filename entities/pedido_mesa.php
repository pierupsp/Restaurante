<?php
class pedido_mesa {
	var $id_mesa;
	var $id_pedido;

	public function getid_mesa(){
		return $this->id_mesa;
	}
	public function getid_pedido(){
		return $this->id_pedido;
	}

	public function setid_mesa($val){
		$this->id_mesa = $val;
	}
	public function setid_pedido($val){
		$this->id_pedido = $val;
	}
}
?>