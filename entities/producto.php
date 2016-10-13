<?php
class producto {
	var $id_producto;
	var $nombre;
	var $id_tipoproducto;
	var $id_marca;
	var $precio;
	var $stock;
	var $estado;

	public function getid_producto(){
		return $this->id_producto;
	}
	public function getnombre(){
		return $this->nombre;
	}
	public function getid_tipoproducto(){
		return $this->id_tipoproducto;
	}
	public function getid_marca(){
		return $this->id_marca;
	}
	public function getprecio(){
		return $this->precio;
	}
	public function getstock(){
		return $this->stock;
	}
	public function getestado(){
		return $this->estado;
	}

	public function setid_producto($val){
		$this->id_producto = $val;
	}
	public function setnombre($val){
		$this->nombre = $val;
	}
	public function setid_tipoproducto($val){
		$this->id_tipoproducto = $val;
	}
	public function setid_marca($val){
		$this->id_marca = $val;
	}
	public function setprecio($val){
		$this->precio = $val;
	}
	public function setstock($val){
		$this->stock = $val;
	}
	public function setestado($val){
		$this->estado = $val;
	}
}
?>