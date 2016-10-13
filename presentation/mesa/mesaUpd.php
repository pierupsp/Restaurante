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
	include_once '../../data/mesaDAL.php';
	$dal_ms = new mesaDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$ms_rs = $dal_ms->get($id);
		if ($ms_rs) { $row = mysqli_fetch_assoc($ms_rs); }
	}
	$_SESSION['pagina'] = "presentation/mesa/mesaUpd.php?id=$id";
?>
<?php
    include_once '../../data/tipo_mesaDAL.php';
    $dal_tms = new tipo_mesaDAL();
    $tms_rs = $dal_tms->getFullList();
?>
<form name='frmmesaUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar mesa</h1>
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
	<tr><td><label for='txtnro_mesa'>nro_mesa:</label></td>
		<td><input type='text' id='txtnro_mesa' name='txtnro_mesa' value='<?php if($id) { echo htmlspecialchars($row['nro_mesa']); } ?>' maxlength='20' placeholder='Ingrese nro_mesa'/></td>
	</tr>
	<tr><td><label for='txtubicacion'>ubicacion:</label></td>
		<td><input type='text' id='txtubicacion' name='txtubicacion' value='<?php if($id) { echo htmlspecialchars($row['ubicacion']); } ?>' maxlength='20' placeholder='Ingrese ubicacion'/></td>
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
	$('#txtid_tipomesa').focus();
	$('#btnActualizar').off('click').click(function(e) {
		var id_mesa = '<?php echo $id; ?>';
		var id_tipomesa = $('#txtid_tipomesa').val();
		var nro_mesa = $('#txtnro_mesa').val();
		var ubicacion = $('#txtubicacion').val();
		var estado = $('#txtestado').val();

		$.post('presentation/mesa/proceso/updmesa.php',{
			id_mesa : id_mesa,
			id_tipomesa : id_tipomesa,
			nro_mesa : nro_mesa,
			ubicacion : ubicacion,
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
	performLoad('presentation/mesa/mesa.php');
}
</script>