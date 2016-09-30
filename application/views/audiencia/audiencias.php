


  <p id="causa_id" style="visibility: hidden;"></p>
  <div class="fondo_formularios">
	<h2 style="text-align:center">Audiencias por Causa</h2>
		<table style="margin:auto;">
			<tr>
            <td>
					<button id="add_audiencia" name="add_audiencia" style="display:none;" onclick="abrir_dialogo_audiencia();">Ingresar Audiencia</button>
			 	</td>
				<td>
					<button type="button" onClick="dialogo_buscar_causas_audiencias();"  title="Buscar una causa"><img style='cursor:pointer;'  src='../../assets/images/lupa.png' height='24px'></button>
				</td>

            <td>
					<label for="id_causa">Causa</label>
				</td>
				<td>
					<input id="id_causa" name="id_causa" type="text"  readonly style="background-color:#d0e0e0;">
				</td>
			</tr>
		</table>
  </div>
  <hr>
  <div id="res_audiencia">
  </div>
