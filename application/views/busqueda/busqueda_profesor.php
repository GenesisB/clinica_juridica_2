<?php $rut=$_GET['rut'];?>
<div style="border: 1px solid #cfd9db; margin-bottom:5px;width:60%;margin-left:20%;margin-top:40px;">
			<p class="titulo_div">Búsqueda Profesor</p>
	<table style="margin-top: -20px;margin-left:34%">
		<tr>
			<td>
				Rut
			</td>
			<td>
				<input  class="input" type="text" id="rut_busqueda" value="<?php echo $rut;?>">
			</td>
		</tr>
		<tr>
			<td>
				Nombre
			</td>
			<td>
				<input class="input" style="width:350px" type="text" id="nombre_busqueda">
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input style="height:40px;	width:100px;margin-top:10px;border-radius:10px;" type="button" value="Buscar" onClick="resultado_busqueda_profesor();">
			</td>
		</tr>
	</table>
</div>