<div style="margin:auto; width:60%;  padding:5px">
  <h2 style="text-align:center">Disponibilidad Profesor</h2>
	<table>
		<tr>
			<td>
				Fecha Inicio
			</td>
			<td>
				Fecha Fin
			</td>
			<td>
				Hora Inicio
			</td>
			<td>
				Hora Fin
			</td>
			<td>
				Sede
			</td>
			<td>
				Día
			</td>
		</tr>
		<?php


			if (isset($disponibilidad)) {
				if ($disponibilidad->num_rows() > 0){
					foreach ($disponibilidad->result() as $row){
						echo "<tr><td>".$row->fecha_inicio."</td><td>".$row->fecha_fin."</td><td>".$row->hora_inicio."</td><td>".$row->hora_fin."</td><td>".$row->nombre_sede."</td><td>".$row->dia."</td><td><button onclick=\"eliminar_asignacion('".$row->id_conf_agenda."');\">Eliminar</button></td></tr>";
					}
				}
			}

		?>
	</table>
  
</div>