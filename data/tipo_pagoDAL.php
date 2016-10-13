<?php
include_once 'conexion.php';

class tipo_pagoDAL {
	public function get($id_tipopago) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpg.id_tipopago, tpg.descripcion
		 FROM tipo_pago tpg
		 WHERE tpg.id_tipopago = $id_tipopago;");
		return $rs;
	}
	public function getFields($id_tipopago) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpg.id_tipopago, tpg.descripcion
		 FROM tipo_pago tpg
		 WHERE tpg.id_tipopago = $id_tipopago;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpg.id_tipopago, tpg.descripcion
		 FROM tipo_pago tpg");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpg.id_tipopago, tpg.descripcion
		 FROM tipo_pago tpg
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpg.id_tipopago, tpg.descripcion
		 FROM tipo_pago tpg
		 WHERE tpg.id_tipopago = '$b'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO tipo_pago (descripcion)
			VALUES ('$e->descripcion');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_pago SET descripcion = '$e->descripcion'
			 WHERE id_tipopago = $e->id_tipopago;");
		return $rs;
	}
}
?>