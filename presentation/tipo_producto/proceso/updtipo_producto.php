<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/tipo_producto.php';
	include_once '../../../data/tipo_productoDAL.php';

	if(isset($_POST['id_tipoproducto'])){
		$id_tipoproducto = $_POST['id_tipoproducto'];

		$dal_tpro = new tipo_productoDAL();
		$tpro_rs = $dal_tpro->get($id_tipoproducto);
		$tpro_row = mysqli_fetch_assoc($tpro_rs);

		$obj = new tipo_producto();
		$obj->id_tipoproducto 	= $id_tipoproducto;
		$obj->nombre 	= getField('nombre', $tpro_row);

		$tpro_rs = $dal_tpro->update($obj);
		echo ($tpro_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>