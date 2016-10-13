<?php
	session_start();
	$UsuarioID = 0;
	if (!isset ($_SESSION['Auth.UsuarioID'])) {
		echo 'Inicie sesión de nuevo.';
		exit();
	} else {
		$UsuarioID = $_SESSION['Auth.UsuarioID'];
	}
?>
<?php
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/usuario.php';
	include_once '../../../data/usuarioDAL.php';

	if(isset($_POST['id_usuario'], $_POST['nombre'], $_POST['contrasena'], $_POST['fecha_registro'], $_POST['fecha_culminacion'], $_POST['id_empleado'])){
		$obj = new usuario();
		$obj->id_usuario = $_POST['id_usuario'];
		$obj->nombre = $_POST['nombre'];
		$obj->contrasena = $_POST['contrasena'];
		$obj->fecha_registro = $_POST['fecha_registro'];
		$obj->fecha_culminacion = $_POST['fecha_culminacion'];
		$obj->id_empleado = $_POST['id_empleado'];

		$dal_usu = new usuarioDAL();
		$usu_rs = $dal_usu->insert($obj);
		echo ($usu_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>