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
	include_once '../../data/productoDAL.php';
	$dal_pro = new productoDAL();
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$pro_rs = $dal_pro->get($id);
		if ($pro_rs) { $row = mysqli_fetch_assoc($pro_rs); }
	}
	$_SESSION['pagina'] = "presentation/producto/productoUpd.php?id=$id";
?>
<?php
    include_once '../../data/tipo_productoDAL.php';
    $dal_tpro = new tipo_productoDAL();
    $tpro_rs = $dal_tpro->getFullList();
?>
<?php
    include_once '../../data/marcaDAL.php';
    $dal_mc = new marcaDAL();
    $mc_rs = $dal_mc->getFullList();
?>
<form name='frmproductoUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
	<h1>Editar producto</h1>
</div>
<hr class='separator'/>
<center>
<table>
	<tr><td><label for='txtnombre'>Nombre:</label></td>
		<td><input type='text' id='txtnombre' name='txtnombre' value='<?php if($id) { echo htmlspecialchars($row['nombre']); } ?>' maxlength='50' placeholder='Ingrese nombre'/></td>
	</tr>
    <tr><td><label for='txtid_tipoproducto'>Tipo:</label></td>
        <td><select id='txtid_tipoproducto' name='txtid_tipoproducto'>
                <?php if($tpro_rs) while ($tpro_row = mysqli_fetch_assoc($tpro_rs)) { ?>
                    <option value='<?php echo $tpro_row['id_tipoproducto']; ?>' <?php if($row['id_tipoproducto'] == $tpro_row['id_tipoproducto']) { echo 'selected'; } ?>>
                        <?php echo $tpro_row['nombre'];  ?>
                    </option>
                <?php } ?>
            </select>
        </td>
    </tr>

    <tr><td><label for='txtid_marca'>Marca:</label></td>
        <td><select id='txtid_marca' name='txtid_marca'>
                <?php if($mc_rs) while ($mc_row = mysqli_fetch_assoc($mc_rs)) { ?>
                    <option value='<?php echo $mc_row['id_marca']; ?>' <?php if($row['id_marca'] == $mc_row['id_marca']) { echo 'selected'; } ?>>
                        <?php echo $mc_row['nombre'];  ?>
                    </option>
                <?php } ?>
            </select>
        </td>
    </tr>
	<tr><td><label for='txtprecio'>Precio:</label></td>
		<td><input type='text' id='txtprecio' name='txtprecio' value='<?php if($id) { echo $row['precio']; } ?>'  placeholder='Ingrese precio'/></td>
	</tr>
	<tr><td><label for='txtstock'>Stock:</label></td>
		<td><input type='text' id='txtstock' name='txtstock' value='<?php if($id) { echo $row['stock']; } ?>' maxlength='10' placeholder='Ingrese stock'/></td>
	</tr>
	<tr hidden><td><label for='txtestado'>estado:</label></td>
		<td><input type='text' id='txtestado' name='txtestado' value='<?php if($id) { echo $row['estado']; } ?>'  placeholder='Ingrese estado'/></td>
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
		var id_producto = '<?php echo $id; ?>';
		var nombre = $('#txtnombre').val();
		var id_tipoproducto = $('#txtid_tipoproducto').val();
		var id_marca = $('#txtid_marca').val();
		var precio = $('#txtprecio').val();
		var stock = $('#txtstock').val();
		var estado = $('#txtestado').val();

		$.post('presentation/producto/proceso/updproducto.php',{
			id_producto : id_producto,
			nombre : nombre,
			id_tipoproducto : id_tipoproducto,
			id_marca : id_marca,
			precio : precio,
			stock : stock,
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
	performLoad('presentation/producto/producto.php');
}
</script>