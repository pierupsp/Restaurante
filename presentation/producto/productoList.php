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
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $pro_rs = $dal_pro->search($b); }
	else { $pro_rs = $dal_pro->getList(); }
?>
<table id='tblproducto' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>Nombre</th>
		<th>Tipo</th>
		<th>Marca</th>
		<th>Precio</th>
		<th>Stock</th>
		<th hidden>estado</th>
		<th>Editar</th>
	</tr>
	<?php if($pro_rs) while ($row = mysqli_fetch_assoc($pro_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_producto']); ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['id_tipoproducto']; ?></td>
		<td><?php echo $row['id_marca']; ?></td>
		<td><?php echo $row['precio']; ?></td>
		<td><?php echo $row['stock']; ?></td>
		<td hidden><?php echo $row['estado']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_producto']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/producto/productoUpd.php?id='+id);
	}
</script>