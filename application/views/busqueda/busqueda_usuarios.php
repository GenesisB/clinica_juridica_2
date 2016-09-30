<div style="border: 1px solid #cfd9db; margin-bottom:5px;width:60%;margin-left:20%;margin-top:40px;">
			<p class="titulo_div">Búsqueda Usuarios</p>
	<table cellspacing="0" width="100%" class="display" id="usuarios">
		<thead>
			<tr>
				<th>
					Rut
				</th>
				<th>
					Nombre
				</th>
				<th>
					Accion
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($usuarios)){
					if($usuarios->num_rows() > 0){
						foreach($usuarios->result() as $row){
						echo "<tr>";
							echo "<td>";
								echo "<label id=\"rut_".$row->rut_cliente."\">".$row->rut_cliente."-".$row->dv_cliente."<label>";
							echo "</td><td>";
								echo "<label id=\"nombre_".$row->rut_cliente."\">".$row->nombre_cliente."</label>";
							echo "</td><td>";
								echo "<input style=\"height:40px;	width:100px;margin-top:10px;border-radius:10px;\" type=\"button\" value=\"Seleccionar\" onClick=\"asignar_usuario('".$row->rut_cliente."-".$row->dv_cliente."', '".$tipo."', '".$row->nombre_cliente."', '".$row->telefono."', '".$row->domicilio."', '".$row->email."');\">";
							echo "</td>";
						echo "</tr>";
						}
					}
			}?>			
		</tbody>
	</table>
</div>