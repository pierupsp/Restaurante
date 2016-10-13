<?php
// Funciones de fecha
function formatDate($date) {
	if ($date!='0000-00-00 00:00:00' && $date != NULL) {
		$newdate = new DateTime($date); 
		return date_format($newdate, 'd/m/Y');
	}
	else { return ''; }
}
function formatDateAM($date) {
	if ($date!='0000-00-00 00:00:00' && $date != NULL) {
		$newdate = new DateTime($date); 
		return date_format($newdate, 'd/m/Y (h:i a)');
	}
	else { return ''; }
}
function formatYMD($date) {
	if ($date!='0000-00-00 00:00:00') {
		$newdate = new DateTime($date); 
		return date_format($newdate, 'Y-m-d');
	}
	else { return ''; }
}
// Funciones de texto
function pad($val, $n=3){
	return str_pad($val, $n, '0', STR_PAD_LEFT);
}
// Funciones numericas
function nformat($value, $d=0){
	return number_format($value, $d, '.', '');
}
?>