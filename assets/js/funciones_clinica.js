
var weekday=new Array(7);
weekday[0]="Domingo";
weekday[1]="Lunes";
weekday[2]="Martes";
weekday[3]="Miercoles";
weekday[4]="Jueves";
weekday[5]="Viernes";
weekday[6]="Sabado";




function detalle_asignacion(id){
	url = "../busqueda/buscar_agendaciones_por_id/?id_asignacion="+id;

	$.ajax({url:url,success:function(result){
		swal({
		  title: '<u>Detalle de Bloque Horario</u>',
		  type: 'info',
		  html:
			result

		})
	}});

}

function mis_causas(){
	url = "../busqueda/buscar_mis_causas";
	$("#contenido").empty();
	$.ajax({url:url,success:function(result){
		$( "#contenido" ).append( "<br><h2 class='titulo_fieldset'>MIS CAUSAS</h2><br>" );
		$("#contenido").append(result);

		$('img[title]').qtip();
	}});
}
function form_mantenedor_admin(){
	var url = "../ingreso/configuracion_admin";
	var win = window.open(url, '_blank');
	win.focus();
}

function form_panel(){
	var url = "../panel/cargar";
	$('#dialog').dialog('close');
	$("#contenido").empty();

	$.ajax({url:url,success:function(result){
	$(result).hide().appendTo('#contenido').fadeIn(1000);

	}});
}


function form_mantenedor_profesores(){
	var url = "../ingreso/configuracion_profesores";
	var win = window.open(url, '_blank');
	win.focus();
}

function form_mantenedor_alumnos(){
	var url = "../ingreso/configuracion_alumnos";
	var win = window.open(url, '_blank');
	win.focus();
}


function form_mantenedor_clientes(){
	var url = "../ingreso/configuracion_clientes";
	var win = window.open(url, '_blank');
	win.focus();



}

function form_mantenedor_materias(){
	var url = "../ingreso/configuracion_materias";
	var win = window.open(url, '_blank');
	win.focus();

}

function form_mantenedor_causales(){

	var url = "../ingreso/configuracion_causales";
	var win = window.open(url, '_blank');
	win.focus();

}

function form_mantenedor_privilegios(){

	var url = "../ingreso/configuracion_privilegios";
	var win = window.open(url, '_blank');
	win.focus();

}

function form_mantenedor_sedes(){
	var url = "../ingreso/configuracion_sedes";
	var win = window.open(url, '_blank');
	win.focus();
}

function form_mantenedor_users(){
	var url = "../ingreso/configuracion_users";
	var win = window.open(url, '_blank');
	win.focus();
}



function form_ingreso_orientacion(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../ingreso/orientacion";
	$.ajax({url:url,success:function(result){
	$(result).hide().appendTo('#contenido').fadeIn(1000);
	$("#fecha_orientacion" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
	}});
}

function form_audiencias(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../ingreso/audiencias";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});



}
function form_busqueda(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../busqueda/base";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});
}
function form_busqueda_historica(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../busqueda/historica";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});
}
function form_busqueda_orientacion(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../busqueda/orientacion";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});
}
function form_busqueda_audiencia(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../busqueda/orientacion";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});
}
function horario_personal(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../horario/traer_horario";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
	}});
}

