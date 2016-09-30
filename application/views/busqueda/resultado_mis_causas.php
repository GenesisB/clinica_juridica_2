
		<table id="resultados_busqueda_dt" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Rol Causa</th>
					<th style="    width: 64px;";>Ingreso</th>
					<th>Materia</th>
					<th>Abogado</th>
					<th>Alumno</th>
					<th>Usuario</th>
					<?php
						if($tipo=="P"){
									echo "<th>Terminar</th>";
						}
					?>

					<th >Audiencias</th>
					<?php
						if($tipo=="P"){
									echo "<th>Ingreso Audiencia</th>";
						}
					?>





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
									echo "<td>".$row->ABOGADO."</td>";
									echo "<td >".$row->ALUMNO."</td>";
									echo "<td >".$row->USUARIO."</td>";
									if($tipo=="P"){
									echo "<td ><input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Terminar\" onClick=\"terminar_causa('$row->id_causa','personal');\"></td>";


									}

									echo "<td style=\"text-align: center;\" ><img style=\"cursor:pointer;\" onclick=\"trae_audiencias_2('$row->id_causa','personal');\" src=\"../../assets/images/audiencia.gif\" height=\"19px\"></td>";
									if($tipo=="P"){
									echo "<td ><input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Ingresar\" onClick=\"abrir_dialogo_audiencia_individual('$row->id_causa');\"></td>";

									}
								echo "</tr>";


						   }
						}
					}else{

					}


				?>
			</tbody>
		</table>


<script>

	$('#resultados_busqueda_dt').DataTable({
			"pagingType": "simple_numbers"
	} );


</script>
