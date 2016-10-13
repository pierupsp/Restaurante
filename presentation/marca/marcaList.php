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
	include_once '../../data/marcaDAL.php';
	$dal_mc = new marcaDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $mc_rs = $dal_mc->search($b); }
	else { $mc_rs = $dal_mc->getList(); }
?>
<table id='tblmarca' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>Nombre</th>
		<th>Editar</th>
	</tr>
	<?php if($mc_rs) while ($row = mysqli_fetch_assoc($mc_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_marca']); ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_marca']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/marca/marcaUpd.php?id='+id);
	}
</script>