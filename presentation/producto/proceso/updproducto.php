<?php
session_start();
if (isset($_SESSION['Auth.UsuarioID'])){
	include_once '../../../entities/producto.php';
	include_once '../../../data/productoDAL.php';

	if(isset($_POST['id_producto'])){
		$id_producto = $_POST['id_producto'];

		$dal_pro = new productoDAL();
		$pro_rs = $dal_pro->get($id_producto);
		$pro_row = mysqli_fetch_assoc($pro_rs);

		$obj = new producto();
		$obj->id_producto 	= $id_producto;
		$obj->nombre 	= getField('nombre', $pro_row);
		$obj->id_tipoproducto 	= getField('id_tipoproducto', $pro_row);
		$obj->id_marca 	= getField('id_marca', $pro_row);
		$obj->precio 	= getField('precio', $pro_row);
		$obj->stock 	= getField('stock', $pro_row);
		$obj->estado 	= getField('estado', $pro_row);

		$pro_rs = $dal_pro->update($obj);
		echo ($pro_rs==1) ? 1 : 'No se ha podido actualizar';

	} else { echo 'Ingrese datos validos'; }
}
function getField($campo, $row) {
	return isset($_POST[$campo]) ? $_POST[$campo] : $row[$campo];
}
?>