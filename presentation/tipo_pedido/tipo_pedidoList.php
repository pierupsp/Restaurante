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
	include_once '../../data/tipo_pedidoDAL.php';
	$dal_tpd = new tipo_pedidoDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $tpd_rs = $dal_tpd->search($b); }
	else { $tpd_rs = $dal_tpd->getList(); }
?>
<table id='tbltipo_pedido' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>descripcion</th>
		<th>Editar</th>
	</tr>
	<?php if($tpd_rs) while ($row = mysqli_fetch_assoc($tpd_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_tipopedido']); ?></td>
		<td><?php echo $row['descripcion']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_tipopedido']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/tipo_pedido/tipo_pedidoUpd.php?id='+id);
	}
</script>