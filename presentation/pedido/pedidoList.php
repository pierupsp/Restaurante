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
	include_once '../../data/pedidoDAL.php';
	$dal_pd = new pedidoDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $pd_rs = $dal_pd->search($b); }
	else { $pd_rs = $dal_pd->getList(); }
?>
<table id='tblpedido' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>Fecha reserva</th>
		<th>Monto</th>
		<th>Adeudo</th>
		<th hidden>estado</th>
		<th>Fecha registro</th>
		<th>Tipo pedido</th>
		<th>Cliente</th>
		<th>Editar</th>
	</tr>
	<?php if($pd_rs) while ($row = mysqli_fetch_assoc($pd_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_pedido']); ?></td>
		<td class='center'><?php echo formatDate($row['fecha_reserva']); ?></td>
		<td class='right'> <?php echo $row['importe']; ?></td>
		<td class='right'> <?php echo $row['adeudo']; ?></td>
		<td hidden><?php echo $row['estado']; ?></td>
		<td class='center'><?php echo formatDate($row['fecha_registro']); ?></td>

		<td><?php echo $row['tpd_descripcion']; ?></td>
		<td><?php echo "$row[cli_nombre] $row[cli_ap_paterno] $row[cli_ap_materno]"; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_pedido']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/pedido/pedidoUpd.php?id='+id);
	}
</script>