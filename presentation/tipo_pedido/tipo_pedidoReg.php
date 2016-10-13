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
	$_SESSION['pagina'] = 'presentation/tipo_pedido/tipo_pedidoReg.php';
	$parent = '';
	if(isset($_GET['parent'])){
		$_SESSION['tpdreg.parent'] = $parent = $_GET['parent'];
	} elseif (isset($_SESSION['tpdreg.parent'])) {
		$parent = $_SESSION['tpdreg.parent'];
	}
?>
<form name='frmtipo_pedidoReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Registrar tipo_pedido</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtdescripcion'>descripcion:</label></td>
		<td><input type='text' id='txtdescripcion' name='txtdescripcion' maxlength='20' placeholder='Ingrese descripcion'/></td>
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
	$('#txtdescripcion').focus();
	$('#btnRegistrar').off('click').click(function(e) {
		var descripcion = $('#txtdescripcion').val();

		$.post('presentation/tipo_pedido/proceso/regtipo_pedido.php',{
			descripcion : descripcion
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
		performLoad('presentation/tipo_pedido/tipo_pedido.php');
	else
		performLoad('presentation/'+parent);
}
</script>