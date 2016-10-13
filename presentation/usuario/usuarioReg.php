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
	$_SESSION['pagina'] = 'presentation/usuario/usuarioReg.php';
	$parent = '';
	if(isset($_GET['parent'])){
		$_SESSION['usureg.parent'] = $parent = $_GET['parent'];
	} elseif (isset($_SESSION['usureg.parent'])) {
		$parent = $_SESSION['usureg.parent'];
	}
?>
<form name='frmusuarioReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Registrar usuario</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtid_usuario'>id_usuario:</label></td>
		<td><input type='text' id='txtid_usuario' name='txtid_usuario' maxlength='10' placeholder='Ingrese id_usuario'/></td>
	</tr>
	<tr><td><label for='txtnombre'>nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' maxlength='20' placeholder='Ingrese nombre'/></td>
	</tr>
	<tr><td><label for='txtcontrasena'>contrasena:</label></td>
		<td><input type='text' id='txtcontrasena' name='txtcontrasena' maxlength='20' placeholder='Ingrese contrasena'/></td>
	</tr>
	<tr><td><label for='txtfecha_registro'>fecha_registro:</label></td>
		<td><input type='text' id='txtfecha_registro' name='txtfecha_registro'  placeholder='Ingrese fecha_registro'/></td>
	</tr>
	<tr><td><label for='txtfecha_culminacion'>fecha_culminacion:</label></td>
		<td><input type='text' id='txtfecha_culminacion' name='txtfecha_culminacion'  placeholder='Ingrese fecha_culminacion'/></td>
	</tr>
	<tr><td><label for='txtid_empleado'>id_empleado:</label></td>
		<td><input type='text' id='txtid_empleado' name='txtid_empleado' maxlength='10' placeholder='Ingrese id_empleado'/></td>
	</tr>
</table>
</center>
<hr class='separator'/>
<div class='formfoot'>
	<input class='btn azul' type='button' name='btnRegistrar' id='btnRegistrar' value='Registrar'/>
	<input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/></td>
</div></div></div>
</form>
<br/>
<script>
$(document).ready(function(e) {
	$('#txtid_usuario').focus();
	$('#btnRegistrar').off('click').click(function(e) {
		var id_usuario = $('#txtid_usuario').val();
		var nombre = $('#txtnombre').val();
		var contrasena = $('#txtcontrasena').val();
		var fecha_registro = getDateYMD($('#txtfecha_registro').val());
		var fecha_culminacion = getDateYMD($('#txtfecha_culminacion').val());
		var id_empleado = $('#txtid_empleado').val();

		$.post('presentation/usuario/proceso/regusuario.php',{
			id_usuario : id_usuario,
			nombre : nombre,
			contrasena : contrasena,
			fecha_registro : fecha_registro,
			fecha_culminacion : fecha_culminacion,
			id_empleado : id_empleado
		},
		function(data) {
			if (data==1){
				alert('Registro correcto');
				volver();
			} else { alert('Error al registrar. ' + data); }
		});
	});
	$('#btnCancelar').click(function(e) {
		volver();
	});
});
function volver() {
	var parent = '<?php echo $parent;?>';
	if (parent=='')
		performLoad('presentation/usuario/usuario.php');
	else
		performLoad('presentation/'+parent);
}
</script>