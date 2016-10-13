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
	$_SESSION['pagina'] = 'presentation/marca/marca.php';
?>
<div class='listform'>
<div class='listform-body'>
<center>
<div class='formtop'>
	<h1 class='center'>Marca</h1>
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
		performLoad('presentation/marca/marcaReg.php?parent=marca/marca.php');
	});
	$('#btnRefrescar').off('click').click(function(e) {
		mostrarDatos();
	});
});
function mostrarDatos() {
	$('#datos').load('presentation/marca/marcaList.php?b='+encodeURIComponent($('#txtBuscar').val()));
}
function volver() {
	performLoad('presentation/marca/marca.php');
}
</script>