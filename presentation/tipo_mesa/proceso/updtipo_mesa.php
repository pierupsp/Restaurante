<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/tipo_mesa.php';
	include_once '../../../data/tipo_mesaDAL.php';

	if(isset($_POST['id_tipomesa'])){
		$id_tipomesa = $_POST['id_tipomesa'];

		$dal_tms = new tipo_mesaDAL();
		$tms_rs = $dal_tms->get($id_tipomesa);
		$tms_row = mysqli_fetch_assoc($tms_rs);

		$obj = new tipo_mesa();
		$obj->id_tipomesa 	= $id_tipomesa;
		$obj->nombre 	= getField('nombre', $tms_row);
		$obj->estado 	= getField('estado', $tms_row);

		$tms_rs = $dal_tms->update($obj);
		echo ($tms_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>