<h2>Mostrando el Bloques para el <?php echo $dia?> a las <?php echo $hora?> 
<?php if($profesor_a_cargar!=''){
	echo "al profesor $profesor_a_cargar";
	
}else{
	echo "Seleccione un profesor";
}
?>
</h2>

	
	
	
	
		<div id="agenda" >
			<table id="tabla_agenda">
				<thead>
					<tr>
						<th>
							Profesor
						</th>
						
						<th>
							Causas Asignadas
						</th>
						
						<th>
							Asignar
						</th>							
								
					</tr>
				</thead>
				<tbody>	
					
				
			
			
				</tbody>	
			</table>
		</div>
		
	
<script>
		
	$('#tabla_agenda').DataTable({
			"pagingType": "simple_numbers"
	} );
	
	
</script>	
