
  
	<p id="causa_audiencia" hidden><?php echo $id_causa ?></p>
	<?php foreach($info_causa->result() as $row){
		echo "<input type=\"text\" hidden id=\"rut_alumno\" value=\"".$row->RUT_ALUMNO."\">";
		echo "<input type=\"text\" hidden id=\"rut_profesor\" value=\"".$row->RUT_ABOGADO."\">";
	}
	?>
 
  <div class="fondo_formularios">
	  <h2 style="text-align:center">Detalle Audiencia</h2>
	  <br>
		  <table style="margin:auto;">
		  
			<tr>
				<td>
				<label  for="tipo_audiencia">Tipo Audiencia: </label>  
				</td>
				<td>
					<input id="tipo_audiencia" name="tipo_audiencia" type="text" >
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">Fecha: </label>  
				</td>
				<td >
					<input id="fecha_audiencia" name="fecha_audiencia" type="text" >
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">Hora: </label>  
				</td>
				<td >
					<input id="hora_audiencia" name="hora_audiencia" type="time"  >
				</td>
			</tr>
			<tr >
				<td>
				<label  for="descripcion">Descripcion: </label>
				</td>
				<td > 
					<textarea  style="resize: none;" rows="5" id="descripcion" name="descripcion" ></textarea>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="alumno">Alumno: </label> 
				</td>
				<td >
					<?php foreach($info_causa->result() as $row){
						echo "<input id=\"alumno\" disabled value=\"".$row->ALUMNO."\">";
						break;
					}?>
				</td>
			</tr>
		</table>
			<hr>
			<h2 style="text-align:center">Evaluación Audiencia</h2>
			<label  >I.- REGISTRO: </label> 
		<table>
			<tr>
				<td>
				<label  for="nota_audiencia">a) Antecedentes y Documentos del caso (Certificados, Informes): </label>  
				</td>
				<td >
				<select id="nota_registro_1" name="nota_registro_1"  >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">b) Copia audiencias anteriores, resoluciones, notificaciones, etc: </label>  
				</td>
				<td >
					<select id="nota_registro_2" name="nota_registro_2"  >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">c) Minuta de esta audiencia: </label>  
				</td>
				<td >
					<select id="nota_registro_3" name="nota_registro_3"  >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="tipo_audiencia">d) Otros Antecedentes ¿Cuáles?: </label>  
				</td>
				<td >
					<input id="nota_registro_otros" name="nota_registro_otros" type="text" >
				</td>
			</tr>
		</table>
			<label  >II.- DESTREZAS EN LITIGACION: </label>
			<br>
		<table>
			<tr >
				<td>
				<label  for="nota_audiencia">a) Conocimiento de los hechos: </label>  
				</td>
				<td >
				<select id="nota_destreza_1" name="nota_destreza_1"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\">".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">b) Derecho aplicable: </label>  
				</td>
				<td >
				<select id="nota_destreza_2" name="nota_destreza_2"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\">".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">c) Uso adecuado vocabulario jurídico: </label>  
				</td>
				<td >
				<select id="nota_destreza_3" name="nota_destreza_3"  >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">d) Exposición coherente de la teoría del caso: </label>  
				</td>
				<td >
				<select id="nota_destreza_4" name="nota_destreza_4"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
		</table>
			<label  >e) MANEJO / DOMINIO, DE REGLAS DE LITIGACION ORAL: </label>
			<br>
		<table>
			<tr >
				<td>
				<label  for="nota_audiencia">Relación breve de demanda, contestación, etc: </label>  
				</td>
				<td >
				<select id="nota_destreza_5" name="nota_destreza_5"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\"  >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr >
				<td>
				<label  for="nota_audiencia">Litigación en incidente producido en audiencia: </label>  
				</td>
				<td >
				<select id="nota_destreza_6" name="nota_destreza_6"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Ofrecimiento de prueba: </label>  
				</td>
				<td >
				<select id="nota_destreza_7" name="nota_destreza_7"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
		</table>
			<label  >INCORPORACION PRUEBA: </label>
			<br>
		<table>
			<tr > 
				<td>
				<label  for="nota_audiencia">Documental: </label>  
				</td>
				<td >
				<select id="nota_destreza_8" name="nota_destreza_8"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
						
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Examen / Contraexamen de testigos: </label>  
				</td>
				<td >
				<select id="nota_destreza_9" name="nota_destreza_9"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
						
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Examen / Contraexamen peritos: </label>  
				</td>
				<td >
				<select id="nota_destreza_10" name="nota_destreza_10"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">Alegato de clausura: </label>  
				</td>
				<td >
				<select id="nota_destreza_11" name="nota_destreza_11"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
						
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
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
				<select id="nota_destreza_12" name="nota_destreza_12"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
						
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
			<tr > 
				<td>
				<label  for="nota_audiencia">III.- OTROS ASPECTO: </label> 
				</td>
						
				<td >
				<select id="nota_item_3" name="nota_item_3"   >
					<?php for ( $i = 1; $i < 8; $i++ ){
					
							echo "<option value=\"".$i."0\" >".$i.",0</option>";
						
					}?>
				</select>
				</td>
			</tr>
		</table>
		<br>
		<button type="button" onclick="add_audiencia()"  >Ingresar</button>
	 
  </div>
  <script>$("#fecha_audiencia" ).datepicker({ dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, showButtonPanel: true });
				   $.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '<Ant',
					nextText: 'Sig>',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: true,
					yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);</script>