function form_agenda(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../agenda/base";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
		$("#fecha_agenda" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: '',
					onSelect: function(dateText, inst) {
						var date = $(this).datepicker('getDate');
						var dayOfWeek = weekday[date.getUTCDay()];
						cargar_dia(dayOfWeek);
						}
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
		$("#fecha_agenda").datepicker().datepicker("setDate", new Date());
		var date = $('#fecha_agenda').datepicker('getDate');
		var dayOfWeek = weekday[date.getUTCDay()];
		cargar_dia(dayOfWeek);
	}});
}
function buscar_causas(){
	$('#dialog').dialog('close');

	var rol = $('#rol_busqueda').val();
	var abogado = $('#abogado').val();
	var alumno = $('#alumno').val();
	var usuario = $('#usuario').val();
	var tipo_busqueda = $('input[name=tipo_busqueda]:checked').val();
	var vigente = "no";
	if($('#vigentes').is(":checked")){
		vigente= "si";
	}
	$("#resultados_busquedas").empty();
	var url = "../busqueda/buscar_causas/?rol="+rol+"&abogado="+abogado+"&alumno="+alumno+"&usuario="+usuario+"&tipo_busqueda="+tipo_busqueda+"&vigente="+vigente;
		console.log(url);
	$.ajax({url:url,success:function(result){
		$("#resultados_busquedas").html(result);
		$('img[title]').qtip();
	}});
}
function buscar_causas_historicas(){
	$('#dialog').dialog('close');

	var rol = $('#rol_busqueda').val();
	var abogado = $('#abogado').val();
	var alumno = $('#alumno').val();
	var usuario = $('#usuario').val();
	var tipo_busqueda = $('input[name=tipo_busqueda]:checked').val();

	$("#resultados_busquedas").empty();
	var url = "../busqueda/buscar_causas_historicas/?rol="+rol+"&abogado="+abogado+"&alumno="+alumno+"&usuario="+usuario+"&tipo_busqueda="+tipo_busqueda;
		console.log(url);
	$.ajax({url:url,success:function(result){
		$("#resultados_busquedas").html(result);
		$('img[title]').qtip();
	}});
}
function buscar_orientaciones(){
	$('#dialog').dialog('close');

	var abogado = $('#abogado').val();
	var usuario = $('#usuario').val();
	$("#resultados_busquedas").empty();
	var url = "../busqueda/buscar_orientaciones/?abogado="+abogado+"&usuario="+usuario;
		console.log(url);
	$.ajax({url:url,success:function(result){
		$("#resultados_busquedas").html(result);
		$('img[title]').qtip();
	}});
}
function abrir_dialogo(ruta) {
	var link = ruta;
	var vigente = "no";
	if($('#vigentes').is(":checked")){
		link=link+"/si";
	}else{
		link=link+"/no";
	}

	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
		$('img[title]').qtip();
	}});
	$('#dialog').dialog('open');

}

function abrir_dialogo_orientacion(ruta) {
	var link = ruta;
	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
		$('img[title]').qtip();
	}});
	$('#dialog').dialog('open');

}

function abrir_dialogo_audiencia() {
	id_causa = $("#causa_id").html();
	var link = base_url + "index.php/ingreso/form_ingreso_audiencia/?id_causa="+id_causa;
	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
		$('img[title]').qtip();
	}});
	$('#dialog').dialog('open');

}

function abrir_dialogo_audiencia_individual(id_causa) {
	var link = base_url + "index.php/ingreso/form_ingreso_audiencia/?id_causa="+id_causa;
	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}

function dialogo_buscar_usuarios(tipo) {
	var link = base_url + "index.php/busqueda/buscar_usuarios/?tipo=" + tipo;

	if(tipo == 'O'){
		$( "#dialog" ).empty();
		$.ajax({url:link,success:function(result){
			$("#dialog").html(result);
			$("#usuarios").DataTable({
				"bLengthChange": false,
				"pageLength": 5,
				"pagingType": "simple_numbers"
			} );
		}});
		$('#dialog').dialog('open');
	}
	else{
		$( "#dialog2" ).empty();
		$.ajax({url:link,success:function(result){
			$("#dialog2").html(result);
			$("#usuarios").DataTable({
				"bLengthChange": false,
				"pageLength": 5,
				"pagingType": "simple_numbers"
			} );
		}});
		$('#dialog2').dialog('open');
	}
}

function dialogo_buscar_causas_audiencias() {
	var link = base_url + "index.php/busqueda/buscar_causas_audiencias";
	// if($("#id_causa").val() != ''){
		// link = base_url + "index.php/busqueda/buscar_causas_audiencias/id_causa";
	// }
	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
		$("#causas").DataTable({
			"bLengthChange": false,
			"pageLength": 5,
			"pagingType": "simple_numbers"
		} );
	}});
	$('#dialog').dialog('open');
}

