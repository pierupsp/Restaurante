<?php
include_once 'conexion.php';

class tipo_clienteDAL {
	public function get($id_tipocliente) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tcli.id_tipocliente, tcli.descripcion
		 FROM tipo_cliente tcli
		 WHERE tcli.id_tipocliente = $id_tipocliente;");
		return $rs;
	}
	public function getFields($id_tipocliente) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tcli.id_tipocliente, tcli.descripcion
		 FROM tipo_cliente tcli
		 WHERE tcli.id_tipocliente = $id_tipocliente;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tcli.id_tipocliente, tcli.descripcion
		 FROM tipo_cliente tcli");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tcli.id_tipocliente, tcli.descripcion
		 FROM tipo_cliente tcli
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT tcli.id_tipocliente, tcli.descripcion
		 FROM tipo_cliente tcli
		 WHERE tcli.id_tipocliente = '$b'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO tipo_cliente (descripcion)
			VALUES ('$e->descripcion');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE tipo_cliente SET descripcion = '$e->descripcion'
			 WHERE id_tipocliente = $e->id_tipocliente;");
		return $rs;
	}
}
?>