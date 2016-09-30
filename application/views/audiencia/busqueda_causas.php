<div style="border: 1px solid #cfd9db; margin-bottom:5px;width:60%;margin-left:20%;margin-top:40px;">
			<p class="titulo_div">Búsqueda Audiencias Causa </p>
	<table cellspacing="0" width="100%" class="display" id="causas">
		<thead>
			<tr>
				<th>
					Rol
				</th>
				<th>
					Abogado
				</th>
				<th>
					Alumno
				</th>
				<th>
					Usuario
				</th>
				<th>
					Accion
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($info)){
					if($info->num_rows() > 0){
						foreach($info->result() as $row){
						echo "<tr>";
							echo "<td>";
								echo "<label>".$row->id_causa."<label>";
							echo "</td><td>";
								echo "<label>".$row->ABOGADO."</label>";
							echo "</td><td>";
								echo "<label>".$row->ALUMNO."</label>";
							echo "</td><td>";
								echo "<label>".$row->USUARIO."</label>";
							echo "</td><td>";
								echo "<input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Seleccionar\" onClick=\"trae_audiencias('".$row->id_causa."');\">";
							echo "</td>";
						echo "</tr>";
						}
					}
			}?>			
		</tbody>
	</table>
</div>