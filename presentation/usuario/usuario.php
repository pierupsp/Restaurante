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
	$_SESSION['pagina'] = 'presentation/usuario/usuario.php';
?>
<div class='listform'>
<div class='listform-body'>
<center>
<div class='formtop'>
	<h1 class='center'>Usuario</h1>
	<hr class='separator'/>
	<label for='txtBuscar'>Buscar:</label>
	<input type='text' id='txtBuscar' name='txtBuscar' placeholder='Ingrese búsqueda' />
	<a href='#' class='btn' id='btnRefrescar' name='btnRefrescar'>
		<img class='icon' src='site/img/refresh.png'></a>
	<a href='#' class='btn azul' id='btnNuevo' name='btnNuevo'>Nuevo</a>
</div>
</center>
<hr class='separator'/>
<div id='datos'></div></div>
</div>
<script>
$(document).ready(function(e) {
	mostrarDatos();
	$('#txtBuscar').focus();
	$('#txtBuscar').keyup(function(e) {
		mostrarDatos();
	});
	$('#btnNuevo').off('click').click(function(e) {
		performLoad('presentation/usuario/usuarioReg.php?parent=usuario/usuario.php');
	});
	$('#btnRefrescar').off('click').click(function(e) {
		mostrarDatos();
	});
});
function mostrarDatos() {
	$('#datos').load('presentation/usuario/usuarioList.php?b='+encodeURIComponent($('#txtBuscar').val()));
}
function volver() {
	performLoad('presentation/usuario/usuario.php');
}
</script>