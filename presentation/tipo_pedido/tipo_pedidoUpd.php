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
	include_once '../../data/tipo_pedidoDAL.php';
	$dal_tpd = new tipo_pedidoDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$tpd_rs = $dal_tpd->get($id);
		if ($tpd_rs) { $row = mysqli_fetch_assoc($tpd_rs); }
	}
	$_SESSION['pagina'] = "presentation/tipo_pedido/tipo_pedidoUpd.php?id=$id";
?>
<form name='frmtipo_pedidoUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar tipo_pedido</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtdescripcion'>descripcion:</label></td>
		<td><input type='text' id='txtdescripcion' name='txtdescripcion' value='<?php if($id) { echo htmlspecialchars($row['descripcion']); } ?>' maxlength='20' placeholder='Ingrese descripcion'/></td>
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
	$('#txtdescripcion').focus();
	$('#btnActualizar').off('click').click(function(e) {
		var id_tipopedido = '<?php echo $id; ?>';
		var descripcion = $('#txtdescripcion').val();

		$.post('presentation/tipo_pedido/proceso/updtipo_pedido.php',{
			id_tipopedido : id_tipopedido,
			descripcion : descripcion
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
	performLoad('presentation/tipo_pedido/tipo_pedido.php');
}
</script>