function asignar_usuario(rut_cliente, tipo, nombre, telfono, domicilio, email){
	if(tipo == 'O'){
		$('#dialog').dialog('close');

		$('#nombre_usuario').val('');
		$('#rut_usuario').val('');
		$('#telefono').val('');
		$('#domicilio').val('');
		$('#correo_electronico').val('');


		$('#nombre_usuario').val(nombre);
		$('#rut_usuario').val(rut_cliente);
		$('#telefono').val(telfono);
		$('#domicilio').val(domicilio);
		$('#correo_electronico').val(email);
	}
	else{
		$('#dialog2').dialog('close');

		$('#nombre_usuario').val('');
		$('#rut_usuario').val('');
		$('#telefono').val('');
		$('#domicilio').val('');
		$('#correo_electronico').val('');


		$('#nombre_usuario').val(nombre);
		$('#rut_usuario').val(rut_cliente);
		$('#telefono').val(telfono);
		$('#domicilio').val(domicilio);
		$('#correo_electronico').val(email);
	}
}

function trae_audiencias(id_causa){
	$("#id_causa").val(id_causa);
	$("#causa_id").html(id_causa);
	$("#add_audiencia").hide();
	var link = base_url + "index.php/busqueda/buscar_audiencias/?id_causa="+id_causa;
	$('#dialog').dialog('close');
	$.ajax({url:link,success:function(result){
		$("#dialog").empty();
		$("#add_audiencia").show();
		$("#res_audiencia").empty();
		$("#res_audiencia").html(result);
		$("#audiencias").DataTable({
				"pagingType": "simple_numbers"
		});
	}});
}

function trae_audiencias_2(id_causa){

	var link = base_url + "index.php/busqueda/buscar_audiencias/?id_causa="+id_causa;
	$('#dialog').dialog('close');
	$.ajax({url:link,success:function(result){
		$("#dialog").empty();

		$("#dialog").html(result);
		$("#audiencias").DataTable({
				"pagingType": "simple_numbers"
		});
		$('#dialog').dialog('open');
	}});
}

function trae_agendaciones(id_causa){

	var link = base_url + "index.php/busqueda/buscar_agendaciones/?id_causa="+id_causa;
	$('#dialog').dialog('close');
	$.ajax({url:link,success:function(result){
		$("#dialog").empty();

		$("#dialog").html(result);
		$("#agendaciones").DataTable({
				"pagingType": "simple_numbers"
		});
		$('#dialog').dialog('open');
	}});
}

function cambio_estado_agendacion(id_asignacion, id_asunto){
	swal({
	  title: 'Estado para la agendación',
	  input: 'select',
	  inputOptions: {
		'Agendado': 'Agendado',
		'Ausente': 'Ausente',
		'Realizado': 'Realizado'
	  },
	  inputPlaceholder: 'Seleccione un Estado',
	  confirmButtonText: 'Guardar',
	  showLoaderOnConfirm: true,
	  inputValidator: function(value) {
		return new Promise(function(resolve, reject) {
		  if (value === 'Agendado' || value === 'Ausente' || value === 'Realizado') {
			var link = base_url + "index.php/ingreso/update_estado_asignacion/?id_asignacion="+id_asignacion+"&estado="+value;
			$.ajax({url:link,success:function(result){
				resolve();
				trae_agendaciones(id_asunto);
			}});
		  } else {
			reject('Debe seleccionar un estado');
		  }
		});
	  }
	}).then(function(result) {
	  swal({
		type: 'success',
		html: 'Estado: ' + result
	  });
	})
}

