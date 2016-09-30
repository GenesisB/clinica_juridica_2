				
<?php 	if (isset($info)) {
			if ($info->num_rows() > 0)
			{
				$contador = 0;
			   foreach ($info->result() as $row)
				{
					if($contador == 0){						
						
						echo "<div style='border: 1px solid #000000; margin-bottom:5px;'>";
							echo "<p class='titulo_div'>Causas Asociadas al Abogado</p>";
							echo "<table style='width:100%;     margin-top: -20px;'>";
								echo "<tr>";								
									echo "<th>Nombre: ".$row->ABOGADO."</th>";
									echo "<th>Rut:  ".$row->RUT_ABOGADO_COMPLETO."</th>";
									echo "<th>Cantidad de Causas: ".$info->num_rows()."</th>";			
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
		
					echo "<hidden id=\"tipo_agendacion\" style=\"display:none\">".$tipo."</hidden>";				
					
				?>
		
				
				
				
				

		<table id="detalle_causa_agendar" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID Causa</th>
					<th style="width: 64px;";>Ingreso</th>
					<th>Materia</th>										
					<th>Alumno</th>
					<th>RUT Alumno</th>
					<th>Usuario</th>
					<th>RUT Usuario</th>
					<th>Termino</th>
					<th>Agendar</th>
					
					
					
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
									echo "<td><img title='Haga click aqui para ver detalles de la causa'  style='cursor:pointer;' onClick='abrir_dialogo2(\"../busqueda/detalle_causa/".$row->id_causa."\");' src='../../assets/images/info.png' height='15px'>".$row->id_causa."</td>";
									echo "<td>".$row->INGRESO."</td>";
									echo "<td>".$row->MATERIA."</td>";								
									echo "<td >".$row->ALUMNO."</td>";
									echo "<td >".$row->RUT_ALUMNO_COMPLETO."</td>";
									echo "<td >".$row->USUARIO."</td>";
									echo "<td >".$row->RUT_USUARIO_COMPLETO."</td>";
									echo "<td>".$row->TERMINO."</td>";	
									echo "<td onClick=\"agendar_causa('$row->RUT_ABOGADO','$dia','$row->id_causa','$hora','causa')\"> Agendar </td>";	
								echo "</tr>";
							  
							  
						   }
						}
					}ELSE{
						
					}
				?>
			</tbody>
		</table>
	

<script>
		
	$('#detalle_causa_agendar').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>