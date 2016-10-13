function performLoad(pagina) {
    $('#contenido').load(pagina);
}

function getDateYMD(ddmmyy){
    if (ddmmyy!='') {
        var parts = ddmmyy.split("/");
        var ymd  = parts[2]+'-'+parts[1]+'-'+parts[0];
        return ymd;
    } else { return '';}
}

$.datepicker.regional['es'] = {
    prevText: '',
    nextText: '',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$.datepicker._gotoToday = function(id) {
    $(id).datepicker('setDate', new Date()).datepicker('hide').blur();
};
