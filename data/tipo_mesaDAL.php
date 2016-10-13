<?php
include_once 'conexion.php';

class tipo_mesaDAL {
	public function get($id_tipomesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tms.id_tipomesa, tms.nombre, tms.estado
		 FROM tipo_mesa tms
		 WHERE tms.id_tipomesa = $id_tipomesa;");
		return $rs;
	}
	public function getFields($id_tipomesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tms.id_tipomesa, tms.nombre, tms.estado
		 FROM tipo_mesa tms
		 WHERE tms.id_tipomesa = $id_tipomesa;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tms.id_tipomesa, tms.nombre, tms.estado
		 FROM tipo_mesa tms
		 WHERE tms.estado = $s;");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tms.id_tipomesa, tms.nombre, tms.estado
		 FROM tipo_mesa tms
		 WHERE tms.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tms.id_tipomesa, tms.nombre, tms.estado
		 FROM tipo_mesa tms
		 WHERE tms.nombre like '$b%'
		   AND tms.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO tipo_mesa (nombre, estado)
			VALUES ('$e->nombre', 1);");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_mesa SET nombre = '$e->nombre', estado = '$e->estado'
			 WHERE id_tipomesa = $e->id_tipomesa;");
		return $rs;
	}
	public function activate($id_tipomesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_mesa SET estado = 1
			WHERE id_tipomesa = $id_tipomesa;");
		return $rs;
	}
	public function deactivate($id_tipomesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_mesa SET estado = 0
			WHERE id_tipomesa = $id_tipomesa;");
		return $rs;
	}
}
?>