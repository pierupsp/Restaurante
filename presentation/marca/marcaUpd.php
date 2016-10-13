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
	include_once '../../data/marcaDAL.php';
	$dal_mc = new marcaDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$mc_rs = $dal_mc->get($id);
		if ($mc_rs) { $row = mysqli_fetch_assoc($mc_rs); }
	}
	$_SESSION['pagina'] = "presentation/marca/marcaUpd.php?id=$id";
?>
<form name='frmmarcaUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar marca</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>Nombre:</label></td>
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
		var id_marca = '<?php echo $id; ?>';
		var nombre = $('#txtnombre').val();

		$.post('presentation/marca/proceso/updmarca.php',{
			id_marca : id_marca,
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
	performLoad('presentation/marca/marca.php');
}
</script>