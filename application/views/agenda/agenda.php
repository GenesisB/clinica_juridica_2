
	<h2 class="titulo_fieldset">AGENDA DE CAUSAS</h2>
	
	<hr>
	
	
	<div>
		<table style="width:100%; margin: 0px auto;">
			<tr style="width:100%;">
				<th style="width:25%; text-align: left;">
					<h2 onClick="restar_dia();" ><-</h2>
				</th>
				<th style="width:25%; text-align: center;">
					<label  ID="fecha_agenda_texto"  name="fecha_agenda_texto"></label>
				</th>
				<th style="width:25%; text-align: center;">
					<input id="fecha_agenda" name="fecha_agenda" type="text" style="width: 215px;    height: 50px;    font-size: 40px;" readonly/>
				</th>
				
				<th style="width:25%; text-align: right;">
					<h2 onClick="sumar_dia();">-></h2>
				</th>
			</tr>
		</table>
		<br><hr><br>
		<div id="agenda" >
			<table id="tabla_agenda">
				<thead>
					<tr>
						<th>
							tipo 
						</th>
						
						<th>
							fecha hoy
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
		
	
				
	</div> 
<script>
		
	$('#tabla_agenda').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>	
