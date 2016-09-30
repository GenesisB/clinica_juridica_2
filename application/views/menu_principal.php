<?php
	 if (!isset($_SESSION['login_user'])) {
		 header("Location: /clinica_juridica");
	 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<!-- SET GLOBAL BASE URL (https://codedump.io/share/vYcPimS5u6pl/1/codeigniter-base-url-didn39t-recongnized-in-javascript) -->
<script>var base_url = '<?php echo base_url() ?>';</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?= base_url(); ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-ui-1.10.2.custom.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/jquery-ui-1.10.2.custom.css">



<link rel="stylesheet" href="<?= base_url(); ?>assets/css/menu.css" />
<script src="<?= base_url(); ?>assets/js/datepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/responsive-menu.js" type="text/javascript"></script>
<link href="<?= base_url(); ?>assets/css/responsive-menu.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/primitives.latest.css" rel="stylesheet">
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/jquery.dataTables.css">
<script src="<?= base_url(); ?>assets/js/funciones_clinica.js"></script>
<script src="<?= base_url(); ?>assets/js/q_tip.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/q_tip.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/easycal.css">
<!-----------------  Scripts nesesarios para el calendario	  ------------------->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/underscore.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/moment.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/easycal.js"></script>
<script src="<?= base_url(); ?>assets/js/highcharts.js"></script>



<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.sldr.js"></script>

<!-----------------  Sweet Alert	  ------------------->
<script src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/sweetalert.css">

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/estilo_clinica.css" />
<script>

jQuery(function ($) {
	var menu = $('.rm-nav').rMenu({
		minWidth: '960px'
	});
	$("#dialog").dialog({
	appendTo: "body",
	position: ['center', 'center'],
	autoOpen: false,
	draggable: true,
	resizable: false,
	modal: true,
	width: 'auto',
	height: 'auto',
	open: function(ev, ui){

		  }
	});
	$("#dialog2").dialog({
	appendTo: "body",
	position: ['center+15', 'center+15'],
	autoOpen: false,
	draggable: true,
	resizable: false,
	modal: true,
	width: 'auto',
	height: 'auto',
	open: function(ev, ui){

		  }
	});


});


$(document).ready(function()
{
$body = $("body");
$(document).on({
ajaxStart: function() { $body.addClass("loading");    },
ajaxStop: function() { $body.removeClass("loading"); }
});
});

</script>


</head>

<body>



<div class="header_boveda">
	<div class="header_content">
		<div class="logo_izquierdo_header">
			<img src="<?= base_url(); ?>assets/images/logo_unab_derecho.png" style="width: 200px; height: auto;">
		</div>
		<div class="foto_header">
			<img style="width:70px; height:70px; border-radius: 50%;" src="../../assets/usuarios/<?php echo $_SESSION['login_user'];?>.jpg" onError="this.src='../../assets/usuarios/sin_foto.png';" >
		</div>
		<div class="usuario_header">
		<!-- Usuario Conectado -->

				<?php echo ucwords(strtolower($nombre."<br><div id='sede_act'>".$sede."</div>"));  ?> <input type="text" id="user_logeado" value="<?php echo $_SESSION['login_user'];?>" style="display:none;">

				<?php
					if($cantidad_sedes>1){
						echo "<img onClick=\"cambiar_sede('".$_SESSION['login_user']."');\" src=\"".base_url()."assets/images/cambiar_sede.png\" alt=\"Cambiar de Sede\" style=\"cursor:pointer; width: 40px; height: 40px; margin-left:35%;\">";
					}
				?>

		<!-- Fin Usuario Conectado -->
		</div>
		<div class="log_off">
			<td><IMG SRC='<?= base_url(); ?>assets/images/cerrar.png' onclick="cerrar_sesion();" style='width:25px;height:25px;'></td>
		</div>
		<div class="logo_derecho_header">
			<img class="logo_derecha" src="<?= base_url(); ?>assets/images/logo_unab_ingenieria.png" style="width: 200px; height: auto;">
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="fondo_bu">
	 <div class="rm-container">
        <a class="rm-toggle rm-button rm-nojs" href="#">Menu</a>

        <nav class="rm-nav rm-nojs rm-lighten">
            <ul id="menu_margen">
			<?php
				if (isset($privilegios)) {
					if ($privilegios->num_rows() > 0)
					{
					   foreach ($privilegios->result() as $row)
					   {
							if($row->tipo_privilegio=='Mantencion' && $row->privilegio==1){
								echo "<li><a href='#'>Mantenedor</a>";
								echo "    <ul>";
								echo "        <li><a href='#' onClick='form_mantenedor_1();'>Configuracion de Agenda</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_clientes();'>Usuarios</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_admin();'>Administradores</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_profesores();'>Profesores</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_alumnos();'>Alumnos</a></li>	";
								echo "		<li><a href='#' onClick='form_mantenedor_materias();'>Materias</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_causales();'>Causales de Termino</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_privilegios();'>Privilegios</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_sedes();'>Sedes</a></li>";
								echo "		<li><a href='#' onClick='form_mantenedor_users();'>Sedes para Usuarios de Sistema</a></li>";
								echo "    </ul>";
								echo "</li>";

							}
							else if($row->tipo_privilegio=='Busquedas' && $row->privilegio==1){

								echo "<li><a href='#'>Busquedas</a>";
								echo "    <ul>";
								echo "		<li><a href='#' onclick='form_busqueda();' >Busqueda de Causas</a></li>";
								echo "		<li><a href='#' onclick='form_busqueda_historica();' >Busqueda de Causas Historicas</a></li>";
								echo "		<li><a href='#' onclick='form_busqueda_orientacion();' >Busqueda de Orientaciones</a></li>";

								echo "    </ul>";
								echo "</li>";


							}
							else if($row->tipo_privilegio=='Agenda' && $row->privilegio==1){
								echo "<li><a href='#' onClick='form_agenda_semanal();'>Agenda</a></li>";

							}
							else if($row->tipo_privilegio=='Orientaciones' && $row->privilegio==1){
								echo "<li><a href='#' onClick='form_ingreso_orientacion();'>Orientaciones</a></li>";

							}
							else if($row->tipo_privilegio=='Audiencia' && $row->privilegio==1){
								echo "<li><a href='#' onClick='form_audiencias();'>Audiencias</a></li>";

							}
							else if($row->tipo_privilegio=='Panel' && $row->privilegio==1){
								echo "<li><a href='#' onClick='form_panel();'>Estadisticas</a></li>";

							}
							else if($row->tipo_privilegio=='Reportes' && $row->privilegio==1){


							}




					   }
					}
				}ELSE{

				}

				if($tipo!='F'){
					echo "<li><a href='#' onclick='mis_causas();' >Mis Causas</a></li>";
					echo "<li><a href='#' onclick='horario_personal();' >Horario Personal</a></li>";
				}else{

				}
			?>









				<!--
                <li><a href="#" onclick="" >Ingreso</a>
					<ul>
						<li><a href="#" onClick="form_ingreso_causa();">Causas</a></li>
                        <li><a href="#" onClick="form_ingreso_orientacion();">Orientaciones</a></li>
                    </ul>
				</li>
				-->



            </ul>
        </nav>
    </div><!-- .rm-container -->
	<div id="contenido" class="content" >
		<div id="SLDR-ONE" class="sldr">
			<ul class="wrp animate">
				<li class="elmnt-one"><div class=""><div class="wrap"><img src="../../assets/images/1.jpg"></div></div></li>
				<li class="elmnt-two"><div class=""><div class="wrap"><img src="../../assets/images/2.jpg"></div></div></li>
				<li class="elmnt-three"><div class=""><div class="wrap"><img src="../../assets/images/3.jpg"></div></div></li>
				<li class="elmnt-four"><div class=""><div class="wrap"><img src="../../assets/images/4.jpg"></div></div></li>

			</ul>
		</div>


	</div>

</div>

<div id="dialog">

</div>
<div id="dialog2">

</div>
<div class="modal"></div>

</body>


<script>

$( '.sldr' ).each( function() {
					var th = $( this );
					th.sldr({
						focalClass    : 'focalPoint',
						offset        : th.width() / 2,
						sldrWidth     : 'responsive',
						nextSlide     : th.nextAll( '.sldr-nav.next:first' ),
						previousSlide : th.nextAll( '.sldr-nav.prev:first' ),
						selectors     : th.nextAll( '.selectors:first' ).find( 'li' ),
						toggle        : th.nextAll( '.captions:first' ).find( 'div' ),
						sldrInit      : sliderInit,
						sldrStart     : slideStart,
						sldrComplete  : slideComplete,
						sldrLoaded    : sliderLoaded,
						sldrAuto      : true,
						sldrTime      : 4000,
						hasChange     : true
					});
				});





</script>
<style>

ul.animate {
	-webkit-transition: -webkit-transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
       -moz-transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
         -o-transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
            transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); /* ease-in-out */
}

.stage {
	width: 100%;
	text-align: center;
	overflow: hidden;
	clear: both;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	padding-bottom: 0;
	background-color:#12125f;
	border-bottom-width:3px;
	border-bottom-style:solid;
	border-color:#ef7f1b;
	padding-top:100px;

}

.sldr {
	max-width: 100%;
	margin: 0 auto;
	overflow: hidden;
	position: relative;
	clear: both;
	display: block;
}

.sldr > ul > li {
	float: left;
	display: block;
	width: 100%;
}

div.skew {
	max-width: 825px;
	margin: 0 auto;

	display: block;
	overflow: hidden;

	-webkit-transform: skewX(16deg);
       -moz-transform: skewX(16deg);
        -ms-transform: skewX(16deg);
            transform: skewX(16deg);
}

div.skew > div.wrap {
	display: block;
	overflow: hidden;

	-webkit-transform: skewX(-16deg);
	   -moz-transform: skewX(-16deg);
	    -ms-transform: skewX(-16deg);
	        transform: skewX(-16deg);

	margin-left: -10.1%;
	width: 122%;
}
.selectors {
	/*margin: 15px 0 0;*/
	margin-bottom:30px;
	position:absolute;
	top:80px;
	left:1%;
	right:1%;

}

.selectors li {
	font-size: 80px!important;
	line-height: 32px;
	display: inline;
	padding: 0 2px;
}

.selectors li a {
	text-decoration: none;
}
.selectors li a:hover {
	text-decoration: none;
	opacity:0.5;
}
.selectors li.focalPoint a {
	color: #ef7f1b;
	cursor: default;
}
.captions div {
	left: 200%;
	position: fixed;
	opacity: 0;

	-webkit-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
       -moz-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
         -o-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000);
            transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); /* ease-in-out */
}

.captions div.focalPoint {
	opacity: 1;
	left: inherit;
	position: static;
}

.clear {
	display: block;
	width: 100%;
	height: 0px;
	overflow: hidden;
	clear: both;
}
#SLDR-ONE img {
	max-width: 1100px;
	width: 100%;
	display: block;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	height:auto;
	max-height:534px;
}


</style>
