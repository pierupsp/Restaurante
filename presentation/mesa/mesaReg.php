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
	$_SESSION['pagina'] = 'presentation/mesa/mesaReg.php';
	$parent = '';
	if(isset($_GET['parent'])){
		$_SESSION['msreg.parent'] = $parent = $_GET['parent'];
	} elseif (isset($_SESSION['msreg.parent'])) {
		$parent = $_SESSION['msreg.parent'];
	}
?>
<?php
    include_once '../../data/tipo_mesaDAL.php';
    $dal_tms = new tipo_mesaDAL();
    $tms_rs = $dal_tms->getFullList();
?>
<form name='frmmesaReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Registrar mesa</h1>
</div>
<hr class='separator'/>
<center>
<table>
    <tr><td><label for='txtid_tipomesa'>Tipo mesa:</label></td>
        <td><select id='txtid_tipomesa' name='txtid_tipomesa'>
                <?php if($tms_rs) while ($tms_row = mysqli_fetch_assoc($tms_rs)) { ?>
                    <option value='<?php echo $tms_row['id_tipomesa']; ?>'>
                        <?php echo $tms_row['nombre'];  ?>
                    </option>
                <?php } ?>
            </select>
        </td>
    </tr>
	<tr><td><label for='txtnro_mesa'>Número :</label></td>
		<td><input type='text' id='txtnro_mesa' name='txtnro_mesa' maxlength='20' placeholder='Ingrese nro mesa'/></td>
	</tr>
	<tr><td><label for='txtubicacion'>Ubicación:</label></td>
		<td><input type='text' id='txtubicacion' name='txtubicacion' maxlength='20' placeholder='Ingrese ubicacion'/></td>
	</tr>
</table>
</center>
<hr class='separator'/>
<div class='formfoot'>
	<input class='btn azul' type='button' name='btnRegistrar' id='btnRegistrar' value='Registrar'/>
	<input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/>
</div></div></div>
</form>
<br/>
<script>
$(document).ready(function(e) {
	$('#txtid_tipomesa').focus();
	$('#btnRegistrar').off('click').click(function(e) {
		var id_tipomesa = $('#txtid_tipomesa').val();
		var nro_mesa = $('#txtnro_mesa').val();
		var ubicacion = $('#txtubicacion').val();

		$.post('presentation/mesa/proceso/regmesa.php',{
			id_tipomesa : id_tipomesa,
			nro_mesa : nro_mesa,
			ubicacion : ubicacion
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
		performLoad('presentation/mesa/mesa.php');
	else
		performLoad('presentation/'+parent);
}
</script>