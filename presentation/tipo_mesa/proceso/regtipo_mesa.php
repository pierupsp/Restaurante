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
	include_once '../../../entities/tipo_mesa.php';
	include_once '../../../data/tipo_mesaDAL.php';

	if(isset($_POST['nombre'])){
		$obj = new tipo_mesa();
		$obj->nombre = $_POST['nombre'];

		$dal_tms = new tipo_mesaDAL();
		$tms_rs = $dal_tms->insert($obj);
		echo ($tms_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>