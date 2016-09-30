
	
		<div id="agenda" >
			<table id="tabla_agenda">
				<thead>
					<tr>
						<th>
							tipo 
						</th>
						
						<th>
							fecha solicitud
						</th>
						
						<th>
							hora/bloque
						</th>
						
						<th>
							nombre usuario
						</th>
							
						<th>
							telefono contacto
						</th>
							
						<th>
							materia
						</th>
						
						<th>
							parte o caratula
						</th>
						
						<th>
							fecha audiencia
						</th>
						
						<th>
							OK
						</th>				
					</tr>
				</thead>
				<tbody>	
					<?php 
						if (isset($info)) {
							if ($info->num_rows() > 0)
							{
							   foreach ($info->result() as $row)
							   {
								if($dia=='Lunes'){
									if($row->lunes=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Martes'){
									if($row->martes=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Miercoles'){
									if($row->miercoles=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Jueves'){
									if($row->jueves=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Viernes'){
									if($row->viernes=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Sabado'){
									if($row->sabado=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}else if($dia=='Domingo'){
									if($row->domingo=='si'){
										echo"<tr>";
										echo"<td>".$row->horario."</td>";
										echo"<td> </td>";
										echo"<td>".$row->BLOQUE."</td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"<td> </td>";
										echo"</tr>";	
									}									
								}
										
								  
								  
							   }
							}
						}ELSE{
							echo"<tr>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td></td>";
							echo"</tr>";
							
						}
							
						
					?>
				
			
			
				</tbody>	
			</table>
		</div>
		
	
<script>
		
	$('#tabla_agenda').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>	
