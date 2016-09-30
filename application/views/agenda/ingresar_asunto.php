<?php if($tipo != 'Au'){ ?>
<div class="fondo_formularios">
  <h2 style="text-align:center">Nuevo Asunto</h2>

   <table style="margin:auto;">
	  <tr>
		<td>
			<label  for="nombre_usuario">Nombre Asunto</label>  
		</td>
		<td>
			<input id="nombre_asunto" name="nombre_asunto" type="text" >
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="rut_usuario">Descripcion</label>  
		</td>
		<td>
			<input id="descripcion_asunto" name="descripcion_asunto" type="text"  >
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="list_abogado">Abogado</label>  
		</td>		
		<td>
			<select id="list_abogados" name="list_abogado"   disabled>
			  <?php
			  
			  echo "<option value='0'>Seleccionar</option>";
			  if (isset($info)) {
							if ($info->num_rows() > 0)
							{
							   foreach ($info->result() as $row)
							   {
								   if($row->rut != $profesor_a_cargar){
									echo "<option value='".$row->rut."'>".$row->nombre."</option>";
								   }
									else{
										echo "<option value='".$row->rut."' selected>".$row->nombre."</option>";
									}
							   }
							}
			  }
			  
			?>
			  </select>
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="fecha_causa_ingreso">Fecha</label> 
		</td>
		<td>
			<?php if($dia){
				echo "<input id=\"fecha_ingreso\" type=\"text\" value='$dia' disabled></input>" ;
			}else{
				echo "<input id=\"fecha_ingreso\" type=\"text\"  ></input>";
			}?>
			
			
		</td>
	  </tr>
	<tr >
		<td>
			<label  for="fecha_causa_ingreso">Hora</label>  
		</td>
		<td>
			<?php if($hora){
				echo "<input id=\"set_hora\"  type=\"text\" value='$hora' disabled></input>";
			}?>
		</td>
	</tr>
	
	
  </table>
  <div style="text-align:center;">
  <br><br>
	<button id="nuevo_asunto" name="nuevo_asunto"  onClick="ingresar_asunto('As');">Agendar</button>
  </div>
</div>
<?php }else{ ?>
<div class="fondo_formularios">
  <h2 style="text-align:center">Agendacion de Audiencia</h2>

   <table style="margin:auto;">
	  <tr>
		<td>
			<label  for="nombre_usuario">Tipo Audiencia</label>  
		</td>
		<td>
			<input id="nombre_asunto" name="nombre_asunto" type="text" >
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="rut_usuario">Descripcion</label>  
		</td>
		<td>
			<input id="descripcion_asunto" name="descripcion_asunto" type="text"  >
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="list_abogado">Abogado</label>  
		</td>		
		<td>
			<select id="list_abogados" name="list_abogado"   disabled>
			  <?php
			  
			  echo "<option value='0'>Seleccionar</option>";
			  if (isset($info)) {
							if ($info->num_rows() > 0)
							{
							   foreach ($info->result() as $row)
							   {
								   if($row->rut != $profesor_a_cargar){
									echo "<option value='".$row->rut."'>".$row->nombre."</option>";
								   }
									else{
										echo "<option value='".$row->rut."' selected>".$row->nombre."</option>";
									}
							   }
							}
			  }
			  
			?>
			  </select>
		</td>
	  </tr>
	  <tr>
		<td>
			<label  for="fecha_causa_ingreso">Fecha</label> 
		</td>
		<td>
			<?php if($dia){
				echo "<input id=\"fecha_ingreso\" type=\"text\" value='$dia' disabled></input>" ;
			}else{
				echo "<input id=\"fecha_ingreso\" type=\"text\"  ></input>";
			}?>
			
			
		</td>
	  </tr>
	<tr >
		<td>
			<label  for="fecha_causa_ingreso">Hora</label>  
		</td>
		<td>
			<?php if($hora){
				echo "<input id=\"set_hora\"  type=\"text\" value='$hora' disabled></input>";
			}?>
		</td>
	</tr>
	
			
	
	
  </table>
  <div style="text-align:center;">
  <br><br>
	<button id="nuevo_asunto" name="nuevo_asunto" onClick="ingresar_asunto('Au');">Agendar</button>
  </div>
  
  
</div>
<?php echo "<hidden id=\"causa_audiencia\" style=\"display:none\">".$causa."</hidden>"; ?>
	 
				
			
<?php } ?>