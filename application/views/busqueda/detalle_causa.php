<br>
<?php 	if (isset($info)) {
			if ($info->num_rows() > 0)
			{
			   foreach ($info->result() as $row)
			   {					
						echo "<h2>Detalle de la Causa :".$row->id_causa."</h2><hr>";			  
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
					<th>Alumno</th>
					<th>RUT Alumno</th>
					<th>Usuario</th>
					<th>RUT Usuario</th>
					<th>Termino</th>
					<th>Causal Termino</th>
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
									echo "<td>".$row->id_causa."</td>";
									echo "<td>".$row->INGRESO."</td>";
									echo "<td>".$row->MATERIA."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Abogado' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_abogado/".$row->RUT_ABOGADO."\");' src='../../assets/images/lupa.png' height='15px'>".$row->ABOGADO."</td>";
									echo "<td >".$row->RUT_ABOGADO_COMPLETO."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Alumno' style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_alumno/".$row->RUT_ALUMNO."\");' src='../../assets/images/lupa_verde.png' height='15px'>".$row->ALUMNO."</td>";
									echo "<td >".$row->RUT_ALUMNO_COMPLETO."</td>";
									echo "<td ><img title='Haga click aqui para ver las causas del Usuario'  style='cursor:pointer;' onClick='abrir_dialogo(\"../busqueda/detalle_usuario/".$row->RUT_USUARIO."\");' src='../../assets/images/lupa_roja.png' height='15px'>".$row->USUARIO."</td>";
									echo "<td >".$row->RUT_USUARIO_COMPLETO."</td>";
									if($row->TERMINO != null && $row->TERMINO != ""){
										echo "<td>".$row->TERMINO."</td>";	
									}else{
										echo "<td ><input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Terminar\" onClick=\"terminar_causa('$row->id_causa');\"></td>";
									}
									echo "<td>".$row->CAUSAL_TERMINO."</td>";
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