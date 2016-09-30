
<div class="fondo_formularios">
  <h2 style="text-align:center">Ingreso Causa Clinica Juridica UNAB</h2>

  <table style="margin:auto;">
	<tr >
		<td>
			<label  for="tipo_audiencia">Profesor: </label>  
		</td>
		
		<td>
			<input id="rut" name="rut" type="text" >&nbsp 
		<img style='cursor:pointer;' onClick="buscar_profesor();" src='../../assets/images/lupa.png' height='15px'>
      
		</td>
		
	</tr>
	<tr >
		<td>
			<label  for="tipo_audiencia">Dia Inicio: </label> 
		</td>		
		<td >
			<input id="fecha_inicio" name="fecha_inicio" type="text" >
		</td>
		
	</tr>
	<tr >
		<td>
			<label  for="tipo_audiencia">Dia Término: </label>  
		</td>
		<td >
			<input id="fecha_termino" name="fecha_termino" type="text" >
		</td>
		
	</tr>
	<tr >
		<td>
			<label  for="tipo_audiencia">Hora Inicio: </label>  
		</td>
		<td >
			<input id="hora_inicio" name="hora_inicio" type="time" step="1800" >
		</td>
		
	</tr>
	<tr >
		<td>
			<label  for="tipo_audiencia">Hora Término: </label>  
		</td>
		<td >
			<input id="hora_fin" name="hora_fin" type="time" step="1800"  >
		</td>
		
	</tr>
	<tr >
		<td>
		<label  for="tipo_audiencia">Día: </label>  
		</td>
		<td >
			<select id="dia" >
			  <option value="lunes">Lunes</option>
			  <option value="martes">Martes</option>
			  <option value="miercoles">Miercoles</option>
			  <option value="jueves">Jueves</option>
			  <option value="viernes">Viernes</option>
			</select>
		</td>
		
	</tr>
	
			
	
  </table>
  
  <div style="text-align:center;">
  <br><br>
	<button onclick="ingresar_bloque();" >Ingresar Bloque</button>
  </div>
  <div id="disponibilidad_profesor"></div>
  
</div>