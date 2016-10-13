<?php
class pago {
	var $id_pago;
	var $fecha;
	var $serie;
	var $numero;
	var $id_pedido;
	var $id_cliente;
	var $id_tipocomprobante;
	var $id_tipopago;
	var $subtotal;
	var $igv;
	var $total;

	public function getid_pago(){
		return $this->id_pago;
	}
	public function getfecha(){
		return $this->fecha;
	}
	public function getserie(){
		return $this->serie;
	}
	public function getnumero(){
		return $this->numero;
	}
	public function getid_pedido(){
		return $this->id_pedido;
	}
	public function getid_cliente(){
		return $this->id_cliente;
	}
	public function getid_tipocomprobante(){
		return $this->id_tipocomprobante;
	}
	public function getid_tipopago(){
		return $this->id_tipopago;
	}
	public function getsubtotal(){
		return $this->subtotal;
	}
	public function getigv(){
		return $this->igv;
	}
	public function gettotal(){
		return $this->total;
	}

	public function setid_pago($val){
		$this->id_pago = $val;
	}
	public function setfecha($val){
		$this->fecha = $val;
	}
	public function setserie($val){
		$this->serie = $val;
	}
	public function setnumero($val){
		$this->numero = $val;
	}
	public function setid_pedido($val){
		$this->id_pedido = $val;
	}
	public function setid_cliente($val){
		$this->id_cliente = $val;
	}
	public function setid_tipocomprobante($val){
		$this->id_tipocomprobante = $val;
	}
	public function setid_tipopago($val){
		$this->id_tipopago = $val;
	}
	public function setsubtotal($val){
		$this->subtotal = $val;
	}
	public function setigv($val){
		$this->igv = $val;
	}
	public function settotal($val){
		$this->total = $val;
	}
}
?>