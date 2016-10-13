<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/marca.php';
	include_once '../../../data/marcaDAL.php';

	if(isset($_POST['id_marca'])){
		$id_marca = $_POST['id_marca'];

		$dal_mc = new marcaDAL();
		$mc_rs = $dal_mc->get($id_marca);
		$mc_row = mysqli_fetch_assoc($mc_rs);

		$obj = new marca();
		$obj->id_marca 	= $id_marca;
		$obj->nombre 	= getField('nombre', $mc_row);

		$mc_rs = $dal_mc->update($obj);
		echo ($mc_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>