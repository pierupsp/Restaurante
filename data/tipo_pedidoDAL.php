<?php
include_once 'conexion.php';

class tipo_pedidoDAL {
	public function get($id_tipopedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpd.id_tipopedido, tpd.descripcion
		 FROM tipo_pedido tpd
		 WHERE tpd.id_tipopedido = $id_tipopedido;");
		return $rs;
	}
	public function getFields($id_tipopedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpd.id_tipopedido, tpd.descripcion
		 FROM tipo_pedido tpd
		 WHERE tpd.id_tipopedido = $id_tipopedido;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpd.id_tipopedido, tpd.descripcion
		 FROM tipo_pedido tpd");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpd.id_tipopedido, tpd.descripcion
		 FROM tipo_pedido tpd
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpd.id_tipopedido, tpd.descripcion
		 FROM tipo_pedido tpd
		 WHERE tpd.id_tipopedido = '$b'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO tipo_pedido (descripcion)
			VALUES ('$e->descripcion');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_pedido SET descripcion = '$e->descripcion'
			 WHERE id_tipopedido = $e->id_tipopedido;");
		return $rs;
	}
}
?>