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
	include_once '../../../entities/producto.php';
	include_once '../../../data/productoDAL.php';

	if(isset($_POST['nombre'], $_POST['id_tipoproducto'], $_POST['id_marca'], $_POST['precio'], $_POST['stock'])){
		$obj = new producto();
		$obj->nombre = $_POST['nombre'];
		$obj->id_tipoproducto = $_POST['id_tipoproducto'];
		$obj->id_marca = $_POST['id_marca'];
		$obj->precio = $_POST['precio'];
		$obj->stock = $_POST['stock'];

		$dal_pro = new productoDAL();
		$pro_rs = $dal_pro->insert($obj);
		echo ($pro_rs==1) ? 1 : 'No se ha podido registrar';
	} else { echo 'Ingrese datos validos'; }
}
?>