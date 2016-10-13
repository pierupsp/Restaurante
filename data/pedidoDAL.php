<?php
include_once 'conexion.php';

class pedidoDAL {
	public function get($id_pedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pd.id_pedido, pd.fecha_reserva, pd.importe, pd.adeudo, pd.estado, pd.fecha_registro, pd.id_usuario, pd.id_tipopedido, pd.id_cliente
		 FROM pedido pd
		 WHERE pd.id_pedido = $id_pedido;");
		return $rs;
	}
	public function getFields($id_pedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pd.id_pedido, pd.fecha_reserva, pd.importe, pd.adeudo, pd.estado, pd.fecha_registro, pd.id_usuario, pd.id_tipopedido, pd.id_cliente,
			usu.nombre AS usuario
		 FROM pedido pd
			INNER JOIN tipo_pedido tpd ON pd.id_tipopedido = tpd.id_tipopedido
			INNER JOIN usuario usu ON pd.id_usuario = usu.id_usuario
			INNER JOIN cliente cli ON pd.id_cliente = cli.id_cliente
		 WHERE pd.id_pedido = $id_pedido;");
		return $rs;
	}
	public function getFullList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pd.id_pedido, pd.fecha_reserva, pd.importe, pd.adeudo, pd.estado, pd.fecha_registro, pd.id_usuario, pd.id_tipopedido, pd.id_cliente,
			usu.nombre AS usuario
		 FROM pedido pd
			INNER JOIN tipo_pedido tpd ON pd.id_tipopedido = tpd.id_tipopedido
			INNER JOIN usuario usu ON pd.id_usuario = usu.id_usuario
			INNER JOIN cliente cli ON pd.id_cliente = cli.id_cliente
		 WHERE pd.estado = $s;");
		return $rs;
	}
	public function getList($s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pd.id_pedido, pd.fecha_reserva, pd.importe, pd.adeudo, pd.estado, 
           pd.fecha_registro, pd.id_usuario, pd.id_tipopedido, pd.id_cliente, pers.nombre as cli_nombre, 
           pers.apellido_paterno as cli_ap_paterno, pers.apellido_materno as cli_ap_materno, 
           usu.nombre AS usuario, tpd.descripcion as tpd_descripcion
		 FROM pedido pd
			INNER JOIN tipo_pedido tpd ON pd.id_tipopedido = tpd.id_tipopedido
			INNER JOIN usuario usu ON pd.id_usuario = usu.id_usuario
			INNER JOIN cliente cli ON pd.id_cliente = cli.id_cliente
			inner join persona pers on cli.id_persona = pers.id_persona
		 WHERE pd.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function search($b, $s=1) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("SELECT pd.id_pedido, pd.fecha_reserva, pd.importe, pd.adeudo, pd.estado, pd.fecha_registro, pd.id_usuario, pd.id_tipopedido, pd.id_cliente,
			usu.nombre AS usuario
		 FROM pedido pd
			INNER JOIN tipo_pedido tpd ON pd.id_tipopedido = tpd.id_tipopedido
			INNER JOIN usuario usu ON pd.id_usuario = usu.id_usuario
			INNER JOIN cliente cli ON pd.id_cliente = cli.id_cliente
		 WHERE pd.id_pedido = '$b'
		   AND pd.estado = $s
		 LIMIT 0,50;");
		return $rs;
	}
	public function insert($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("INSERT INTO pedido (fecha_reserva, importe, adeudo, estado, fecha_registro, id_usuario, id_tipopedido, id_cliente)
			VALUES ('$e->fecha_reserva', '$e->importe', '$e->adeudo', 1, '$e->fecha_registro', '$e->id_usuario', '$e->id_tipopedido', '$e->id_cliente');");
		return $rs;
	}
	public function update($e) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE pedido SET fecha_reserva = '$e->fecha_reserva', importe = '$e->importe', adeudo = '$e->adeudo', estado = '$e->estado', fecha_registro = '$e->fecha_registro', id_usuario = '$e->id_usuario', id_tipopedido = '$e->id_tipopedido', id_cliente = '$e->id_cliente'
			 WHERE id_pedido = $e->id_pedido;");
		return $rs;
	}
	public function activate($id_pedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE pedido SET estado = 1
			WHERE id_pedido = $id_pedido;");
		return $rs;
	}
	public function deactivate($id_pedido) {
		$mysql = new conexion();
		$rs = $mysql->ejecutar("UPDATE pedido SET estado = 0
			WHERE id_pedido = $id_pedido;");
		return $rs;
	}
}
?>