<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/pedido.php';
	include_once '../../../data/pedidoDAL.php';

	if(isset($_POST['id_pedido'])){
		$id_pedido = $_POST['id_pedido'];

		$dal_pd = new pedidoDAL();
		$pd_rs = $dal_pd->get($id_pedido);
		$pd_row = mysqli_fetch_assoc($pd_rs);

		$obj = new pedido();
		$obj->id_pedido 	= $id_pedido;
		$obj->fecha_reserva 	= getField('fecha_reserva', $pd_row);
		$obj->importe 	= getField('importe', $pd_row);
		$obj->adeudo 	= getField('adeudo', $pd_row);
		$obj->estado 	= getField('estado', $pd_row);
		$obj->fecha_registro 	= getField('fecha_registro', $pd_row);
		$obj->id_usuario 	= getField('id_usuario', $pd_row);
		$obj->id_tipopedido 	= getField('id_tipopedido', $pd_row);
		$obj->id_cliente 	= getField('id_cliente', $pd_row);

		$pd_rs = $dal_pd->update($obj);
		echo ($pd_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>