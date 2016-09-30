
	<h2 class="titulo_fieldset">Búsqueda Unificada de Causas Historicas</h2>
	
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
		<a style="margin-left: 30px; margin-right:5px;">Rol de Causa</a>
		<input type="text" name="rol_busqueda" id="rol_busqueda">
		
		<a style="margin-left: 30px; margin-right:5px;">Abogado</a>
		<input type="text" name="abogado" id="abogado">
		
		<a style="margin-left: 30px; margin-right:5px;">Alumno</a>
		<input type="text" name="alumno" id="alumno">
		
		<a style="margin-left: 30px; margin-right:5px;">Usuario</a>
		<input type="text" name="usuario" id="usuario">
		<br><br>
		
		
		
		
		<div style="visibility:hidden; position:absolute;">
		<input style="margin-left: 40px; margin-right:5px;" type="radio" name="tipo_busqueda" value="rut" >Buscar por RUT<br>
		<input style="margin-left: 40px; margin-right:5px;" type="radio" name="tipo_busqueda" value="nombres" checked>Buscar por Nombres<br>
		</div>
		 
		
		<button onClick="buscar_causas_historicas();" class="boton" style="margin-right:15px;float:right;">Buscar</button>
		
		<div style="clear:both"></div>
	<br><hr>
		
				
	</div> 
	<h3 class="titulo_fieldset">Resultado Búsqueda </h3>
	<div id="resultados_busquedas" >
		<table id="resultados_busqueda_dt" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Rol Causa</th>
					<th>Ingreso</th>
					<th>Materia</th>
					<th>Abogado</th>					
					<th>Alumno</th>
					<th>Usuario</th>
					<th>Termino</th>
					
					
					
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
									echo "<td><img style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$row->id_causa."\");' src='../../assets/images/info.png' height='15px'>".$row->id_causa."</td>";
									echo "<td>".$row->INGRESO."</td>";
									echo "<td>".$row->MATERIA."</td>";
									echo "<td ><img style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_abogado/".$row->RUT_ABOGADO."\");' src='../../assets/images/lupa.png' height='15px'>".$row->ABOGADO."</td>";
									echo "<td ><img style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_alumno/".$row->RUT_ALUMNO."\");' src='../../assets/images/lupa_verde.png' height='15px'>".$row->ALUMNO."</td>";
									echo "<td ><img style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_usuario/".$row->RUT_USUARIO."\");' src='../../assets/images/lupa_roja.png' height='15px'>".$row->USUARIO."</td>";
									echo "<td>".$row->TERMINO."</td>";					
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
		buscar_causas_historicas();
	}
	});	
	$('#alumno').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas_historicas();
	}
	});	
	$('#usuario').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas_historicas();
	}
	});	
	$('#abogado').keyup(function(e){
	if(e.keyCode == 13)	{
		buscar_causas_historicas();
	}
	});	



	
	$('#resultados_busqueda_dt').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>