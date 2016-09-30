<script>
	function getEvents(){		
		// Tipo					   Fondo       
		// Libre				= #0000FF		
		// Asignado 			= #8A0808 		
		// No Disponible		= #210B61		
		return[
			
			
			
			//imprimo los dias con asignaciones
			<?php 
				foreach($asignaciones as $asignacion){
						$fecha_formateada  = date("d-m-Y", strtotime($asignacion['dia']));
						echo  "{id : '".$asignacion['id']."',";
						echo  "start : '".$fecha_formateada." ".$asignacion['hora_inicio']."',";
						echo  "end : '".$fecha_formateada." ".$asignacion['hora_fin']."',";
						echo  "textColor : '#FFFFFF"."',";
						echo  "libres : '".$asignacion['cantidad_disponible']."',";
						echo  "backgroundColor : '".$asignacion['tipo']."'";
						echo  "},";
					
					
				}
			?>
			
			
		];
	}
	
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
				}else if(eventId.lastIndexOf('L', 0) === 0){
					abrir_bloque(dia,hora);
				}else{
				swal('Muestro detalle de este bloque ');
				}
			},

			events : getEvents(),
			
			overlapColor : '#FF0',
			overlapTextColor : '#000',
			overlapTitle : 'Multiple'
		});
		});
</script>