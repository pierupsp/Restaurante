<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/tipo_pedido.php';
	include_once '../../../data/tipo_pedidoDAL.php';

	if(isset($_POST['id_tipopedido'])){
		$id_tipopedido = $_POST['id_tipopedido'];

		$dal_tpd = new tipo_pedidoDAL();
		$tpd_rs = $dal_tpd->get($id_tipopedido);
		$tpd_row = mysqli_fetch_assoc($tpd_rs);

		$obj = new tipo_pedido();
		$obj->id_tipopedido 	= $id_tipopedido;
		$obj->descripcion 	= getField('descripcion', $tpd_row);

		$tpd_rs = $dal_tpd->update($obj);
		echo ($tpd_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>