function terminar_causa(id_causa, origen){
	var link = base_url + "index.php/busqueda/traer_causales_termino/";

	$.ajax({url:link,success:function(result){
		swal({
		title: 'Terminar Causa: '+id_causa,
		html:
		result,
		preConfirm: function() {
		return new Promise(function(resolve, reject) {

			if ( !($('#causales').val() === "no") ) {
				if( !($('#fecha_termino_causa').val().trim() === "" ) ){
					var link2 = base_url + "index.php/ingreso/update_termino_causa/?id_causa="+id_causa+"&id_causal_termino="+$('#causales').val()+"&fecha_termino="+$('#fecha_termino_causa').val();
					$.ajax({url:link2,success:function(result){
						resolve();
						if(!(origen === 'personal')){
							buscar_causas();
							abrir_dialogo("../busqueda/detalle_causa/"+id_causa);
						} else {
							mis_causas();
						}
					}});
				} else {
					reject('Debe seleccionar una FECHA de TERMINO');
				}
		    } else {
				reject('Debe seleccionar una CAUSAL de TERMINO');
		    }
			  // $('#causales').val(),$('#fecha_termino_causa').val(),
		});
		}
		}).then(function(result) {
		  swal({
			type: 'success',
			html: 'Causa Terminada'
		  });

		})

	}});




}

function abrir_bloque(dia, hora,profesor_a_cargar) {
	var link = base_url + "index.php/agenda/bloque/?dia="+dia+"&hora="+hora+"&profesor_a_cargar="+profesor_a_cargar;
	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}

function abrir_detalle_bloque_individual(dia, hora,profesor_a_cargar) {
	var link = base_url + "index.php/agenda/detalle_bloque_individual/?dia="+dia+"&hora="+hora+"&profesor_a_cargar="+profesor_a_cargar;

	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}
function abrir_detalle_bloque(dia, hora,profesor_a_cargar, tipo) {
	var link = base_url + "index.php/agenda/detalle_bloque/?dia="+dia+"&hora="+hora+"&profesor_a_cargar="+profesor_a_cargar+"&tipo="+tipo;

	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}
function abrir_bloque_nueva_agendacion(dia, hora,profesor_a_cargar, tipo_agendacion) {
var link = base_url + "index.php/agenda/nueva_agendacion/?dia="+dia+"&hora="+hora+"&profesor_a_cargar="+profesor_a_cargar+"&tipo_agendacion="+tipo_agendacion;

	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}

function abrir_bloque_nuevo_asunto(dia, hora,profesor_a_cargar, tipo_agendacion) {
	var link = base_url + "index.php/agenda/nueva_agendacion/?dia="+dia+"&hora="+hora+"&profesor_a_cargar="+profesor_a_cargar+"&tipo_agendacion="+tipo_agendacion;

	$( "#dialog" ).empty();
	$.ajax({url:link,success:function(result){
		$("#dialog").html(result);
	}});
	$('#dialog').dialog('open');

}




function sumar_dia(){

	var date2 = $('#fecha_agenda').datepicker('getDate', '+1d');
	date2.setDate(date2.getDate()+1);
	$('#fecha_agenda').datepicker('setDate', date2);
	var date = $('#fecha_agenda').datepicker('getDate');
	var dayOfWeek = weekday[date.getUTCDay()];
	cargar_dia(dayOfWeek);


}
function restar_dia(){
	var date2 = $('#fecha_agenda').datepicker('getDate', '-1d');
	date2.setDate(date2.getDate()-1);
	$('#fecha_agenda').datepicker('setDate', date2);
	var date = $('#fecha_agenda').datepicker('getDate');
	var dayOfWeek = weekday[date.getUTCDay()];
	cargar_dia(dayOfWeek);

}

function cargar_dia(dia){
	var date2 = $('#fecha_agenda').datepicker('getDate', '-1d');
	var mes = $( "#fecha_agenda" ).datepicker( "option", "monthNames")[$("#fecha_agenda").datepicker('getDate').getMonth()];
	var dia = $( "#fecha_agenda" ).datepicker( "option", "dayNames")[$("#fecha_agenda").datepicker('getDate').getDay()];
	var anio =  date2.getFullYear();
	var dia_nro  = date2.getDate();
	var fecha_en_texto = dia+" "+dia_nro+" de "+mes+", "+anio;
	$('#fecha_agenda_texto').text(fecha_en_texto);
	$("#agenda").empty();
	var url = "../agenda/cargar_dia/?dia="+dia;
	$.ajax({url:url,success:function(result){
		$("#agenda").html(result);
	}});
}

