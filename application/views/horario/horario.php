
	<h2 class="titulo_fieldset">HORARIO PERSONAL</h2>	
	<hr>
	
	
	<div class="mycal" style="width:100%;"></div>
	<hr>
	
	<script>
		$( document ).ready(function() { //una vez que cargo la pag y los datasets, cargo el calendario
			$('.mycal').easycal({
			startDate : '<?php echo date("d-m-Y");?>', // tambien puedo escribir la fecha como 31/10/2104, aca se selecciona la semana de la fecha
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
				detalle_asignacion(eventId);
					
			},

			events : [
			
			
			
			//imprimo los dias con asignaciones
			<?php 
				foreach($horario as $asignacion){
						$fecha_formateada  = date("d-m-Y", strtotime($asignacion['fecha_asignacion']));
						echo  "{id : '".$asignacion['id_asignacion']."',";
						echo  "start : '".$fecha_formateada." ".$asignacion['hora_inicio']."',";
						echo  "end : '".$fecha_formateada." ".$asignacion['hora_fin']."',";
						echo  "textColor : '#000"."',";
						echo  "libres : '',";
						if($asignacion['tipo']=='Causa'){							
							echo  "backgroundColor : 'rgb(245, 246, 206)'";	
						}else if($asignacion['tipo']=='Asunto'){						
							echo  "backgroundColor : 'rgb(169, 208, 245)'";	
						}else if($asignacion['tipo']=='Audiencias'){
							echo  "backgroundColor : 'red'";	
						}
						
						echo  "},";
					
					
				}
			?>			
			
		],
			
			overlapColor : '#FF0',
			overlapTextColor : '#000',
			overlapTitle : 'Multiple'
		});
		});
		
	</script>
	
