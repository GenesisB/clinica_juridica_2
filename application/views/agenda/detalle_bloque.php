
			
<?php	

if (isset($asignacion)) {
	if ($asignacion->num_rows() > 0)
	{
										
		echo "<h2>Bloques Agendados</h2>	      ";
		
		echo "	<table id='tabla_asignados'>  ";
		echo "		<thead>                   ";
		echo "			<tr>                  ";
		echo "				<th>              ";
		echo "					Profesor      ";
		echo "				</th>             ";
		echo "				<th>              ";
		echo "					Causa         ";
		echo "				</th>             ";
		echo "				                  ";
		echo "				<th>              ";
		echo "					Fecha         ";
		echo "				</th>             ";
		echo "				                  ";
		echo "				<th>              ";
		echo "					Hora inicio   ";
		echo "				</th>             ";
		echo "                                 ";
		echo "				<th>              ";
		echo "					Hora fin      ";
		echo "				</th>			  ";
		echo "				<th>              ";
		echo "					Eliminar Agendacion     ";
		echo "				</th>			  ";			
		echo "			</tr>                 ";
		echo "		</thead>                  ";
		echo "		<tbody>	                  ";
	   foreach ($asignacion->result() as $row)
	   {
			echo "<tr>";
			echo "<th>";
			echo "	$row->rut";
			echo "</th>";
			
			echo "<th style=\"cursor:pointer;\" onclick=\"abrir_dialogo2('../busqueda/detalle_causa/$row->id_asunto')\" >";
			echo "	$row->id_asunto";
			echo "</th>";
			
			echo "<th>";
			echo "	$row->fecha_asignacion";
			echo "</th>";
		
			echo "<th>";
			echo "	$row->hora_inicio";
			echo "</th>";
		   
			echo "<th>";
			echo "	$row->hora_fin";
			echo "</th>	";
			
			echo "<th style=\"cursor:pointer;\" onclick=\"eliminar_agendacion('$row->id_asignacion')\">";
			echo "	Eliminar";
			echo "</th>	";
			echo "</tr>";
	  
	   }
	   echo "</tbody>";
		echo "</table>";
	}
}

?>
			
			
				
		<br>
		
		<br>
		<?php	 

	$comodin = 1;
	if (isset($profesores_disponibles)) {
		if ($profesores_disponibles->num_rows() > 0)
		{
											
		
		   foreach ($profesores_disponibles->result() as $row)
		   {
			   	
			   if($row->cantidad==0){
				   
			   if($comodin == 1){
					echo "<h2>Profesores Disponibles para Agendar</h2>	      ";
			
					echo "	<table id='tabla_profesores_disponibles'>  ";
					echo "		<thead>                   ";
					echo "			<tr>                  ";
					echo "				<th>              ";
					echo "					Rut Profesor      ";
					echo "				</th>             ";
					echo "				<th>              ";
					echo "					Nombre Profesor      ";
					echo "				</th>             ";
					echo "				<th>              ";
					echo "					Agendar Causa Nueva     ";
					echo "				</th>			  ";
					echo "				<th>              ";
					echo "					Agendar Causa Asignada     ";
					echo "				</th>			  ";
					
					echo "				<th>			  ";
					echo "					Agendar Audiencia     ";
					echo "				</th>			  ";
					
					echo "				<th>			  ";
					echo "					Agendar Asunto     ";
					echo "				</th>			  ";
					echo "			</tr>                 ";
					echo "		</thead>                  ";
					echo "		<tbody>	                  ";
					$comodin = 2;
				}
			   echo "			<tr>                  ";
					echo "<td>";
					echo "	$row->rut-$row->dv";
					echo "</td>";
					echo "<td>";
					echo "	$row->nombre ";
					echo "</td>";
					echo "<td style='cursor:pointer;' onClick=\"abrir_bloque_nueva_agendacion('$dia', '$hora','$row->rut', 'C') \">";
					echo "	Agendar Causa Nueva";
					echo "</td>	";					
				   
					echo "<td style='cursor:pointer;' onClick=\"abrir_detalle_bloque('$dia', '$hora','$row->rut', 'C') \">";
					echo "	Agendar Causa Asignada  ";
					echo "</td>	";
					
					echo "<td style='cursor:pointer;' onClick=\"abrir_detalle_bloque('$dia', '$hora','$row->rut', 'Au') \">";
					echo "	Agendar Audiencia  ";
					echo "</td>	";
					
					echo "<td style='cursor:pointer;' onClick=\"abrir_bloque_nuevo_asunto('$dia', '$hora','$row->rut', 'A') \">";
					echo "	Agendar Asunto  ";
					echo "</td>	";
				echo "			</tr>                  ";
			   }
			   }
		   echo "</tbody>";
			echo "</table>";
		}
	}

?>

		
		
	
<script>
		
	$('#tabla_asignados').DataTable({
			"pagingType": "simple_numbers"
	} );
	$('#tabla_libres').DataTable({
			"pagingType": "simple_numbers"
	} );
	$('#tabla_profesores_disponibles').DataTable({
			"pagingType": "simple_numbers"
	} );
	
</script>	
