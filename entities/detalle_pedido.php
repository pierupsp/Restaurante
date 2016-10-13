<?php
class detalle_pedido {
	var $id_pedido;
	var $id_producto;
	var $cantidad;
	var $precio;
	var $estado;

	public function getid_pedido(){
		return $this->id_pedido;
	}
	public function getid_producto(){
		return $this->id_producto;
	}
	public function getcantidad(){
		return $this->cantidad;
	}
	public function getprecio(){
		return $this->precio;
	}
	public function getestado(){
		return $this->estado;
	}

	public function setid_pedido($val){
		$this->id_pedido = $val;
	}
	public function setid_producto($val){
		$this->id_producto = $val;
	}
	public function setcantidad($val){
		$this->cantidad = $val;
	}
	public function setprecio($val){
		$this->precio = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
}
?>