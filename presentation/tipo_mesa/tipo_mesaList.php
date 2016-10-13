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
	include_once '../../data/tipo_mesaDAL.php';
	$dal_tms = new tipo_mesaDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $tms_rs = $dal_tms->search($b); }
	else { $tms_rs = $dal_tms->getList(); }
?>
<table id='tbltipo_mesa' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>Nombre</th>
		<th hidden>estado</th>
		<th>Editar</th>
	</tr>
	<?php if($tms_rs) while ($row = mysqli_fetch_assoc($tms_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_tipomesa']); ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td hidden><?php echo $row['estado']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_tipomesa']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/tipo_mesa/tipo_mesaUpd.php?id='+id);
	}
</script>