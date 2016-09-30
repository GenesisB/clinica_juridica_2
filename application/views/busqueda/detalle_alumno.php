		<br>		
<?php 	if (isset($info)) {
			if ($info->num_rows() > 0)
			{
				$contador = 0;
			   foreach ($info->result() as $row)
				{
					if($contador == 0){						
						
						echo "<div style='border: 1px solid #000000; margin-bottom:5px;'>";
							echo "<p class='titulo_div'>Causas Asociadas al Alumno</p>";
							echo "<table style='width:100%;     margin-top: -20px;'>";
								echo "<tr>";								
									echo "<th>Nombre: ".$row->ALUMNO."</th>";
									echo "<th>Rut:  ".$row->RUT_ALUMNO_COMPLETO."</th>";
									echo "<th>Cantidad de Causas: ".$info->num_rows()."</th>";	
									echo "<th>Promedio de Notas: ".$promedio."</th>";	
								echo "</tr>";
							echo "</table>";
						echo "</div>";
						echo "<br><br>";
					$contador = $contador + 1;
					}
				}
			}
		}ELSE{						
		}
						
					
				?>
		
				
				
				
				

		<table id="detalle_causa" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID Causa</th>
					<th style="width: 64px;";>Ingreso</th>
					<th>Materia</th>
					<th>Abogado</th>
					<th>RUT Abogado</th>	
					<th>Usuario</th>
					<th>RUT Usuario</th>					
					<th>Termino</th>
					<th>Audiencias</th>
					<th>Agendaciones</th>
					
					
					
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
									echo "<td><img title='Haga click aqui para ver detalles de la causa'  style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_causa/".$row->id_causa."\");' src='../../assets/images/info.png' height='15px'>".$row->id_causa."</td>";
									echo "<td>".$row->INGRESO."</td>";
									echo "<td>".$row->MATERIA."</td>";								
									echo "<td ><img  title='Haga click aqui para ver las causas del Abogado' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_abogado/".$row->RUT_ABOGADO."\");' src='../../assets/images/lupa.png' height='15px'>".$row->ABOGADO."</td>";
									echo "<td >".$row->RUT_ABOGADO_COMPLETO."</td>";
									echo "<td ><img  title='Haga click aqui para ver las causas del Usuario' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_usuario/".$row->RUT_USUARIO."\");' src='../../assets/images/lupa_roja.png' height='15px'>".$row->USUARIO."</td>";
									echo "<td >".$row->RUT_USUARIO_COMPLETO."</td>";
									echo "<td>".$row->TERMINO."</td>";	
									echo "<td> <img style='cursor:pointer;' onClick=\"trae_audiencias_2('".$row->id_causa."');\"  src='../../assets/images/audiencia.gif' height='19px'> ".$row->cantidad_audiencias." Audiencias</td>";	
									
									echo "<td><img style='cursor:pointer;' onClick=\"trae_agendaciones('".$row->id_causa."');\"  src='../../assets/images/audiencia.gif' height='19px'> ".$row->cantidad_agendaciones." Agendaciones</td>";	
								echo "</tr>";
							  
							  
						   }
						}
					}ELSE{
						
					}
						
					
				?>
			</tbody>
		</table>
	

<script>
		
	$('#detalle_causa').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>