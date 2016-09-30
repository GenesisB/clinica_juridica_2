<?php 

	class modelo_agenda extends CI_Model {
		
		public function eliminar_asignacion($id){
			$query = $this->db->query("DELETE FROM conf_agenda where id_conf_agenda='$id' ");
		}
		
		public function traer_bloques(){
			
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			
			$query = $this->db->query("SELECT 
										A.id_bloque,
										CONCAT(A.inicio, '-', A.termino) AS BLOQUE,
										A.horario,
										A.lunes,
										A.martes,
										A.miercoles,
										A.jueves,
										A.viernes,
										A.sabado,
										A.domingo,
										A.orden
									FROM
										bloque A
									WHERE sede = '$sede';								
									");									
			return $query;
		}
		public function traer_termino(){
			
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			
			$query = $this->db->query("select termino
										from bloques 
										where tipo_horario = 'D'
										and sede = '$sede';								
									");	
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$termino = $row->termino;
				}
			}
			return $termino;
		}
		public function traer_inicio(){
			
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			
			$query = $this->db->query("select inicio
										from bloques 
										where tipo_horario = 'D'
										and sede = '$sede';								
									");	

			if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$inicio = $row->inicio;
					}
				}
	
	
																	
			return $inicio;
		}	
	
		
		public function asignaciones($dia_sf, $hora_inicio, $hora_fin, $dia_texto, $profesor){
			$dia = date('Y-m-d', strtotime($dia_sf));
			$asignacion['dia'] = $dia;
			$asignacion['hora_inicio'] = $hora_inicio;
			$asignacion['hora_fin'] = $hora_fin;
			$asignacion['cantidad_disponible'] = 0;
			$asignacion['cantidad_no_disponible'] = 0;
			$asignacion['tipo'] = 0;
			$asignacion['id'] = 0;
			$sentencia_profesor_1 = "AND A.rut = '$profesor';";
			$sentencia_profesor_2 = "AND B.rut = '$profesor';";
			if($profesor=='' || $profesor == 'undefined'){
				$sentencia_profesor_1 = "";
				$sentencia_profesor_2 = "";
			}
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			
			
			$query = $this->db->query("SELECT COUNT(A.rut) as cantidad
										FROM conf_agenda A 
										WHERE A.fecha_inicio <= '$dia' 
										AND A.fecha_fin >= '$dia'
										AND A.dia = '$dia_texto'
										AND A.hora_inicio <= TIME('$hora_inicio')
										AND A.hora_fin >= TIME('$hora_fin')
										AND sede = '$sede'
										$sentencia_profesor_1
										");	
			if ($query->num_rows() > 0)				
				{
					foreach ($query->result() as $row)
					{
						$cantidad = $row->cantidad; // X = cantidad de profesores disponibles para asignacion en ese bloque
						if($cantidad < 1){
							$asignacion['cantidad_disponible'] = 0;
							$asignacion['cantidad_no_disponible'] = 0;
							$asignacion['tipo'] = '#FFFFFF';
							$asignacion['id'] = 'ND';
							return $asignacion;//no disponible
							
						}
						$query_2 = $this->db->query("SELECT COUNT(B.rut) as cantidad_2
													FROM asignacion_agenda B 
													WHERE B.fecha_asignacion = '$dia'
													AND B.hora_inicio <= TIME('$hora_inicio')
													AND B.hora_fin >= TIME('$hora_fin')
													AND sede = '$sede'
													$sentencia_profesor_2
													");	
						
						if ($query_2->num_rows() > 0)
						{
							foreach ($query_2->result() as $row)
							{								
								$ocupados = $row->cantidad_2;
								if($ocupados>0){
									$diferencia = $cantidad - $ocupados;
									$asignacion['cantidad_disponible'] = $diferencia;
									$asignacion['cantidad_no_disponible'] = $ocupados;
									$asignacion['tipo'] = '#F5F6CE';
									$asignacion['id'] = 'O';
									return $asignacion;//ocupado
									
								}else{
									$asignacion['cantidad_disponible'] = $cantidad;
									$asignacion['cantidad_no_disponible'] = 0;
									$asignacion['tipo'] = '#A9D0F5';
									$asignacion['id'] = 'L';
									return $asignacion;//libre
								}
							}
						}
					}
				}
															
			return $asignacion;
		}
		
		
				
				
				
		public function cantidad_asignaciones($fecha_inicio, $fecha_fin){
					
					$fecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
					$fecha_fin = date('Y-m-d', strtotime($fecha_fin));
					$this->load->model('modelo_busquedas');
					$sede = $this->modelo_busquedas->sede_actual();
					
					//$fecha_inicio = date('Y-m-d', strtotime('23-05-2016'));
					//$fecha_fin = date('Y-m-d', strtotime('27-05-2016'));
			
			$query = $this->db->query("SELECT DISTINCT U.nombre, U.rut, (SELECT COUNT(*) 
										FROM asignacion_agenda A 
										WHERE A.rut = U.rut 
										AND A.fecha_asignacion BETWEEN '$fecha_inicio' AND '$fecha_fin') as cantidad
										FROM usuarios U 
										JOIN conf_agenda C ON C.rut = U.rut 
										WHERE U.tipo_usuario = 'P'
										AND C.fecha_inicio <= '$fecha_inicio' AND C.fecha_fin >= '$fecha_fin'
										AND U.sede = '$sede'
										ORDER BY cantidad ASC;");
									 
									 if($query->num_rows() > 0){
										 return $query; 
									 }
										
									 else{
										return null; 
									 }
										 
		}
		
		public function ingresar_asignacion($rut, $fecha, $id_asunto, $hora_inicio, $tipo_asunto){
			
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			
					$fecha = date('Y-m-d', strtotime($fecha));
			if($tipo_asunto != "causa"){
			$query = $this->db->query("INSERT INTO asignacion_agenda (rut, fecha_asignacion, id_asunto, hora_inicio, hora_fin, tipo_asunto, estado, sede)
									   VALUES('$rut', '$fecha', '$id_asunto', TIME('$hora_inicio'), ADDTIME('$hora_inicio', '00:30:00'), '$tipo_asunto', 'Agendado', '$sede');");
									   return "ok";
			}else{
			
			$query = $this->db->query("INSERT INTO asignacion_agenda (rut, fecha_asignacion, id_asunto, hora_inicio, hora_fin, tipo_asunto, estado, sede)
									   VALUES('$rut', '$fecha', '$id_asunto', TIME('$hora_inicio'), ADDTIME('$hora_inicio', '00:30:00'), '$tipo_asunto', 'Agendado', '$sede');");
									   return "ok";
			}
										 
		}
		
		
		

		public function profesores_disponibles($fecha, $hora, $dia_texto){
			$fecha_query = date('Y-m-d', strtotime($fecha));
			$query = $this->db->query("SELECT DISTINCT(U.rut), U.nombre, U.dv, (SELECT COUNT(*) 
						FROM asignacion_agenda A 
						WHERE A.rut = U.rut 
						AND A.fecha_asignacion = '$fecha_query'
						AND A.hora_inicio <= TIME('$hora') AND A.hora_fin >= (TIME('$hora') + 3000)) as cantidad
						FROM usuarios U 
						JOIN conf_agenda C ON C.rut = U.rut 
						WHERE U.tipo_usuario = 'P'
						AND C.fecha_inicio <= '$fecha_query' AND C.fecha_fin >= '$fecha_query'
						AND C.dia = '$dia_texto'
						AND C.hora_inicio <= '$hora' AND C.hora_fin >= '$hora';")
;
						if($query->num_rows() > 0){
										 return $query; 
									 }
										
									 else{
										return null; 
									 }
			
		} 
		
		public function profesores_disponibles_individual($fecha, $hora, $dia_texto, $rut){
			$fecha_query = date('Y-m-d', strtotime($fecha));
			$query = $this->db->query("SELECT DISTINCT(U.rut), U.nombre, U.dv, (SELECT COUNT(*) 
						FROM asignacion_agenda A 
						WHERE A.rut = U.rut 
						AND A.fecha_asignacion = '$fecha_query'
						AND A.hora_inicio <= TIME('$hora') AND A.hora_fin >= (TIME('$hora') + 3000)) as cantidad
						FROM usuarios U 
						JOIN conf_agenda C ON C.rut = U.rut 
						WHERE U.tipo_usuario = 'P'
						AND U.rut = '$rut'
						AND C.fecha_inicio <= '$fecha_query' AND C.fecha_fin >= '$fecha_query'
						AND C.dia = '$dia_texto'
						AND C.hora_inicio <= '$hora' AND C.hora_fin >= '$hora';")
;
						if($query->num_rows() > 0){
										 return $query; 
									 }
										
									 else{
										return null; 
									 }
			
		} 
		
		public function eliminar_agendacion($id_agendacion, $motivo, $quien_elimina){
			
			$this->db->query("INSERT INTO  asignacion_agenda_historico (id_asignacion ,rut ,fecha_asignacion ,id_asunto ,hora_inicio ,hora_fin ,tipo_asunto ,estado)
										SELECT id_asignacion, rut, fecha_asignacion, id_asunto, hora_inicio, hora_fin,  tipo_asunto, estado from asignacion_agenda where id_asignacion = '$id_agendacion';");

			$this->db->query("update asignacion_agenda_historico set motivo = '$motivo', quien_elimina = '$quien_elimina' where id_asignacion = '$id_agendacion'");
			
			$this->db->query("delete from asignacion_agenda where id_asignacion = '$id_agendacion'");
			
			








			
			
		} 
		
		
		
		
		
		
	}
?>