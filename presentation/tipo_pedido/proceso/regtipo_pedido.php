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
	include_once '../../../entities/tipo_pedido.php';
	include_once '../../../data/tipo_pedidoDAL.php';

	if(isset($_POST['descripcion'])){
		$obj = new tipo_pedido();
		$obj->descripcion = $_POST['descripcion'];

		$dal_tpd = new tipo_pedidoDAL();
		$tpd_rs = $dal_tpd->insert($obj);
		echo ($tpd_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>