function form_agenda_semanal(dia, profesor){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../agenda/semanal?hoy="+dia+"&profesor="+profesor;
	console.log(url);
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
		$("#fecha_causa" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: '',
					onSelect: function(dateText, inst) {

						}
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

	}});
}

function cargar_calendario_prof_dia(){
						var dia_a_cargar = $( "#fecha_causa" ).val();
						var profesor_a_cargar = $( "#profesor_seleccionado option:selected" ).val();
						form_agenda_semanal(dia_a_cargar,profesor_a_cargar);
}

function eliminar_asignacion(id){
	var ruta = "../ingreso/eliminar_asignacion/?id="+id;
	$.ajax({
				url: ruta,
				success: function (returndata) {
					console.log(returndata);
					if(returndata=="ok"){
						sweetAlert('Éxito!',   'Actualización Exitosa',   'success' );
						var rut = document.getElementById("rut").value;
						selecciona_profesor_asignacion(rut);
					}else if(returndata=="hora"){
						sweetAlert('Oops...', 'Error, Revisar Horas de Configuracion!', 'error');
					}else if(returndata=="fecha"){
						sweetAlert('Oops...', 'Error, Revisar Fechas de Configuracion!', 'error');
					}
				}
				});
	var rut=$('#rut').val();
	selecciona_profesor_asignacion(rut);
}
//inicio seba


function agendar_causa(rut,fecha,id_asunto,hora_inicio,tipo_asunto){
	var tipo = $('#tipo_agendacion').html();
	if(tipo != 'Au'){
		var ruta = "../agenda/agendar_causa/?rut="+rut+"&fecha="+fecha+"&id_asunto="+id_asunto+"&hora_inicio="+hora_inicio+"&tipo_asunto="+tipo_asunto;
		$.ajax({
			url: ruta,
			success: function (returndata) {

					sweetAlert('Éxito!',   'Agendacion Exitosa',   'success' );
					form_agenda_semanal();


			}
			});
	}else{

		var link = base_url + "index.php/agenda/nueva_agendacion/?dia="+fecha+"&hora="+hora_inicio+"&profesor_a_cargar="+rut+"&tipo_agendacion="+tipo+"&causa="+id_asunto;

		$( "#dialog" ).empty();
		$.ajax({url:link,success:function(result){
			$("#dialog").html(result);
		}});
		$('#dialog').dialog('open');
	}


}
function buscar_profesor(){
	var url="../busqueda/resultado_profesor_sede";
	$('#dialog').dialog('close');
	abrir_dialogo2(url);
}

function resultado_busqueda_profesor(){
	var rut=$('#rut_busqueda').val();
	var nombre=$('#nombre_busqueda').val();
	var url="../busqueda/resultado_profesor/?rut="+rut+"&nombre="+nombre;
	$('#dialog').dialog('close');
	abrir_dialogo2(url);
}

function abrir_dialogo2(ruta) {
	console.log(ruta);
	$( "#dialog2" ).empty();
	$.ajax({url:ruta,success:function(result){
		$("#dialog2").html(result);
		$('img[title]').qtip();
	}});
	$('#dialog2').dialog('open');

}

function selecciona_profesor_asignacion(rut){
	$( "#dialog2" ).empty();
	$( "#dialog2" ).dialog('close');
	console.log(rut);
	document.getElementById("rut").value=rut;
	$("#disponibilidad_profesor").empty();
	var url = "../busqueda/disponibilidad_profesor/?rut="+rut;
	console.log(url);
	$.ajax({url:url,success:function(result){
		$("#disponibilidad_profesor").html(result);
	}});

}

