
  <div class="fondo_formularios">
	  <h2 style="text-align:center">Detalle Audiencia</h2>
	  <br>
		  <table style="margin:auto;">
		  <?php foreach($audiencia->result() as $row0){?>
			<tr>
				<td>
				<label  for="tipo_audiencia">Tipo Audiencia: </label>  
				</td>
				<td>
					<input id="tipo_audiencia" name="tipo_audiencia" type="text"  disabled value="<?php echo $row0->tipo_audiencia; ?>">
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">Fecha: </label>  
				</td>
				<td >
					<input id="fecha_audiencia" name="fecha_audiencia" type="text"  disabled value="<?php echo date('d/m/Y', strtotime($row0->fecha)); ?>">
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">Hora: </label>  
				</td>
				<td >
					<input id="hora_audiencia" name="hora_audiencia" type="time"  disabled value="<?php echo $row0->hora; ?>">
				</td>
			</tr>
			<tr >
				<td>
				<label  for="descripcion">Descripcion: </label>
				</td>
				<td > 
					<textarea  style="resize: none;" rows="5" id="descripcion" name="descripcion" disabled ><?php echo $row0->descripcion; ?></textarea>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="alumno">Alumno: </label> 
				</td>
				<td >
					<input  id="alumno" disabled value="<?php echo $row0->nombre; ?>">
				</td>
			</tr>
		</table>
			<hr>
			<h2 style="text-align:center">Evaluación Audiencia</h2>
			<label  >I.- REGISTRO: </label> 
		<table style="margin:auto;">
			<tr>
				<td>
				<label  for="nota_audiencia">a) Antecedentes y Documentos del caso (Certificados, Informes): </label>  
				</td>
				<td >
				<select id="nota_registro_1" name="nota_registro_1"  disabled>
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_registro_1 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">b) Copia audiencias anteriores, resoluciones, notificaciones, etc: </label>  
				</td>
				<td >
					<select id="nota_registro_2" name="nota_registro_2"  disabled>
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_registro_2 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">c) Minuta de esta audiencia: </label>  
				</td>
				<td >
					<select id="nota_registro_3" name="nota_registro_3"  disabled>
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_registro_3 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">d) Otros Antecedentes ¿Cuáles?: </label>  
				</td>
				<td >
					<input id="nota_registro_otros" name="nota_registro_otros" type="text"  disabled value="<?php echo $row0->nota_registro_otros; ?>">
				</td>
			</tr>
		</table>
			<br>
			<label  >II.- DESTREZAS EN LITIGACION: </label>
			<br>
		<table style="margin:auto;">
			<tr >
				<td>
				<label  for="nota_audiencia">a) Conocimiento de los hechos: </label>  
				</td>
				<td >
				<select id="nota_destreza_1" name="nota_destreza_1"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_1 == $i."0"){
							echo "<option value=\"".$i."0\">".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">b) Derecho aplicable: </label>  
				</td>
				<td >
				<select id="nota_destreza_2" name="nota_destreza_2"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_2 == $i."0"){
							echo "<option value=\"".$i."0\">".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">c) Uso adecuado vocabulario jurídico: </label>  
				</td>
				<td >
				<select id="nota_destreza_3" name="nota_destreza_3"  disabled>
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_3 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">d) Exposición coherente de la teoría del caso: </label>  
				</td>
				<td >
				<select id="nota_destreza_4" name="nota_destreza_4"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_4 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
		</table>
			<br>
			<label  >e) MANEJO / DOMINIO, DE REGLAS DE LITIGACION ORAL: </label>
			<br>
		<table style="margin:auto;">
			<tr >
				<td>
				<label  for="nota_audiencia">Relación breve de demanda, contestación, etc: </label>  
				</td>
				<td >
				<select id="nota_destreza_5" name="nota_destreza_5"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_5 == $i."0"){
							echo "<option value=\"".$i."0\" selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">Litigación en incidente producido en audiencia: </label>  
				</td>
				<td >
				<select id="nota_destreza_6" name="nota_destreza_6"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_6 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Ofrecimiento de prueba: </label>  
				</td>
				<td >
				<select id="nota_destreza_7" name="nota_destreza_7"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_7 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
		</table>
			<br>
			<label  >INCORPORACION PRUEBA: </label>
			<br>
		<table style="margin:auto;">
			<tr > 
				<td>
				<label  for="nota_audiencia">Documental: </label>  
				</td>
				<td >
				<select id="nota_destreza_8" name="nota_destreza_8"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_8 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Examen / Contraexamen de testigos: </label>  
				</td>
				<td >
				<select id="nota_destreza_9" name="nota_destreza_9"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_9 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Examen / Contraexamen peritos: </label>  
				</td>
				<td >
				<select id="nota_destreza_10" name="nota_destreza_10"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_10 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Alegato de clausura: </label>  
				</td>
				<td >
				<select id="nota_destreza_11" name="nota_destreza_11"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_11 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<br>
			<tr >
				<td>
				<label  for="nota_audiencia">f) Capacidad para resolver situaciones inesperadas: </label>  
				</td>
				<td >
				<select id="nota_destreza_12" name="nota_destreza_12"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_destreza_12 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">III.- OTROS ASPECTO: </label> 
				</td>
						
				<td >
				<select id="nota_item_3" name="nota_item_3"  disabled >
					<?php for ( $i = 1; $i < 8; $i++ ){
						if($row0->nota_item_3 == $i."0"){
							echo "<option value=\"".$i."0\"selected >".$i.",0</option>";
						}
					}?>
				</select>
				</td>
			</tr>
		</table>
		<br>
	  <?php }?>
  </div>