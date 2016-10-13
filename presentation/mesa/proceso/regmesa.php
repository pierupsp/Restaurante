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
	include_once '../../../entities/mesa.php';
	include_once '../../../data/mesaDAL.php';

	if(isset($_POST['id_tipomesa'], $_POST['nro_mesa'], $_POST['ubicacion'])){
		$obj = new mesa();
		$obj->id_tipomesa = $_POST['id_tipomesa'];
		$obj->nro_mesa = $_POST['nro_mesa'];
		$obj->ubicacion = $_POST['ubicacion'];

		$dal_ms = new mesaDAL();
		$ms_rs = $dal_ms->insert($obj);
		echo ($ms_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>