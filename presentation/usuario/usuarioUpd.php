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
	include_once '../../data/usuarioDAL.php';
	$dal_usu = new usuarioDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$usu_rs = $dal_usu->get($id);
		if ($usu_rs) { $row = mysqli_fetch_assoc($usu_rs); }
	}
	$_SESSION['pagina'] = "presentation/usuario/usuarioUpd.php?id=$id";
?>
<form name='frmusuarioUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar usuario</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtid_usuario'>id_usuario:</label></td>
		<td><input type='text' id='txtid_usuario' name='txtid_usuario' value='<?php if($id) { echo $row['id_usuario']; } ?>' maxlength='10' placeholder='Ingrese id_usuario'/></td>
	</tr>
	<tr><td><label for='txtnombre'>nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' value='<?php if($id) { echo htmlspecialchars($row['nombre']); } ?>' maxlength='20' placeholder='Ingrese nombre'/></td>
	</tr>
	<tr><td><label for='txtcontrasena'>contrasena:</label></td>
		<td><input type='text' id='txtcontrasena' name='txtcontrasena' value='<?php if($id) { echo htmlspecialchars($row['contrasena']); } ?>' maxlength='20' placeholder='Ingrese contrasena'/></td>
	</tr>
	<tr hidden><td><label for='txtestado'>estado:</label></td>
		<td><input type='text' id='txtestado' name='txtestado' value='<?php if($id) { echo $row['estado']; } ?>' maxlength='20' placeholder='Ingrese estado'/></td>
	</tr>
	<tr><td><label for='txtfecha_registro'>fecha_registro:</label></td>
		<td><input type='text' id='txtfecha_registro' name='txtfecha_registro' value='<?php if($id) { echo formatDate($row['fecha_registro']); } ?>'  placeholder='Ingrese fecha_registro'/></td>
	</tr>
	<tr><td><label for='txtfecha_culminacion'>fecha_culminacion:</label></td>
		<td><input type='text' id='txtfecha_culminacion' name='txtfecha_culminacion' value='<?php if($id) { echo formatDate($row['fecha_culminacion']); } ?>'  placeholder='Ingrese fecha_culminacion'/></td>
	</tr>
	<tr><td><label for='txtid_empleado'>id_empleado:</label></td>
		<td><input type='text' id='txtid_empleado' name='txtid_empleado' value='<?php if($id) { echo $row['id_empleado']; } ?>' maxlength='10' placeholder='Ingrese id_empleado'/></td>
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
	$('#txtid_usuario').focus();
	$('#btnActualizar').off('click').click(function(e) {
		var id_usuario = '<?php echo $id; ?>';
		var nombre = $('#txtnombre').val();
		var contrasena = $('#txtcontrasena').val();
		var estado = $('#txtestado').val();
		var fecha_registro = getDateYMD($('#txtfecha_registro').val());
		var fecha_culminacion = getDateYMD($('#txtfecha_culminacion').val());
		var id_empleado = $('#txtid_empleado').val();

		$.post('presentation/usuario/proceso/updusuario.php',{
			id_usuario : id_usuario,
			nombre : nombre,
			contrasena : contrasena,
			estado : estado,
			fecha_registro : fecha_registro,
			fecha_culminacion : fecha_culminacion,
			id_empleado : id_empleado
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
	performLoad('presentation/usuario/usuario.php');
}
</script>