function form_mantenedor_1(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../ingreso/mantenedor";
	console.log(url);
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
		$("#fecha_inicio" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: ''
		};
		$("#fecha_termino" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

	}});
}
function ingresar_bloque(){
	$('#dialog').dialog('close');

	var rut = $('#rut').val();
	var fecha_inicio =$('#fecha_inicio').val();
	var fecha_termino = $('#fecha_termino').val();
	var hora_inicio = $('#hora_inicio').val();
	var hora_fin = $('#hora_fin').val();
	var dia = $('#dia').val();
	var ruta = "../ingreso/ingresar_configuracion/?rut="+rut+"&fecha_inicio="+fecha_inicio+"&fecha_termino="+fecha_termino+"&hora_inicio="+hora_inicio+"&hora_termino="+hora_fin+"&dia="+dia;
	$.ajax({
				url: ruta,
				success: function (returndata) {

					if(returndata=="ok"){
						sweetAlert('Éxito!',   'Actualización Exitosa',   'success' );
						var rut = document.getElementById("rut").value;
						selecciona_profesor_asignacion(rut);
					}else if(returndata=="hora"){
						sweetAlert('Oops...', 'Error, Revisar Horas de Configuracion!', 'error');
					}else if(returndata=="fecha"){
						sweetAlert('Oops...', 'Error, Revisar Fechas de Configuracion!', 'error');
					}else{
						sweetAlert('Éxito!',   'Actualización Exitosa',   'success' );
						var rut = document.getElementById("rut").value;
						selecciona_profesor_asignacion(rut);
					}
				}
	});

}

function ingresar_causa(){
	$('#dialog').dialog('close');
	var id = $('#id_causa').val();
	var materia = $('#materia').val();
	var fecha = $('#fecha_causa_ingreso').val();
	var abogado =$('#list_abogados').val();
	var alumno = $('#list_alumnos').val();
	var usuario = $('#rut_usuario').val();
	var hora = $('#set_hora').val();
	var dv = usuario.split("-");
	usuario=dv[0];
	var dv=dv[1];
	var nombre_usuario = $('#nombre_usuario').val();
	var telefono = $('#telefono').val();
	var domicilio = $('#domicilio').val();
	var email = $('#email').val();
	var ruta = "../ingreso/ingresar_causa/?id="+id+"&materia="+materia+"&fecha="+fecha+"&abogado="+abogado+"&alumno="+alumno+"&usuario="+usuario+"&nombre_usuario="+nombre_usuario+"&telefono="+telefono+"&domicilio="+domicilio+"&email="+email+"&dv="+dv;
	console.log(ruta);


	$.ajax({
				url: ruta,
				success: function (returndata) {
					agendar_causa(abogado,fecha,id,hora,'causa');
					sweetAlert('Éxito!',   'Causa Agendada Exitosamente',   'success' );


				}
				});


}

function ingresar_asunto(tipo){
	$('#dialog').dialog('close');

	var nombre_asunto = $('#nombre_asunto').val();
	var descripcion_asunto = $('#descripcion_asunto').val();
	var abogado =$('#list_abogados').val();
	var fecha_ingreso = $('#fecha_ingreso').val();
	var set_hora = $('#set_hora').val();
	var causa = "";
	if(tipo != 'As'){
		causa = $('#causa_audiencia').html();
	}
	var ruta =  "../ingreso/ingresar_asunto/?nombre_asunto="+nombre_asunto+"&descripcion_asunto="+descripcion_asunto+
										"&abogado="+abogado+"&fecha="+fecha_ingreso+"&hora="+set_hora+"&tipo="+tipo+"&causa="+causa;
	$.ajax({
		url: ruta,
		success: function (returndata) {

			//TODO: Verificar insert y arreglar returndata
			if(tipo != 'Au'){
				sweetAlert('Éxito!',   'Asunto Agendado Exitosamente',   'success' );
			}else{
				sweetAlert('Éxito!',   'Audiencia Agendada Exitosamente',   'success' );
			}
			form_agenda_semanal();


		}
		});
}

