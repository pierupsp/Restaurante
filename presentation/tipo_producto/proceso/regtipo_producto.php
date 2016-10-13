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
	include_once '../../../entities/tipo_producto.php';
	include_once '../../../data/tipo_productoDAL.php';

	if(isset($_POST['nombre'])){
		$obj = new tipo_producto();
		$obj->nombre = $_POST['nombre'];

		$dal_tpro = new tipo_productoDAL();
		$tpro_rs = $dal_tpro->insert($obj);
		echo ($tpro_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>