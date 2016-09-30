<h2 style="text-align:center">Audiencias para Causa <?php foreach($audiencias->result() as $row0){ echo $row0->id_causa; break;}?></h2>
<div>
	<table cellspacing="0" width="100%" class="display" id="audiencias">
		<thead>
			<tr>
				<th>
					Num. Aduciencia
				</th>
				<th>
					Fecha
				</th>
				<th>
					Hora
				</th>
				<th>
					Tipo
				</th>
				<th>
					Descripcion
				</th>
				<th>
					Nota Final
				</th>
				<<th>
					Accion
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($audiencias)){
					if($audiencias->num_rows() > 0){
						foreach($audiencias->result() as $row){
							echo "<tr>";
								echo "<td>";
									echo "<label>".$row->numero_audiencia."<label>";
								echo "</td><td>";
									echo "<label>".date('d/m/Y', strtotime($row->fecha))."</label>";
								echo "</td><td>";
									echo "<label>".$row->hora."</label>";
								echo "</td><td>";
									echo "<label>".$row->tipo_audiencia."</label>";
								echo "</td><td>";
									echo "<label>".$row->descripcion."</label>";
								echo "</td>";
								echo "<td>";
									echo "<label>".$row->nota_final."</label>";
								echo "</td>";
								echo "<td ><input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Ver\" onclick=\"ver_audiencia('".$row->id_audiencia."');\"></td>";
							echo "</tr>";
						}
					}
				}
			?>			
		</tbody>
	</table>
</div>