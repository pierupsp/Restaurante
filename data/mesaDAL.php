<?php
include_once 'conexion.php';

class mesaDAL {
	public function get($id_mesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT ms.id_mesa, ms.id_tipomesa, ms.nro_mesa, ms.ubicacion, ms.estado
		 FROM mesa ms
		 WHERE ms.id_mesa = $id_mesa;");
		return $rs;
	}
	public function getFields($id_mesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT ms.id_mesa, ms.id_tipomesa, ms.nro_mesa, ms.ubicacion, ms.estado,
			tms.nombre AS tipomesa
		 FROM mesa ms
			INNER JOIN tipo_mesa tms ON ms.id_tipomesa = tms.id_tipomesa
		 WHERE ms.id_mesa = $id_mesa;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT ms.id_mesa, ms.id_tipomesa, ms.nro_mesa, ms.ubicacion, ms.estado,
			tms.nombre AS tipomesa
		 FROM mesa ms
			INNER JOIN tipo_mesa tms ON ms.id_tipomesa = tms.id_tipomesa
		 WHERE ms.estado = $s;");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT ms.id_mesa, ms.id_tipomesa, ms.nro_mesa, ms.ubicacion, ms.estado,
			tms.nombre AS tipomesa
		 FROM mesa ms
			INNER JOIN tipo_mesa tms ON ms.id_tipomesa = tms.id_tipomesa
		 WHERE ms.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT ms.id_mesa, ms.id_tipomesa, ms.nro_mesa, ms.ubicacion, ms.estado,
			tms.nombre AS tipomesa
		 FROM mesa ms
			INNER JOIN tipo_mesa tms ON ms.id_tipomesa = tms.id_tipomesa
		 WHERE ms.id_mesa = '$b'
		   AND ms.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO mesa (id_tipomesa, nro_mesa, ubicacion, estado)
			VALUES ('$e->id_tipomesa', '$e->nro_mesa', '$e->ubicacion', 1);");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE mesa SET id_tipomesa = '$e->id_tipomesa', nro_mesa = '$e->nro_mesa', ubicacion = '$e->ubicacion', estado = '$e->estado'
			 WHERE id_mesa = $e->id_mesa;");
		return $rs;
	}
	public function activate($id_mesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE mesa SET estado = 1
			WHERE id_mesa = $id_mesa;");
		return $rs;
	}
	public function deactivate($id_mesa) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE mesa SET estado = 0
			WHERE id_mesa = $id_mesa;");
		return $rs;
	}
}
?>