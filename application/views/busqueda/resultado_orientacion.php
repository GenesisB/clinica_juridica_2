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
									echo "<td>".$row->ABOGADO."</td>";
									echo "<td>".$row->USUARIO."</td>";	
									echo "<td>".$row->resena."</td>";
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