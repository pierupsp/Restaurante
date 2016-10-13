<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/usuario.php';
	include_once '../../../data/usuarioDAL.php';

	if(isset($_POST['id_usuario'])){
		$id_usuario = $_POST['id_usuario'];

		$dal_usu = new usuarioDAL();
		$usu_rs = $dal_usu->get($id_usuario);
		$usu_row = mysqli_fetch_assoc($usu_rs);

		$obj = new usuario();
		$obj->id_usuario 	= $id_usuario;
		$obj->nombre 	= getField('nombre', $usu_row);
		$obj->contrasena 	= getField('contrasena', $usu_row);
		$obj->estado 	= getField('estado', $usu_row);
		$obj->fecha_registro 	= getField('fecha_registro', $usu_row);
		$obj->fecha_culminacion 	= getField('fecha_culminacion', $usu_row);
		$obj->id_empleado 	= getField('id_empleado', $usu_row);

		$usu_rs = $dal_usu->update($obj);
		echo ($usu_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>