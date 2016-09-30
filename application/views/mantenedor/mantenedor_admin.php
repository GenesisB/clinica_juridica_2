<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<div style="margin:auto; width:60%;  padding:5px">
	<h2 style="text-align:center">Mantenedor Administradores</h2>
	<div style='height:20px;'></div>  
	<div>
		<?php echo $output; ?>
    </div>
</div>