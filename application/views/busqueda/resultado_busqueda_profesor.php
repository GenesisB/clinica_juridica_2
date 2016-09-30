	<head>
		<style>
			.trespecial:hover .tdespecial {background:#819FF7}
		</style>	
	</head>
	
	<body>
		<form>
		
		<div class="CSSTableGenerator" id='radioDiv' >
                <table >
                    <tr>
						<td>
							Rut 
						</td>
						<td>
							Nombre
						</td>
                    </tr>
					<?php
		  
					
						if (isset($profesores)) {
							if ($profesores->num_rows() > 0){
								foreach ($profesores->result() as $row){
								echo "<tr onclick=\"selecciona_profesor_asignacion('".$row->rut."');\"><td>".$row->rut."</td><td>".$row->nombre."</td></tr>";
						   }
						}
		  }
		  
		?>
				</table>	
		</div>
		</form>
	</body>
