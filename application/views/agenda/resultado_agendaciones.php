<h2 style="text-align:center">Agendaciones para Causa <?php foreach($agendaciones->result() as $row0){ echo $row0->id_asunto; break;}?></h2>
<div>
	<table cellspacing="0" width="100%" class="display" id="agendaciones">
		<thead>
			<tr>
				<th>
					Fecha
				</th>
				<th>
					Hora Inicio
				</th>
				<th>
					Hora Fin
				</th>
				<th>
					Estado
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($agendaciones)){
					if($agendaciones->num_rows() > 0){
						foreach($agendaciones->result() as $row){
							echo "<tr>";
								echo "<td>";
									echo "<label>".date('d/m/Y', strtotime($row->fecha_asignacion))."</label>";
								echo "</td><td>";
									echo "<label>".$row->hora_inicio."</label>";
								echo "</td><td>";
									echo "<label>".$row->hora_fin."</label>";
								echo "</td><td>";
									echo "<label style='cursor:pointer;' onclick=\"cambio_estado_agendacion(".$row->id_asignacion.", ".$row->id_asunto.");\">".$row->estado."</label>";
								echo "</td>";
							echo "</tr>";
						}
					}
				}
			?>			
		</tbody>
	</table>
</div>