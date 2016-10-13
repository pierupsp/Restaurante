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
	include_once '../../data/usuarioDAL.php';
	$dal_usu = new usuarioDAL();
	$b = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
	if ($b!='') { $usu_rs = $dal_usu->search($b); }
	else { $usu_rs = $dal_usu->getList(); }
?>
<table id='tblusuario' class='datatable'>
	<tr>
		<th>Cód</th>
		<th>nombre</th>
		<th>contrasena</th>
		<th hidden>estado</th>
		<th>fecha_registro</th>
		<th>fecha_culminacion</th>
		<th>id_empleado</th>
		<th>Editar</th>
	</tr>
	<?php if($usu_rs) while ($row = mysqli_fetch_assoc($usu_rs)) { ?>
	<tr>
		<td class='center'><?php echo pad($row['id_usuario']); ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['contrasena']; ?></td>
		<td hidden><?php echo $row['estado']; ?></td>
		<td class='center'><?php echo formatDate($row['fecha_registro']); ?></td>
		<td class='center'><?php echo formatDate($row['fecha_culminacion']); ?></td>
		<td><?php echo $row['id_empleado']; ?></td>
		<td class='center'><a href='#' onclick="editar(<?php echo $row['id_usuario']; ?>);">Editar</a></td>
	</tr>
	<?php } ?>
</table>
<script>
	function editar(id) {
		performLoad('presentation/usuario/usuarioUpd.php?id='+id);
	}
</script>