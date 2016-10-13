<?php
include_once 'conexion.php';

class productoDAL {
	public function get($id_producto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pro.id_producto, pro.nombre, pro.id_tipoproducto, pro.id_marca, pro.precio, pro.stock, pro.estado
		 FROM producto pro
		 WHERE pro.id_producto = $id_producto;");
		return $rs;
	}
	public function getFields($id_producto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pro.id_producto, pro.nombre, pro.id_tipoproducto, pro.id_marca, pro.precio, pro.stock, pro.estado,
			mc.nombre AS id_marca, tpro.nombre AS id_tipoproducto
		 FROM producto pro
			INNER JOIN marca mc ON pro.id_marca = mc.id_marca
			INNER JOIN tipo_producto tpro ON pro.id_tipoproducto = tpro.id_tipoproducto
		 WHERE pro.id_producto = $id_producto;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pro.id_producto, pro.nombre, pro.id_tipoproducto, pro.id_marca, pro.precio, pro.stock, pro.estado,
			mc.nombre AS id_marca, tpro.nombre AS id_tipoproducto
		 FROM producto pro
			INNER JOIN marca mc ON pro.id_marca = mc.id_marca
			INNER JOIN tipo_producto tpro ON pro.id_tipoproducto = tpro.id_tipoproducto
		 WHERE pro.estado = $s;");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pro.id_producto, pro.nombre, pro.id_tipoproducto, pro.id_marca, pro.precio, pro.stock, pro.estado,
			mc.nombre AS id_marca, tpro.nombre AS id_tipoproducto
		 FROM producto pro
			INNER JOIN marca mc ON pro.id_marca = mc.id_marca
			INNER JOIN tipo_producto tpro ON pro.id_tipoproducto = tpro.id_tipoproducto
		 WHERE pro.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pro.id_producto, pro.nombre, pro.id_tipoproducto, pro.id_marca, pro.precio, pro.stock, pro.estado,
			mc.nombre AS id_marca, tpro.nombre AS id_tipoproducto
		 FROM producto pro
			INNER JOIN marca mc ON pro.id_marca = mc.id_marca
			INNER JOIN tipo_producto tpro ON pro.id_tipoproducto = tpro.id_tipoproducto
		 WHERE pro.nombre like '$b%'
		   AND pro.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO producto (nombre, id_tipoproducto, id_marca, precio, stock, estado)
			VALUES ('$e->nombre', '$e->id_tipoproducto', '$e->id_marca', '$e->precio', '$e->stock', 1);");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE producto SET nombre = '$e->nombre', id_tipoproducto = '$e->id_tipoproducto', id_marca = '$e->id_marca', precio = '$e->precio', stock = '$e->stock', estado = '$e->estado'
			 WHERE id_producto = $e->id_producto;");
		return $rs;
	}
	public function activate($id_producto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE producto SET estado = 1
			WHERE id_producto = $id_producto;");
		return $rs;
	}
	public function deactivate($id_producto) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE producto SET estado = 0
			WHERE id_producto = $id_producto;");
		return $rs;
	}
}
?>