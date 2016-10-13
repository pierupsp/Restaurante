<?php
include_once 'conexion.php';

class tipo_productoDAL {
	public function get($id_tipoproducto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpro.id_tipoproducto, tpro.nombre
		 FROM tipo_producto tpro
		 WHERE tpro.id_tipoproducto = $id_tipoproducto;");
		return $rs;
	}
	public function getFields($id_tipoproducto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpro.id_tipoproducto, tpro.nombre
		 FROM tipo_producto tpro
		 WHERE tpro.id_tipoproducto = $id_tipoproducto;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpro.id_tipoproducto, tpro.nombre
		 FROM tipo_producto tpro");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpro.id_tipoproducto, tpro.nombre
		 FROM tipo_producto tpro
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tpro.id_tipoproducto, tpro.nombre
		 FROM tipo_producto tpro
		 WHERE tpro.nombre like '$b%'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO tipo_producto (nombre)
			VALUES ('$e->nombre');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_producto SET nombre = '$e->nombre'
			 WHERE id_tipoproducto = $e->id_tipoproducto;");
		return $rs;
	}
}
?>