function ingresar_orientacion(){
	$('#dialog').dialog('close');
	var materia = $('#materia').val();
	var fecha = $('#fecha_orientacion').val();
	var usuario = $('#rut_usuario').val();
	var dv = usuario.split("-");
	usuario=dv[0];
	var dv=dv[1];
	var nombre_usuario = $('#nombre_usuario').val();
	var telefono = $('#telefono').val();
	var domicilio = $('#domicilio').val('');
	var email = $('#correo_electronico').val();
	var resena = $('#resena').val();
	var ruta = "../ingreso/ingresar_orientacion/?materia="+materia+"&resena="+resena+"&fecha="+fecha+"&usuario="+usuario+"&nombre_usuario="+nombre_usuario+"&telefono="+telefono+"&domicilio="+domicilio+"&email="+email+"&dv="+dv;
	console.log(ruta);
	$.ajax({
				url: ruta,
				success: function (returndata) {

						sweetAlert('Éxito!',   'Orientacion Ingresada Exitosamente',   'success' );

				}
				});

}

function form_ingreso_causa(){
	$('#dialog').dialog('close');
	$("#contenido").empty();
	var url = "../ingreso/causa";
	$.ajax({url:url,success:function(result){
		$(result).hide().appendTo('#contenido').fadeIn(1000);
		$("#fecha_causa" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
	}});
}
//fin seba


function cerrar_sesion(){

	window.location.href = base_url + "index.php/menu/cerrar_sesion";
}

function add_audiencia(){

	var id_causa = $("#causa_audiencia").html();
	var tipo_audiencia = $("#tipo_audiencia").val();
	var descripcion = $("#descripcion").val();
	var nota_audiencia = $("#nota_audiencia").val();
	var rut_alumno = $("#rut_alumno").val();
	var rut_profesor = $("#rut_profesor").val();
	var fecha_audiencia = $("#fecha_audiencia").val();
	var hora_audiencia = $("#hora_audiencia").val();

	var nota_registro_1     = $("#nota_registro_1").val();
	var nota_registro_2     = $("#nota_registro_2").val();
	var nota_registro_3     = $("#nota_registro_3").val();
	var nota_registro_otros = $("#nota_registro_otros").val();
	var nota_destreza_1     = $("#nota_destreza_1").val();
	var nota_destreza_2     = $("#nota_destreza_2").val();
	var nota_destreza_3     = $("#nota_destreza_3").val();
	var nota_destreza_4     = $("#nota_destreza_4").val();
	var nota_destreza_5     = $("#nota_destreza_5").val();
	var nota_destreza_6     = $("#nota_destreza_6").val();
	var nota_destreza_7     = $("#nota_destreza_7").val();
	var nota_destreza_8     = $("#nota_destreza_8").val();
	var nota_destreza_9     = $("#nota_destreza_9").val();
	var nota_destreza_10    = $("#nota_destreza_10").val();
	var nota_destreza_11    = $("#nota_destreza_11").val();
	var nota_destreza_12    = $("#nota_destreza_12").val();
	var nota_item_3         = $("#nota_item_3").val();

	var url = base_url + "index.php/ingreso/ingresar_audiencia/?id_causa="+id_causa+"&tipo_audiencia="+tipo_audiencia+
	"&descripcion="+descripcion+"&rut_alumno="+rut_alumno+"&rut_profesor="+rut_profesor+"&nota_registro_1="+nota_registro_1+
	"&nota_registro_2="+nota_registro_2+"&nota_registro_3="+nota_registro_3+"&nota_registro_otros="+nota_registro_otros+
	"&nota_destreza_1="+nota_destreza_1+"&nota_destreza_2="+nota_destreza_2+"&nota_destreza_3="+nota_destreza_3+
	"&nota_destreza_4="+nota_destreza_4+"&nota_destreza_5="+nota_destreza_5+"&nota_destreza_6="+nota_destreza_6+
	"&nota_destreza_7="+nota_destreza_7+"&nota_destreza_8="+nota_destreza_8+"&nota_destreza_9="+nota_destreza_9+
	"&nota_destreza_10="+nota_destreza_10+"&nota_destreza_11="+nota_destreza_11+"&nota_destreza_12="+nota_destreza_12+
	"&nota_item_3="+nota_item_3+"&fecha_audiencia="+fecha_audiencia+"&hora_audiencia="+hora_audiencia;

	$.ajax({url:url,success:function(result){
		$('#dialog').dialog('close');
		$("#dialog").empty();

		$("#id_causa").val(id_causa);
		$("#causa_id").html(id_causa);
		$("#add_audiencia").hide();
		$("#add_audiencia").show();
		$("#res_audiencia").empty();
		$("#res_audiencia").html(result);
		$("#audiencias").DataTable({
				"pagingType": "simple_numbers"
		});
	}});
}

function ver_audiencia(id_audiencia) {
	$( "#dialog2" ).empty();
	var ruta = base_url + "index.php/busqueda/buscar_audiencia_id/?id_audiencia="+id_audiencia;
	$.ajax({url:ruta,success:function(result){
		$("#dialog2").html(result);
		$('img[title]').qtip();
	}});
	$('#dialog2').dialog('open');

}


function eliminar_agendacion(id_agendacion){
	var id_login = document.getElementById("user_logeado").value;
	swal({
	  title: 'Escriba un motivo para la eliminacion',
	  input: 'select',
	  inputOptions: {
		'mal_asignado': 'La cita se encontraba mal agendada',
		'reagendar': 'La cita se cambiara de fecha/hora',
		'cancelacion': 'El cliente cancelo la cita',
		'otro': 'Otro motivo'
	  },
	  inputPlaceholder: 'Seleccione un Motivo',
	  confirmButtonText: 'Guardar',
	  showLoaderOnConfirm: true,
	  inputValidator: function(value) {
		return new Promise(function(resolve, reject) {
		  if (value === 'mal_asignado' || value === 'reagendar' || value === 'cancelacion' || value === 'otro') {
			var link = base_url + "index.php/agenda/eliminar_agendacion/?id_agendacion="+id_agendacion+"&motivo="+value+"&quien_elimina="+id_login;
			console.log(link);
			$.ajax({url:link,success:function(result){
				resolve();
				form_agenda_semanal();
			}});
		  } else {
			reject('Debe seleccionar un motivo');
		  }
		});
	  }
	}).then(function(result) {
	  swal({
		type: 'success',
		html: 'Actualizacion Completa: '
	  });
	})
}



function cambiar_sede(rut){
	var link = base_url + "index.php/busqueda/traer_sedes";
	var sede ="";
	$.ajax({url:link,success:function(result){
		swal({
		title: 'Seleccione Sede: ',
		html:
		result,
		preConfirm: function() {
		return new Promise(function(resolve, reject) {

			if ( !($('#sedes').val() === "no") ) {
					var link2 = base_url + "index.php/ingreso/update_sede_actual/?sede_seleccionada="+$('#sedes').val();
					sede = $("#sedes option:selected").text();
					$.ajax({url:link2,success:function(result){
						resolve();

							//buscar_causas();
							//abrir_dialogo("../busqueda/detalle_causa/"+id_causa);

					}});

		    } else {
				reject('Debe seleccionar una Sede');
		    }
			  // $('#causales').val(),$('#fecha_termino_causa').val(),
		});
		}
		}).then(function(result) {
			$("#sede_act").empty();
			$("#sede_act").append(sede);
		  swal({
			type: 'success',
			html: 'Sede Actual Cambiada'
		  });
		  var url = "../menu/slider";
			$('#dialog').dialog('close');
			$("#contenido").empty();

			$.ajax({url:url,success:function(result){
			$(result).hide().appendTo('#contenido').fadeIn(1000);

			}});

		})

	}});




}


function sliderInit( args ) {
			}
			/**
			 * When individual slides are loaded
			 * @param {object} args the slides, callback, and config of the slider
			 * @return null
			 */
			function slideLoaded( args ) {
			}
			/**
			 * When the full slider is loaded, after the DOM is manipulated
			 * @param {object} args the slides, callback, and config of the slider
			 * @return null
			 */
			function sliderLoaded( args ) {
			}
			/**
			 * Before the slides change focal points
			 * @param {object} args the slides, callback, and config of the slider
			 * @return null
			 */
			function slideStart( args ) {
			}
			/**
			 * After the slides are done changing focal points
			 * @param {object} args the slides, callback, and config of the slider
			 * @return null
			 */
			function slideComplete( args ) {
			}
