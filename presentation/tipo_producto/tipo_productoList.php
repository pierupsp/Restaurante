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
	include_once '../../data/tipo_productoDAL.php';
	$dal_tpro = new tipo_productoDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $tpro_rs = $dal_tpro->search($b); }
	else { $tpro_rs = $dal_tpro->getList(); }
?>
<table id='tbltipo_producto' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>nombre</th>
		<th>Editar</th>
	</tr>
	<?php if($tpro_rs) while ($row = mysqli_fetch_assoc($tpro_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_tipoproducto']); ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_tipoproducto']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/tipo_producto/tipo_productoUpd.php?id='+id);
	}
</script>