<!DOCTYPE html>
<html lang="es">
<head>
<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicie Sesión</title>

<!--STYLESHEETS-->
<link href="<?= base_url();?>assets/css/estilo_login.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/sweetalert.css">
<!--SCRIPTS-->
<!-- SET GLOBAL BASE URL (https://codedump.io/share/vYcPimS5u6pl/1/codeigniter-base-url-didn39t-recongnized-in-javascript) -->
<script>var base_url = '<?php echo base_url() ?>';</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">



$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});

	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});


});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form"  id="login-form" class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Iniciar Sesión</h1><!--END TITLE-->
    <!--DESCRIPTION--><span></span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->

	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input id="username" name="username" type="text" class="input username" value="Usuario" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input id="password" name="password" type="password" class="input password" value="Contraseña" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->

    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Iniciar Sesión" class="button"  /><!--END LOGIN BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
<script>
$(document).ready(function() {
	$("#login-form").submit(function(e){

			e.preventDefault();
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			$.ajax({
				url: '<?= base_url(); ?>index.php/menu/login',
				type: 'POST',
				data: {'username': username, 'password': password},
				success: function (returndata) {
					console.log(returndata);
					if(returndata=="OK"){
						 document.location.href = "<?= base_url(); ?>index.php/menu/menu_principal";
					}else{
						swal("Usuario o contraseña Invalidos");
					}
				}
			});
	});
});


</script>
</html>
