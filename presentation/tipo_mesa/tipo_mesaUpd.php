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
	include_once '../../data/tipo_mesaDAL.php';
	$dal_tms = new tipo_mesaDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$tms_rs = $dal_tms->get($id);
		if ($tms_rs) { $row = mysqli_fetch_assoc($tms_rs); }
	}
	$_SESSION['pagina'] = "presentation/tipo_mesa/tipo_mesaUpd.php?id=$id";
?>
<form name='frmtipo_mesaUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar tipo mesa</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' value='<?php if($id) { echo htmlspecialchars($row['nombre']); } ?>' maxlength='20' placeholder='Ingrese nombre'/></td>
	</tr>
	<tr hidden><td><label for='txtestado'>estado:</label></td>
		<td><input type='text' id='txtestado' name='txtestado' value='<?php if($id) { echo $row['estado']; } ?>' maxlength='20' placeholder='Ingrese estado'/></td>
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
		var id_tipomesa = '<?php echo $id; ?>';
		var nombre = $('#txtnombre').val();
		var estado = $('#txtestado').val();

		$.post('presentation/tipo_mesa/proceso/updtipo_mesa.php',{
			id_tipomesa : id_tipomesa,
			nombre : nombre,
			estado : estado
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
	performLoad('presentation/tipo_mesa/tipo_mesa.php');
}
</script>