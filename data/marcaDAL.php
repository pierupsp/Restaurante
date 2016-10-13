<?php
include_once 'conexion.php';

class marcaDAL {
	public function get($id_marca) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT mc.id_marca, mc.nombre
		 FROM marca mc
		 WHERE mc.id_marca = $id_marca;");
		return $rs;
	}
	public function getFields($id_marca) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT mc.id_marca, mc.nombre
		 FROM marca mc
		 WHERE mc.id_marca = $id_marca;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT mc.id_marca, mc.nombre
		 FROM marca mc");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT mc.id_marca, mc.nombre
		 FROM marca mc
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT mc.id_marca, mc.nombre
		 FROM marca mc
		 WHERE mc.nombre like '$b%'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO marca (nombre)
			VALUES ('$e->nombre');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE marca SET nombre = '$e->nombre'
			 WHERE id_marca = $e->id_marca;");
		return $rs;
	}
}
?>