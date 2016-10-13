<?php
class pedido {
	var $id_pedido;
	var $fecha_reserva;
	var $importe;
	var $adeudo;
	var $estado;
	var $fecha_registro;
	var $id_usuario;
	var $id_tipopedido;
	var $id_cliente;

	public function getid_pedido(){
		return $this->id_pedido;
	}
	public function getfecha_reserva(){
		return $this->fecha_reserva;
	}
	public function getimporte(){
		return $this->importe;
	}
	public function getadeudo(){
		return $this->adeudo;
	}
	public function getestado(){
		return $this->estado;
	}
	public function getfecha_registro(){
		return $this->fecha_registro;
	}
	public function getid_usuario(){
		return $this->id_usuario;
	}
	public function getid_tipopedido(){
		return $this->id_tipopedido;
	}
	public function getid_cliente(){
		return $this->id_cliente;
	}

	public function setid_pedido($val){
		$this->id_pedido = $val;
	}
	public function setfecha_reserva($val){
		$this->fecha_reserva = $val;
	}
	public function setimporte($val){
		$this->importe = $val;
	}
	public function setadeudo($val){
		$this->adeudo = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
	public function setfecha_registro($val){
		$this->fecha_registro = $val;
	}
	public function setid_usuario($val){
		$this->id_usuario = $val;
	}
	public function setid_tipopedido($val){
		$this->id_tipopedido = $val;
	}
	public function setid_cliente($val){
		$this->id_cliente = $val;
	}
}
?>