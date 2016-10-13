<?php
	session_start();
	if (!isset ($_SESSION['Auth.UsuarioID'])) {
		echo "<script>window.location='login.php';</script>";
		exit();
	}
	include_once '../utils.php';
	include_once '../../data/utiles.php';
?>
<?php
	include_once '../../data/tipo_productoDAL.php';
	$dal_tpro = new tipo_productoDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$tpro_rs = $dal_tpro->get($id);
		if ($tpro_rs) { $row = mysqli_fetch_assoc($tpro_rs); }
	}
	$_SESSION['pagina'] = "presentation/tipo_producto/tipo_productoUpd.php?id=$id";
?>
<form name='frmtipo_productoUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar tipo producto</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' value='<?php if($id) { echo htmlspecialchars($row['nombre']); } ?>' maxlength='20' placeholder='Ingrese nombre'/></td>
	</tr>
</table>
</center>
<div class='formfoot'>
		<input class='btn naranja' type='button' name='btnActualizar' id='btnActualizar' value='Guardar'/>
		<input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/></td>
</div></div></div>
</form>
<br/>
<script>
$(document).ready(function(e) {
	$('#txtnombre').focus();
	$('#btnActualizar').off('click').click(function(e) {
		var id_tipoproducto = '<?php echo $id; ?>';
		var nombre = $('#txtnombre').val();

		$.post('presentation/tipo_producto/proceso/updtipo_producto.php',{
			id_tipoproducto : id_tipoproducto,
			nombre : nombre
		},
		function(data) {
			if (data==1){
				alert('Actualizacion correcta');
				volver();
			} else { alert('Error al actualizar. ' + data); }
		});
	});
	$('#btnCancelar').click(function(e) {
		volver();
	});
});
function volver() {
	performLoad('presentation/tipo_producto/tipo_producto.php');
}
</script>