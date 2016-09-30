
	<h2 class="titulo_fieldset">AGENDA SEMANAL</h2>	
	<hr>
	Seleccion de profesor 
	<select id="profesor_seleccionado"> <!-- Aca cargo los profesores segun la query que me manda mechjon-->
		<?php
		  
		  echo "<option value=''>Todos</option>";
		  if (isset($profesores)) {
						if ($profesores->num_rows() > 0)
						{
						   foreach ($profesores->result() as $row)
						   {
								if($profesor_seleccionado == $row->rut){
									echo "<option value='".$row->rut."' selected='true'>".$row->nombre." ".$row->cantidad."  </option>";
								}else{
									echo "<option value='".$row->rut."'>".$row->nombre." ".$row->cantidad." </option>";
								}
							  
						   }
						}
		  }
		  
		?>
	</select>
	&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp  Seleccion de semana <input id="fecha_causa" name="fecha_causa" type="text" value="<?php echo $fecha_hoy?>"/>
	
	<button onClick="cargar_calendario_prof_dia();">Cargar</button>
	<hr>
	
	<div class="mycal" style="width:100%;"></div>
	<hr>
	
	<script>
		$( document ).ready(function() { //una vez que cargo la pag y los datasets, cargo el calendario
			$('.mycal').easycal({
			startDate : '<?php echo $fecha_hoy?>', // tambien puedo escribir la fecha como 31/10/2104, aca se selecciona la semana de la fecha
			timeFormat : 'HH:mm',
			columnDateFormat : 'dddd, DD MMM',
			minTime : '<?php echo $inicio?>', //cargo maxima fecha segun retorno
			maxTime : '<?php echo $termino?>', //cargo minima fecha segun retorno
			slotDuration : 30, // 30 diurno, 10 vespertino
			timeGranularity : 30, // 30 diurno, 10 vespertino
			
			dayClick : function(el, startTime){
				swal('Permite agregar un evento el: '+ dayColumn+' a las: ' + startTime);
			},
			eventClick : function(eventId, hora, dia){
				if(eventId=="ND"){
					swal('No disponible para Asignar Causas');
				}else{
					var profesor_a_cargar = $( "#profesor_seleccionado option:selected" ).val();
					
					if(profesor_a_cargar==""){
						console.log(profesor_a_cargar+" dia"+dia+" hora"+hora);
						abrir_detalle_bloque(dia,hora,profesor_a_cargar,'');
					}else{
						console.log(profesor_a_cargar+" dia"+dia+" hora"+hora);
						abrir_detalle_bloque_individual(dia,hora,profesor_a_cargar);
					}
					
				}
			},

			events : [
			
			
			
			//imprimo los dias con asignaciones
			<?php 
				if(isset($asignaciones)){
					foreach($asignaciones as $asignacion){
						$fecha_formateada  = date("d-m-Y", strtotime($asignacion['dia']));
						echo  "{id : '".$asignacion['id']."',";
						echo  "start : '".$fecha_formateada." ".$asignacion['hora_inicio']."',";
						echo  "end : '".$fecha_formateada." ".$asignacion['hora_fin']."',";
						echo  "textColor : '#000"."',";
						echo  "libres : '".$asignacion['cantidad_disponible']."',";
						echo  "backgroundColor : '".$asignacion['tipo']."'";
						echo  "},";
					
					
					}
				}
				
			?>			
			
		],
			
			overlapColor : '#FF0',
			overlapTextColor : '#000',
			overlapTitle : 'Multiple'
		});
		});
		
	</script>
	
