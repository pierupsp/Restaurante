<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/mesa.php';
	include_once '../../../data/mesaDAL.php';

	if(isset($_POST['id_mesa'])){
		$id_mesa = $_POST['id_mesa'];

		$dal_ms = new mesaDAL();
		$ms_rs = $dal_ms->get($id_mesa);
		$ms_row = mysqli_fetch_assoc($ms_rs);

		$obj = new mesa();
		$obj->id_mesa 	= $id_mesa;
		$obj->id_tipomesa 	= getField('id_tipomesa', $ms_row);
		$obj->nro_mesa 	= getField('nro_mesa', $ms_row);
		$obj->ubicacion 	= getField('ubicacion', $ms_row);
		$obj->estado 	= getField('estado', $ms_row);

		$ms_rs = $dal_ms->update($obj);
		echo ($ms_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>