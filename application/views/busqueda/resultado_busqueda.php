
		<table id="resultados_busqueda_dt" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Rol Causa</th>
					<th style="    width: 64px;";>Ingreso</th>
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
									echo "<td><img title='Haga click aqui para ver detalles de la causa' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$row->id_causa."\");' src='../../assets/images/info.png' height='15px'>".$row->id_causa."</td>";
									echo "<td>".$row->INGRESO."</td>";
									echo "<td>".$row->MATERIA."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Abogado' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_abogado/".$row->RUT_ABOGADO."\");' src='../../assets/images/lupa.png' height='15px'>".$row->ABOGADO."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Alumno' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_alumno/".$row->RUT_ALUMNO."\");' src='../../assets/images/lupa_verde.png' height='15px'>".$row->ALUMNO."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Usuario' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_usuario/".$row->RUT_USUARIO."\");' src='../../assets/images/lupa_roja.png' height='15px'>".$row->USUARIO."</td>";
									echo "<td>".$row->TERMINO."</td>";					
								echo "</tr>";
							  
							  
						   }
						}
					}ELSE{
						
					}
						
					
				?>
			</tbody>
		</table>
	

<script>
		
	$('#resultados_busqueda_dt').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>