//inicio asociacion
function asociar_documento_persona(rol){	
	$("#contenido").empty();	
	var url = "form_asociar_documento.php?rol="+rol;				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function ver_relaciones(rol){	
	$.ajax({
					url: 'accion/ver_relaciones.php',
					type: 'POST',
					data: {'rol': rol},
					success: function (returndata) {						
						swal({   
						width: 900,
						title: 'Patentes Relacionadas Rol-'+rol,
						html:  returndata });
					}
			});
	
}

function ver_relaciones_2(){
	var rol = document.getElementById("rol_patente").value;
	$.ajax({
					url: 'accion/ver_relaciones.php',
					type: 'POST',
					data: {'rol': rol},
					success: function (returndata) {						
						swal({   
						width: 900,
						title: 'Patentes Relacionadas Rol-'+rol,
						html:  returndata });
					}
			});
	
}
//fin asociacion
//interfaz rol
	function consulta_rol_interfaz(){
		var rol=document.getElementById("rol_consultado").value;
		var url = "contenido_interfaz_rol.php?rol="+rol;	
	}
//fin interfaz rol
function selecciona_sociedad(rut){
	document.getElementById("sociedad").value = rut;
	$('#dialog').dialog('close');	
	$("#socios_sociedad").empty();	
	var url = "socios_sociedad.php?rut="+rut;				
	$.ajax({url:url,success:function(result){	
	$("#socios_sociedad").html(result);	
	$('#tabla_asociados').DataTable();	
	}});
}
function selecciona_patente(rol,tipo,subtipo,razon_social,tipo2){
	if(tipo==1){
		document.getElementById("rol").value = rol;
		$('#dialog').dialog('close');
		
	}else{
		document.getElementById("rol_patente").value = rol;
		document.getElementById("tipo_patente").value = tipo;
		document.getElementById("subtipo_patente").value = subtipo;
		document.getElementById("razon_social").value = razon_social;
		$("#informacion_pat_seleccionada").show();
		var url = "socios_patente.php?rol="+rol;	
		$('#dialog').dialog('close');
		$("#socios_patente").empty();				
		$.ajax({url:url,success:function(result){	
		$("#socios_patente").html(result);		
		}});
	}
	
	
}
function selecciona_patente_1(rol){
	document.getElementById("rol").value = rol;
	$('#dialog').dialog('close');
	
}
function selecciona_patente_2(rol){
	document.getElementById("rol2").value = rol;
	$('#dialog').dialog('close');
	
}


function selecciona_asociado(rut){
	document.getElementById("asociado").value = rut;
	$('#dialog').dialog('close');	
}

function form_agregar_persona(rut){	
	$('#dialog').dialog('close');
	$("#contenido").empty();	
	var url = "form_agregar_persona.php?rut="+rut;				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function form_agregar_sociedad(rut){
	$('#dialog').dialog('close');		
	$("#contenido").empty();	
	var url = "form_agregar_sociedad.php?rut="+rut;				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function form_agregar_patente(){	
	$("#contenido").empty();	
	var url = "form_agregar_patente.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function form_agregar_contribuyente_sociedad(){	
	$("#contenido").empty();	
	var url = "form_agregar_contribuyente_sociedad.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function form_mantenedor_global(){	
	$("#contenido").empty();	
	var url = "forms/form_mantenedor_global.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
	setTimeout(function(){
		 document.getElementById("rol_busqueda").focus();
	}, 500);
	
}
function form_agregar_patente_socios(){	
	$("#contenido").empty();	
	var url = "form_agregar_patente_socios.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function form_modificar_documentos(){	
	$("#contenido").empty();	
	var url = "forms/form_modificar_documentos.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function form_asociar_patente(){	
	$("#contenido").empty();	
	var url = "forms/form_asociar_patente.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function form_agregar_documento(){	
	$("#contenido").empty();	
	var url = "forms/form_agregar_documento.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}
function form_agregar_documento_preload(rol){	
	var url = "forms/form_agregar_documento.php?preload="+rol;
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function form_requisitos(){	
	$("#contenido").empty();	
	var url = "form_requisitos.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function abrir_dialogo(ruta) {
	var link = ruta;
	$( "#dialog" ).empty();	
	$.ajax({url:link,success:function(result){	
	$("#dialog").html(result);		
	}});
	$('#dialog').dialog('open');					
}
function asociar_doc(id_doc) {		
	var url = "form_asociar_documento.php?rol="+id_doc;				
	$.ajax({url:url,success:function(result){	
	$("#dialog2").html(result);		
	}});
	$('#dialog2').dialog('open');
}
function limpiar_form_upload(){
	document.getElementById('familia').selectedIndex = 0;
	document.getElementById('sel_tipo_doc').selectedIndex = 0;
	document.getElementById('numero_doc').value = '';
	document.getElementById('datepicker').value = '';
	document.getElementById('n_hojas').value = '';
	
}



function cargar_boletas() {
	var rol=document.getElementById("rol_patente").value;
	var ruta="accion/ver_boletas_pago.php?rol="+rol;
	$( "#dialog" ).empty();	
	$.ajax({url:ruta,success:function(result){	
	$("#dialog").html(result);		
	}});
	$('#dialog').dialog('open');					
}

function form_busqueda_patentes(ruta) {
	$("#contenido").empty();	
	var url = "forms/buscar_patente.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
	setTimeout(function(){
		 document.getElementById("rol_busqueda").focus();
	}, 500);				
}
function form_requisitos_patente(ruta) {
	$("#contenido").empty();	
	var url = "forms/form_requisitos_patente.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});				
}
function form_familia_docs() {
	$("#contenido").empty();	
	var url = "forms/form_listado_tipos_doc.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});				
}
function form_tipos_patentes() {
	$("#contenido").empty();	
	var url = "forms/form_listado_tipos_pat.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});				
}




function actualizar_requisitos_patente(){
		var tipo_pat = document.getElementById("familia_pat").value;
		var subtipo_pat = document.getElementById("sel_tipo_pat").value;
		//console.log(tipo_pat);
		//console.log(subtipo_pat);
		if(tipo_pat == 'null' || subtipo_pat == 'null'){
			sweetAlert('Oops...', 'Error, Debe seleccionar familia y tipo antes de grabar', 'error');
		}
		else{
			$.ajax({
					url: 'accion/limpiar_requisitos_patente.php',
					type: 'POST',
					data: {'patente': tipo_pat+"."+subtipo_pat},
					success: function (returndata) {						
						
					}
			});
			$('#requisitos_tabla input:checked').each(function() {
			var check_req =   $(this).attr('value');
			var vigencia_req = document.getElementById("s_"+check_req).value;
			var tipo_pat = document.getElementById("familia_pat").value;
			var subtipo_pat = document.getElementById("sel_tipo_pat").value;
			//console.log(check_req+vigencia_req);
			$.ajax({
				url: 'accion/actualizar_requisitos_patente.php',
				type: 'POST',
				data: {'patente': tipo_pat+"."+subtipo_pat, 'documento' : check_req, 'vigencia' : vigencia_req},
				success: function (returndata) {						
					if(returndata=="OK"){
						swal(   'Éxito!',   'Actualización Exitosa',   'success' )					
					}else{
						sweetAlert('Oops...', 'Error, no se actualizaron los datos!', 'error');
					}
				}
				});
			});
		}

}
function load_date_picker_swal(){
	$( "#fecha" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
			   $.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '<Ant',
				nextText: 'Sig>',
				currentText: 'Hoy',
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
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
}
function actualizar_datos_documento(id_documento,fecha,n_doc,n_hojas){
	
	swal({  
		title: 'Modificación de Documento',  
		html:   '<input id="id_documento" value="'+id_documento+'" style="display:none;"><br>'+
		
				'<table style="width: 80%; margin-left: 10%; margin-right: 10%;"><tr><td>Fecha:</td> <td><input id="fecha" value="'+fecha+'"> </td></tr>'+
				'<tr><td>N° Documento:</td> <td><input id="n_doc" value="'+n_doc+'"> </td></tr>'+  
				'<tr><td>N° Hojas:</td> <td><input id="n_hojas" value="'+n_hojas+'"> </td></tr>'+ 				
				'</table> <script>load_date_picker_swal();</script>',
				
		showCancelButton: true,
		confirmButtonText: 'Guardar' ,	
		cancelButtonText: 'Cancelar' ,			
		closeOnConfirm: false 
	}, function() {
		$.ajax({
			url: 'accion/actualizar_datos_documento.php',
			type: 'POST',
			data: {'id_documento': $('#id_documento').val(), 'fecha': $('#fecha').val(), 'n_documento' : $('#n_doc').val(), 'n_hojas' : $('#n_hojas').val()},
			success: function (returndata) {						
				if(returndata=="OK"){
					swal(   'Éxito!',   'Actualización Exitosa',   'success' )	
					Buscar_Docs_Patente();
				}else{
					sweetAlert('Oops...', 'Error, no se actualizaron los datos!', 'error');
					
				}
			}
		});		
	});
			
	
}
function limpiar_form_global(){
	$('#form_patente')[0].reset();
	limpiar_patente();
}


function actualizar_datos_rep(){
	var direccion = document.getElementById("dir_rep_legal").value;
	var telefono = document.getElementById("telefono_rep_legal").value;
	var email = document.getElementById("email_rep_legal").value;
	var rol = document.getElementById("rut_rep_legal").value;
	swal({  
		title: 'Modificación de Representante Legal',  
		html:   '<input id="rol_mant" value="'+rol+'" style="display:none;"><br>'+
		
				'<table style="width: 80%; margin-left: 10%; margin-right: 10%;"><tr><td>Direccion:</td> <td><input id="direccion_mant" value="'+direccion+'"> </td></tr>'+
				'<tr><td>N° Telefono:</td> <td><input id="telefono_mant" value="'+telefono+'"> </td></tr>'+  
				'<tr><td>Email :</td> <td><input id="email_mant" value="'+email+'"> </td></tr>'+ 				
				'</table> <script>load_date_picker_swal();</script>',
				
		showCancelButton: true,
		confirmButtonText: 'Guardar' ,	
		cancelButtonText: 'Cancelar' ,			
		closeOnConfirm: false 
	}, function() {
		var direccion_camb=$('#direccion_mant').val();
		var telefono_camb=$('#telefono_mant').val();
		var email_camb=$('#telefono_mant').val();
		$.ajax({
			url: 'accion/actualizar_datos_rep_legal.php',
			type: 'POST',
			data: {'direccion': $('#direccion_mant').val(), 'telefono': $('#telefono_mant').val(), 'email' : $('#email_mant').val(), 'rol' : $('#rol_mant').val()},
			success: function (returndata) {						
				if(returndata=="OK"){
					swal(   'Éxito!',   'Actualización Exitosa',   'success' );
					document.getElementById("telefono_rep_legal").value=telefono_camb;
					document.getElementById("email_rep_legal").value=email_camb;
					document.getElementById("dir_rep_legal").value=direccion_camb;
					
				}else{
					sweetAlert('Oops...', 'Error, no se actualizaron los datos!', 'error');
					
				}
			}
		});		
	});
			
	
}


function revisar_requisitos_patente(){
		var tipo_pat = document.getElementById("familia_pat").value;
		var subtipo_pat = document.getElementById("sel_tipo_pat").value;	
		if(tipo_pat == 'null' || subtipo_pat == 'null'){
			sweetAlert('Oops...', 'Error, Debe seleccionar familia y tipo antes de revisar requisitos', 'error');
		}
		else{	
			var text_tipo = $("#familia_pat option:selected").text();
			var text_subtipo = $("#sel_tipo_pat option:selected").text();
			$.ajax({
				url: 'accion/revisar_requisitos_patente.php',
				type: 'POST',
				data: {'tipo_patente': tipo_pat, 'sub_tipo' : subtipo_pat, 'text_tipo' : text_tipo, 'text_subtipo' : text_subtipo},
				success: function (returndata) {
						
						swal({  
							width: 900,
							title: 'Requisitos Documentales',
							html: returndata 
						});
					}
				});
		}
}


function limpiar_patente(){
	document.getElementById("rol_busqueda").value = '';	
}
function limpiar_patente2(){
	document.getElementById("rol_consultado").value = '';	
}

function tranformar_rol(rol){
	var rol = rol;
	var rol_tratado = "";
	if (rol.length == 7) {
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5)+rol.charAt(6);
		document.getElementById("rol_pat").value = rol_tratado;
	}else if(rol.length == 6){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5);
		document.getElementById("rol_pat").value = rol_tratado;
	}else if(rol.length == 5){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4);
		document.getElementById("rol_pat").value = rol_tratado;
	}else if(rol.length == 4){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"000"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3);
		document.getElementById("rol_pat").value = rol_tratado;
	}else if(rol.length == 3){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0000"+rol.charAt(1)+rol.charAt(2);
		document.getElementById("rol_pat").value = rol_tratado;
	}else if(rol.length == 2){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00000"+rol.charAt(1);
		document.getElementById("rol_pat").value = rol_tratado;
	}else{
		rol_tratado = rol;
	}
	return rol_tratado;
}


function Buscar_Docs_Patente(){	
	var rol = document.getElementById("rol_busqueda").value;
	var rol_tratado = "";
	if (rol.length == 7) {
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5)+rol.charAt(6);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 6){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 5){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 4){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"000"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 3){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0000"+rol.charAt(1)+rol.charAt(2);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 2){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00000"+rol.charAt(1);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else{
		rol_tratado = rol;
	}
	
	
	if(rol_tratado == ''){
		sweetAlert('Para realizar búsquedas', 'debe ingresar algún criterio de búsqueda', 'error');
	}else{
	var url = "accion/ver_boveda_mantencion.php?rol="+rol_tratado;				
		$.ajax({url:url,success:function(result){	
			$("#resultados_busquedas").html(result);
			$('#resultados_busqueda_dt').DataTable({
				"pagingType": "simple_numbers"
			} );	
		}});
	}
}
function Buscar_Patente(){	
	var rol = document.getElementById("rol_busqueda").value;
	var rol_tratado = "";
	if (rol.length == 7) {
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5)+rol.charAt(6);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 6){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 5){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 4){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"000"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 3){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0000"+rol.charAt(1)+rol.charAt(2);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else if(rol.length == 2){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00000"+rol.charAt(1);
		document.getElementById("rol_busqueda").value = rol_tratado;
	}else{
		rol_tratado = rol;
	}
	
	var direccion = document.getElementById("direccion_busqueda").value;
	var razon_busqueda = document.getElementById("razon_busqueda").value;
	if(rol_tratado == '' && direccion == '' && razon_busqueda == ''){
		sweetAlert('Para realizar búsquedas', 'debe ingresar algún criterio de búsqueda', 'error');
	}else{
	var url = "accion/resultados_busqueda_patente.php?rol="+rol_tratado+"&direccion="+direccion+"&razon_busqueda="+razon_busqueda;				
		$.ajax({url:url,success:function(result){	
			$("#resultados_busquedas").html(result);
			$('#resultados_busqueda_dt').DataTable({
				"pagingType": "simple_numbers"
			} );	
		}});
	}
}
function Actualizar_Patente(){
	var rol = document.getElementById("rol_busqueda").value;
	var rol_tratado = "";
	if (rol.length == 7) {
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5)+rol.charAt(6);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else if(rol.length == 6){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else if(rol.length == 5){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else if(rol.length == 4){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"000"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else if(rol.length == 3){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0000"+rol.charAt(1)+rol.charAt(2);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else if(rol.length == 2){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00000"+rol.charAt(1);
		document.getElementById("rol_busqueda").value = rol_tratado;	
	}else{
		rol_tratado = rol;
	}
	if(rol_tratado == ''){
		sweetAlert('Para actualizar datos', 'Debes ingresar algo que actualizar', 'error');
	}else{

		$.ajax({
			url: 'accion/actualizar_requisitos_patente_individual.php',
			type: 'POST',
			data: {'rol_patente': rol_tratado},
			success: function (returndata) {						
				if(returndata=="OK"){
					swal(   'Éxito!',   'Actualización Exitosa',   'success' )	
					Buscar_Patente();
				}else{
					//console.log(returndata);
					sweetAlert('Oops...', 'Error, no se actualizaron los datos!', 'error');
				}
			}
		});
	}
}


function buscar_persona(){
	var paterno = document.getElementById("paterno_bus").value;
	var materno = document.getElementById("materno_bus").value;
	var nombre = document.getElementById("nombre_bus").value;
	var rut = document.getElementById("rut_bus").value;
	var ruta = "busqueda_persona_resultados.php?paterno="+paterno+"&materno="+materno+"&nombre="+nombre+"&rut="+rut;
	$( "#dialog" ).empty();	
	$.ajax({url:ruta,success:function(result){	
		$("#dialog").html(result);		
	}});				 
}




function busqueda_rol_gestion(){
	var rol = document.getElementById("rol_consultado").value;
	var rol_tratado = "";
	if (rol.length == 7) {
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5)+rol.charAt(6);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else if(rol.length == 6){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4)+rol.charAt(5);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else if(rol.length == 5){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3)+rol.charAt(4);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else if(rol.length == 4){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"000"+rol.charAt(1)+rol.charAt(2)+rol.charAt(3);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else if(rol.length == 3){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"0000"+rol.charAt(1)+rol.charAt(2);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else if(rol.length == 2){
		rol_tratado = rol.charAt(0);
		rol_tratado = rol_tratado+"-";
		rol_tratado = rol_tratado+"00000"+rol.charAt(1);
		document.getElementById("rol_consultado").value = rol_tratado;
	}else{
		rol_tratado = rol;
	}
	
	
	if(rol_tratado == ''){
		sweetAlert('Para realizar búsquedas', 'debe ingresar algún criterio de búsqueda', 'error');
	}else{
		$.ajax({
			url: 'accion/busqueda_rol_json_2.php',
			type: 'POST',
			data: {'rol': rol_tratado},
			success: function (returndata) {
				
				var json = JSON.parse(returndata);
				console.log(json);
				// Estados
				document.getElementById("pago_anual").value = convertir_a_dinero(json.PagoAnual);
				calcular_estado_documental(json.EstadoDocumental);
				calcular_estado_relaciones(json.EstadoRelaciones,json.Relacion);
				calcular_estado_domicilio(json.DireccionPadre,json.Direccion);
				calcular_estado_rut(json.RutPadre,json.Rut);
				calcular_estado_pago(json.Pago);
				
				//Fin Estados			
			
				//Datos del ROL
				document.getElementById("ingreso_rentas_patente").value = convertir_a_dinero(json.PagoAnual);
				document.getElementById("rol_patente").value = json.Rol;
				document.getElementById("tipo_patente").value = json.Tipo;
				document.getElementById("subtipo_patente").value = json.SubtipoClase;
				document.getElementById("fecha_patente").value = json.FechaInicio;
				document.getElementById("direccion_patente").value = json.Direccion;
				document.getElementById("zona_patente").value = json.Zona;
				document.getElementById("unidad_vecinal_patente").value = json.UnidadVecinal;
				document.getElementById("actividad_economica").value = json.ActividadComercial;
				document.getElementById("cod_actividad_economica").value = json.CodActividadComercial;
				document.getElementById("doc_anot_prev").name = json.RutaAnotaciones;
				document.getElementById("doc_sol_pat").name = json.SolPat;
				
				//MAPS
				document.getElementById("doc_cer_rep_fin").name = json.CerRecFin;	
				document.getElementById("doc_arr").name = json.ConArr;	
				//FIN MAPS
		
				//Fin Datos del Rol  
				
				//Datos del Contribuyente
				document.getElementById("razon_social_contribuyente").value = json.RazonSocial;
				document.getElementById("direccion_comercial_contribuyente").value = json.DireccionComercial;				
				document.getElementById("rut_contribuyente").value = json.Rut;
				document.getElementById("fono_contribuyente").value = json.Fono;
				document.getElementById("email_contribuyente").value = json.Email;		
				document.getElementById("nombre_fantasia_contribuyente").value = json.NombreFantasia;		
				document.getElementById("representante_legal").value = json.RepresentanteLegal;	
				document.getElementById("rut_representante_legal").value = json.RutRepresentanteLegal;	
				document.getElementById("doc_esc_soc").name = json.EscSocasdasd;	 // no trae				
				document.getElementById("doc_des_rep_leg").name = json.DocRepLeg; // no trae
				document.getElementById("doc_cer_vig").name = json.CerVig;				
				document.getElementById("doc_ini_act").name = json.IniAct;					
				
				//  Comportamiento de pago    
				
				document.getElementById("capital_propio_pagos").value = convertir_a_dinero(json.CapitalPropio);
				document.getElementById("patente_pagos").value = convertir_a_dinero(json.Valor140);
				document.getElementById("publicidad_pagos").value = convertir_a_dinero(json.ValorPropaganda);
				document.getElementById("aseo_pagos").value = convertir_a_dinero(json.ValorAseo);	
				document.getElementById("total_pago").value = convertir_a_dinero(json.TotalValor);

				// Fin comportamiento de pago
				document.getElementById("primera_inspeccion").value = json.FechaFiscalizacion;				
				document.getElementById("INSPECTOR").value = json.NombreFiscalizador;
				
				$('img[title]').qtip();	
				cargar_mapa_embedido();
				
				$("#Tabla_Socios").empty();	
				var url = "accion/ver_asociados.php?rol="+json.Rut;				
				$.ajax({url:url,success:function(result){	
				$("#Tabla_Socios").html(result);				
				$('#tabla_asociados_indirectos').DataTable();	
				$('#tabla_asociados').DataTable();	
				}});
				$("#titulo_socios").empty();
				$("#titulo_socios").text("SOCIOS DE  "+json.RazonSocial);
				
				
				
				
				delete json;
				
				
			}
		});
	}
	
}
function ver_socios_indirectos (rut_asociado,porcentaje,nombre,nombre_sociedad)  {
	var rut_asociado = String(rut_asociado);
	var porcentaje = String(porcentaje);
	var nombre = String(nombre);
	var nombre_sociedad = String(nombre_sociedad);
	//console.log(rut_asociado);
	$("#socios_indirectos").empty();
	var url = "accion/ver_asociados_indirectos.php?rol="+rut_asociado+"&porcentaje="+porcentaje+"&nombre="+nombre+"&nombre_sociedad="+nombre_sociedad;	
	//console.log(url);
	$.ajax({url:url,success:function(result){	
	$("#socios_indirectos").html(result);				
	$('#tabla_asociados_indirectos').DataTable();
	}});
	
}			  
function calcular_estado_documental(EstadoDocumental){
	if(EstadoDocumental=="CUMPLE"){		
		$('#img_estado_documental').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_estado_documental').attr("title","APROBADO");	
		
	}else{	
		$('#img_estado_documental').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_estado_documental').attr("title","RECHAZADO");	
	}
}
function calcular_estado_relaciones(EstadoRelaciones,tabla){
	if(EstadoRelaciones=="CUMPLE"){		
		$('#img_relaciones').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_relaciones').attr("title","APROBADO");	
		
		
	}else{	
		$('#img_relaciones').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_relaciones').attr("title",tabla);	
	}
}
function calcular_estado_domicilio(padre,hijo){
	
	if(padre=="NO APLICA"){		
		$('#img_domicilio').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_domicilio').attr("title","SIN OBSERVACIONES");		
	}else if(padre==hijo){	
		$('#img_domicilio').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_domicilio').attr("title","PATENTE COMERCIAL Y DE ALCOHOLES CON MISMO DOMICILIO: "+padre );	
	}else if(padre!=hijo){	
		$('#img_domicilio').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_domicilio').attr("title","PATENTE COMERCIAL Y DE ALCOHOLES CON DISTINTO DOMICILIO<br> COMERCIAL: "+ padre+" <br> ALCOHOLES: "+hijo);
	}else{
		
	}
}
function calcular_estado_rut(padre,hijo){
	
	if(padre=="NO APLICA"){		
		$('#img_rut').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_rut').attr("title","SIN OBSERVACIONES");		
	}else if(padre==hijo){	
		$('#img_rut').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_rut').attr("title","PATENTE COMERCIAL Y DE ALCOHOLES CON MISMO RUT: "+padre );	
	}else if(padre!=hijo){	
		$('#img_rut').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_rut').attr("title","PATENTE COMERCIAL Y DE ALCOHOLES CON DISTINTO RUT<br> COMERCIAL: "+ padre+" <br> ALCOHOLES: "+hijo);
	}else{
		
	}
}
function calcular_estado_pago(pago){
	
	if(pago=="OK"){		
		$('#img_pagos').attr("src","iconos_interfaz/btn_aprobado.png");	
		$('#img_pagos').attr("title","SIN OBSERVACIONES");	
		
	}else if(pago="ATRASADO"){	
		$('#img_pagos').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_pagos').attr("title","ULTIMO PAGO DE PATENTE NO REALIZADO");	
		
	}else if(pago="OK CON PAGO ATRASADO"){	
		$('#img_pagos').attr("src","iconos_interfaz/btn_rechazado.png");	
		$('#img_pagos').attr("title","ULTIMO PAGO REALIZADO FUERA DE PLAZO");
		
	}else{
		
	}
}


function abrirarchivopdfid(id_documento){
	var width = $(window).width();
	var height = $(window).height();	
	var height80 = height * 0.8;
	var width80 = width * 0.8;
	var width10 = width * 0.1;
	var height10 = height * 0.1;
	var wheight25 = height80 * 0.25;
	var wheight65 = height80 * 0.65;
	
	window.open("accion/ver_documento.php?id_documento="+id_documento,"Bóveda Digital", "width="+width80+", height="+height80+",left="+width10+"");
}
function ver_cartola_documental(){
	var rol = document.getElementById("rol_patente").value;
	abrir_dialogo("accion/ver_boveda.php?rol="+rol);
}
function ver_fiscalizaciones(){
	var rol = document.getElementById("rol_patente").value;
	abrir_dialogo("accion/ver_fiscalizaciones.php?rol_patente="+rol);
}
function ver_estado_documental(){
	var rol = document.getElementById("rol_patente").value;
	abrir_dialogo("accion/ver_cumplimiento_rol.php?rol="+rol);
}




function abrirarchivopdf(variable1,familia,tipo,fecha,n_doc,n_hojas) {
var width = $(window).width();
var height = $(window).height();
//console.log("Width: "+width+" y Height:"+height);
var height80 = height * 0.8;
var width80 = width * 0.8;

var width10 = width * 0.1;
var height10 = height * 0.1;

var wheight25 = height80 * 0.25;
var wheight65 = height80 * 0.65;

var w = window.open('', '', 'width='+width80+',height='+height80+',left='+width10+',top=0,status=no,scrollbars');
var variable = variable1;
w.document.write(   "<div style='height:5%;font-family:sans-serif; min-height:70px; border-style: solid;border-width:2px;border-radius:8px;border-color: #557490;'>"+
					"<p style='text-align: center; position: relative; top: -23px;  margin-left: 10px; padding-right: 10px; padding-left: 10px;background-color:#FFFFFF;display: inline-block;'>DATOS DEL DOCUMENTO</p>"+
					"<br><X5 style='margin-top: -25px;    margin-left: 20px;	position:absolute;'>"+tipo+" DE LA FAMILIA: "+familia+
					
					"<br>FECHA: "+fecha+
					" *|*  NÚMERO DE DOCUMENTO: "+n_doc+
					" *|*  NÚMERO DE HOJAS: "+n_hojas+"</X5></div><br>"+
					"<div style='height:80%;font-family:sans-serif; min-height:400px; border-style: solid;border-width:2px;border-radius:8px;border-color: #557490;'>"+
					"<p style='text-align: center; position: relative; top: -23px;  margin-left: 10px; padding-right: 10px; padding-left: 10px;background-color:#FFFFFF;display: inline-block;'>DOCUMENTO</p>"+
					
					"<object data='" + variable + "' type='application/pdf'  width='99%' height='90%' style='    margin-top: -25px;'> <embed src='"+ variable+"' type='application/pdf' /> </object>   </div> ");

w.document.close();  }		  
				  
function cargar_sw(direccion){
		window.open('/sw?direccion='+direccion);	
}
function cargar_sw_embedido(){
		var direccion = document.getElementById("direccion_patente").value;
		$("#espacio_mapa_sw").empty();	
		var url = "/sw?direccion="+direccion;				
		$.ajax({url:url,success:function(result){	
		$("#espacio_mapa_sw").html(result);		
		}});		
}  
function cargar_mapa_embedido(){
		var direccion = document.getElementById("direccion_patente").value;
		$("#espacio_mapa_sw").empty();	
		var url = "/gm?direccion="+direccion;				
		$.ajax({url:url,success:function(result){	
		$("#espacio_mapa_sw").html(result);		
		}});		
} 
function convertir_a_dinero(valor_a_convertir){
	var valor_a_convertir_string = String(valor_a_convertir);
	var separacion = valor_a_convertir_string.split( /(?=(?:...)*$)/ )
	var valor_final = "";
	for (var i = 0; i < separacion.length; i++) {		
		valor_final = valor_final + separacion[i] + ".";		
	}
	valor_final = valor_final.slice(0, - 1);
	valor_final = "$"+valor_final;
	return valor_final;
	
}       

function buscar_rol_mantenedor(){
	var rol = document.getElementById("rol_busqueda").value;
	var rol_tratado = tranformar_rol(rol);
	document.getElementById("rol_busqueda").value= rol_tratado;
	//console.log(rol_tratado);	
	if(rol_tratado == ''){
		sweetAlert('Para realizar búsquedas', 'debe ingresar el rol que desea buscar', 'error');
	}else{
		$.ajax({
			url: 'accion/busqueda_rol_json_mantenedor.php',
			type: 'POST',
			data: {'rol': rol_tratado},
			success: function (returndata) {
				//console.log(returndata);
				if(returndata=="no"){
					$("#form_patente").hide();	
					swal({   title: 'Rol '+rol_tratado+' No existe',  
					text: '¿Desea crearlo?', 
					type: 'warning',
					showCancelButton: true, 
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33', 
					confirmButtonText: 'Si',
					cancelButtonText: 'No',
					confirmButtonClass: 'confirm-class', 
					cancelButtonClass: 'cancel-class',
					closeOnConfirm: false, 
					closeOnCancel: false },
					function(isConfirm) {   
						if (isConfirm) {  
								swal.closeModal();
								$('#form_patente')[0].reset();
								document.getElementById("rol_pat").value =rol_tratado;
								$("#form_patente").show();
							} else {    
								swal.closeModal();
								document.getElementById("rol_ori").value ="";
								$('#form_patente')[0].reset();
								document.getElementById("rol_busqueda").value = "";
								$("#rol_busqueda").focus();	
							} 
				});
				
				}else{
					var json = JSON.parse(returndata);
					document.getElementById("rol_pat").value = json.RolPatente;
					document.getElementById("rol_ori").value = json.RolPatente;
					document.getElementById("rol_prov").value = json.RolProvisorio;
					document.getElementById("fecha_rol").value = json.FechaInicio;
					var select_tipo = document.getElementById('tipo_patente');
					select_tipo.value = json.TipoPatente;
					$( "#tipo_doc" ).empty();	
					$.ajax({url:"tipo_patente.php?tipo_patente="+json.TipoPatente+"&preload="+json.SubtipoPatente,success:function(result){	
					$("#subtipo_patente").html(result);		
					}});
					document.getElementById("direccion1").value = json.Direccion;
					document.getElementById("direccion2").value = json.Complemento;
					document.getElementById("codacteconomica").value = json.CodActividadEconomica;
					document.getElementById("acteconomica").value = json.ActividadEconomica;
					document.getElementById("zona").value = json.Zona;
					document.getElementById("unidad_vecinal").value = json.UnidadVecinal;
					document.getElementById("valor_capital_propio").value = convertir_a_dinero(json.CapitalPropio);
					document.getElementById("valor_patente").value = convertir_a_dinero(json.ValorArt140);
					document.getElementById("valor_publicidad").value = convertir_a_dinero(json.ValorPublicidad);
					document.getElementById("valor_aseo_municipal").value = convertir_a_dinero(json.ValorAseo);
					document.getElementById("valor_total").value = convertir_a_dinero(json.ValorTotal);
					document.getElementById("propietario").value = json.RazonSocial;
					document.getElementById("rep_legal").value = json.RepLegal;
					document.getElementById("rut_propietario").value = json.RutRazonSocial;
					document.getElementById("rut_rep_legal").value = json.RutRepLegal;
					document.getElementById("dir_rep_legal").value = json.DireccionRepLegal;
					document.getElementById("email_rep_legal").value = json.MailRepLegal;
					document.getElementById("telefono_rep_legal").value = json.TelefonoRepLegal;
					delete json;
					$("#form_patente").show();	
				}
				
				
			
			}
		});
	}
	
	
}

function asociar_documentos_rol(){
	var rol = document.getElementById("rol_pat").value;
	popup = window.open("menu_principal.php");
	popup.focus();
	setTimeout(function(){
		 popup.form_agregar_documento_preload(rol);
	}, 500);
	
	
}

function buscar_razon_social(){
	var rol=document.getElementById("rol_pat").value;
	abrir_dialogo("forms/razon_social_patente.php?rol="+rol);
}

function busqueda_razon_social(rol){
	abrir_dialogo("forms/busqueda_razon_social.php?rol="+rol);
}

function buscar_razon_social_res(){
	var rol=document.getElementById("rol_cam_raz").value;
	var nombre=document.getElementById("nombre_raz_social_busqueda").value;
	var rut=document.getElementById("rut_raz_social_busqueda").value;
	abrir_dialogo("accion/busqueda_razon_social_resultado.php?rol="+rol+"&nombre="+nombre+"&rut="+rut);
}

function selecciona_propietario(rut,nombre){
	$( "#dialog" ).empty();
	$('#dialog').dialog('close');
	document.getElementById("propietario").value=nombre;
	document.getElementById("rut_propietario").value=rut;
}

function buscar_representante_legal(){
	var rol=document.getElementById("rol_pat").value;
	abrir_dialogo("forms/representante_legal_patente.php?rol="+rol);
}

function busqueda_representante_legal(rol){
	abrir_dialogo("forms/busqueda_representante_legal.php?rol="+rol);
}

function buscar_representante_legal_res(){
	var rol=document.getElementById("rol_cam_rep").value;
	var nombre=document.getElementById("nombre_rep_legal_busqueda").value;
	var rut=document.getElementById("rut_rep_legal_busqueda").value;
	abrir_dialogo("accion/busqueda_representante_legal_resultado.php?rol="+rol+"&nombre="+nombre+"&rut="+rut);
}

function selecciona_rep_legal(rut,nombre,telefono,direccion,email){
	$( "#dialog" ).empty();
	$('#dialog').dialog('close');
	console.log(rut);
	console.log(nombre);
	console.log(telefono);
	console.log(direccion);
	console.log(email);
	document.getElementById("rep_legal").value=nombre;
	document.getElementById("rut_rep_legal").value=rut;
	document.getElementById("telefono_rep_legal").value=telefono;
	document.getElementById("dir_rep_legal").value=direccion;
	document.getElementById("email_rep_legal").value=email;
}

function crear_contribuyente(comprobacion){
	abrir_dialogo("form_agregar_persona.php?comprobacion="+comprobacion+"&rut=A");	
}

function VerificaRut(rut) {
    if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
        var caracteres = new Array();
        var serie = new Array(2, 3, 4, 5, 6, 7);
        var dig = rut.toString().substr(rut.toString().length - 1, 1);
        rut = rut.toString().substr(0, rut.toString().length - 2);

        for (var i = 0; i < rut.length; i++) {
            caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
        }

        var sumatoria = 0;
        var k = 0;
        var resto = 0;

        for (var j = 0; j < caracteres.length; j++) {
            if (k == 6) {
                k = 0;
            }
            sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
            k++;
        }

        resto = sumatoria % 11;
        dv = 11 - resto;

        if (dv == 10) {
            dv = "K";
        }
        else if (dv == 11) {
            dv = 0;
        }

        if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase())
            return true;
        else
            return false;
    }
    else {
        return false;
    }
}

function form_agregar_fiscalizaciones(){
	$("#contenido").empty();	
	var url = "forms/agregar_fiscalizaciones.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}



function form_mantencion_fiscalizaciones(){
	$("#contenido").empty();	
	var url = "forms/mantencion_fiscalizaciones.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}

function form_mantencion_fiscalizaciones(){
	$("#contenido").empty();	
	var url = "forms/buscar_fiscalizaciones.php";				
	$.ajax({url:url,success:function(result){	
	$("#contenido").html(result);		
	}});
}