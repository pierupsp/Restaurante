<?php
include_once 'conexion.php';

class personaDAL {
	public function get($id_persona) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pers.id_persona, pers.nombre, pers.apellido_paterno, pers.apellido_materno, pers.id_tipodoc, pers.tipodoc_valor
		 FROM persona pers
		 WHERE pers.id_persona = $id_persona;");
		return $rs;
	}
	public function getFields($id_persona) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pers.id_persona, pers.nombre, pers.apellido_paterno, pers.apellido_materno, pers.id_tipodoc, pers.tipodoc_valor
		 FROM persona pers
			INNER JOIN tipo_documento tdoc ON pers.id_tipodoc = tdoc.id_tipodoc
		 WHERE pers.id_persona = $id_persona;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pers.id_persona, pers.nombre, pers.apellido_paterno, pers.apellido_materno, pers.id_tipodoc, pers.tipodoc_valor
		 FROM persona pers
			INNER JOIN tipo_documento tdoc ON pers.id_tipodoc = tdoc.id_tipodoc");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pers.id_persona, pers.nombre, pers.apellido_paterno, pers.apellido_materno, pers.id_tipodoc, pers.tipodoc_valor
		 FROM persona pers
			INNER JOIN tipo_documento tdoc ON pers.id_tipodoc = tdoc.id_tipodoc
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pers.id_persona, pers.nombre, pers.apellido_paterno, pers.apellido_materno, pers.id_tipodoc, pers.tipodoc_valor
		 FROM persona pers
			INNER JOIN tipo_documento tdoc ON pers.id_tipodoc = tdoc.id_tipodoc
		 WHERE pers.nombre like '$b%'
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO persona (nombre, apellido_paterno, apellido_materno, id_tipodoc, tipodoc_valor)
			VALUES ('$e->nombre', '$e->apellido_paterno', '$e->apellido_materno', '$e->id_tipodoc', '$e->tipodoc_valor');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE persona SET nombre = '$e->nombre', apellido_paterno = '$e->apellido_paterno', apellido_materno = '$e->apellido_materno', id_tipodoc = '$e->id_tipodoc', tipodoc_valor = '$e->tipodoc_valor'
			 WHERE id_persona = $e->id_persona;");
		return $rs;
	}
}
?>