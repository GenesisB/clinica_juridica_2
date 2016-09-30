
	<h2 class="titulo_fieldset">Búsqueda Unificada de Orientaciones </h2>
	
	<hr>
	<!--  Se deja como una posible manera de realizar busquedas
	<div class="titulo_fieldset">
		<h3>Criterios de Busqueda :</h3>
		<input type="radio" name="criterio" value="ca"> Causa &nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="criterio" value="or">Orientacion &nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="criterio" value="pr">Profesor &nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="criterio" value="al"> Alumno &nbsp&nbsp&nbsp&nbsp&nbsp
	<br><hr>				
	</div>
	-->
	
	<div><br>
		
		<a style="margin-left: 30px; margin-right:5px;">Abogado</a>
		<input type="text" name="abogado" id="abogado">
		
		<a style="margin-left: 30px; margin-right:5px;">Usuario</a>
		<input type="text" name="usuario" id="usuario">		
		
		
		<div style="visibility:hidden; position:absolute;">
		<input style="margin-left: 40px; margin-right:5px;" type="radio" name="tipo_busqueda" value="rut" >Buscar por RUT<br>
		<input style="margin-left: 40px; margin-right:5px;" type="radio" name="tipo_busqueda" value="nombres" checked>Buscar por Nombres<br>
		</div>
		 
		
		<button onClick="buscar_orientaciones();" class="boton" style="margin-right:15px;float:right;">Buscar</button>
		
		<div style="clear:both"></div>
	<br><hr>
		
				
	</div> 
	<h3 class="titulo_fieldset">Resultado Búsqueda </h3>
	<div id="resultados_busquedas" >
		<table id="resultados_busqueda_dt" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Ingreso</th>
					<th>Materia</th>				
					<th>Abogado</th>
					<th>Usuario</th>
					<th>Reseña</th>
				</tr>
			</thead>        
			<tbody>				
				<?php 
					if (isset($info)) {
						if ($info->num_rows() > 0)
						{
						   foreach ($info->result() as $row)
						   {
								echo "<tr>";
									echo "<td>".$row->fec_ingreso."</td>";
									echo "<td>".$row->MATERIA."</td>";
									echo "<td ><img style='cursor:pointer;' onClick='abrir_dialogo_orientacion(\"../busqueda/detalle_abogado_orientacion/".$row->RUT_ABOGADO."\");' src='../../assets/images/lupa.png' height='15px'>".$row->ABOGADO."</td>";
									echo "<td ><img style='cursor:pointer;' onClick='abrir_dialogo_orientacion(\"../busqueda/detalle_usuario_orientacion/".$row->RUT_USUARIO."\");' src='../../assets/images/lupa_roja.png' height='15px'>".$row->USUARIO."</td>";				
								echo "</tr>";
						   }
						}
					}ELSE{
						
					}
				?>
			</tbody>
		</table>
	</div>

<script>
	$('#rol_busqueda').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas();
	}
	});	
	$('#alumno').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas();
	}
	});	
	$('#usuario').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas();
	}
	});	
	$('#abogado').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas();
	}
	});	



	
	$('#resultados_busqueda_dt').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>