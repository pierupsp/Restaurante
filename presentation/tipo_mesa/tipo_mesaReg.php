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
	$_SESSION['pagina'] = 'presentation/tipo_mesa/tipo_mesaReg.php';
	$parent = '';
	if(isset($_GET['parent'])){
		$_SESSION['tmsreg.parent'] = $parent = $_GET['parent'];
	} elseif (isset($_SESSION['tmsreg.parent'])) {
		$parent = $_SESSION['tmsreg.parent'];
	}
?>
<form name='frmtipo_mesaReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Registrar tipo mesa</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' maxlength='20' placeholder='Ingrese nombre'/></td>
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
	$('#txtnombre').focus();
	$('#btnRegistrar').off('click').click(function(e) {
		var nombre = $('#txtnombre').val();

		$.post('presentation/tipo_mesa/proceso/regtipo_mesa.php',{
			nombre : nombre
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
		performLoad('presentation/tipo_mesa/tipo_mesa.php');
	else
		performLoad('presentation/'+parent);
}
</script>