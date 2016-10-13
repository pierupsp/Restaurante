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
	include_once '../../../entities/marca.php';
	include_once '../../../data/marcaDAL.php';

	if(isset($_POST['nombre'])){
		$obj = new marca();
		$obj->nombre = $_POST['nombre'];

		$dal_mc = new marcaDAL();
		$mc_rs = $dal_mc->insert($obj);
		echo ($mc_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>