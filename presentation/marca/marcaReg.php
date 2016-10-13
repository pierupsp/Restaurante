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
	$_SESSION['pagina'] = 'presentation/marca/marcaReg.php';
	$parent = '';
	if(isset($_GET['parent'])){
		$_SESSION['mcreg.parent'] = $parent = $_GET['parent'];
	} elseif (isset($_SESSION['mcreg.parent'])) {
		$parent = $_SESSION['mcreg.parent'];
	}
?>
<form name='frmmarcaReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Registrar marca</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>Nombre:</label></td>
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

		$.post('presentation/marca/proceso/regmarca.php',{
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
		performLoad('presentation/marca/marca.php');
	else
		performLoad('presentation/'+parent);
}
</script>