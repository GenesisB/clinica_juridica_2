<?php 
	
	
	
	class modelo_horario extends CI_Model {
		
		public function login_horario($rut,$password){
			$existe = "no";
			$query = $this->db->query("SELECT rut,tipo_usuario FROM usuarios WHERE rut='$rut' and pwd='$password'");	
			
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->tipo_usuario=='P' || $row->tipo_usuario == 'A'){
						$existe = "si";
					}
						
					
					
				}
			} // = P
			return $existe;
		}
		public function traer_horario_json($rut){
			$hoy =  date("Y-m-d");				
			$hoy_string_2 = strtotime($hoy);
			if(date("w",strtotime($hoy))==0){
				$domingo = date('Y-m-d', strtotime($hoy));
			}else{
				$domingo = date('Y-m-d', strtotime('Next Sunday', $hoy_string_2));
			}
			$lunes = date('Y-m-d', strtotime($domingo .' -6 day'));
			$martes = date('Y-m-d', strtotime($domingo .' -5 day'));
			$miercoles = date('Y-m-d', strtotime($domingo .' -4 day'));
			$jueves = date('Y-m-d', strtotime($domingo .' -3 day'));
			$viernes = date('Y-m-d', strtotime($domingo .' -2 day'));
			$sabado = date('Y-m-d', strtotime($domingo .' -1 day'));
			
			
			
			$asignaciones = array();
			$user = $rut;
			$query = $this->db->query("SELECT tipo_usuario FROM usuarios WHERE rut = '$user';");		
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$tipo_usuario = $row->tipo_usuario;
				}
			} // = P
			if($tipo_usuario=='P'){//profesor
				$col_tipo_usuario = "RUT_ABOGADO";
			}else if($tipo_usuario=='A'){//Alumno
				$col_tipo_usuario = "RUT_ALUMNO";
			}else if($tipo_usuario=='F'){//Alumno
				$col_tipo_usuario = "RUT_ALUMNO";
			}
			
			$query2 = $this->db->query("SELECT id_causa FROM causas WHERE $col_tipo_usuario = $user");		
			if ($query2->num_rows() > 0)
			{
				foreach ($query2->result() as $row)
				{
					$id_causa = $row->id_causa;
					
					$query3 = $this->db->query("SELECT a.fecha_asignacion, a.hora_inicio, a.hora_fin, a.id_asignacion, c.rut_cliente, c.rut_alumno, u.nombre, x.nombre_cliente FROM  asignacion_agenda a left outer join causas c on c.id_causa= a.id_asunto left outer join usuarios u on u.rut = c.rut_alumno  left outer join clientes x on x.rut_cliente = c.rut_cliente WHERE a.id_asunto = '$id_causa' AND a.fecha_asignacion BETWEEN '$lunes' AND '$viernes' order by a.hora_inicio asc");	
					if ($query3->num_rows() > 0)
						{
							foreach ($query3->result() as $row)								{
								$fila = array();
								if($row->fecha_asignacion==$lunes){
									$fila['dia'] = "Lunes";
								}if($row->fecha_asignacion==$martes){
									$fila['dia'] = "Martes";
								}if($row->fecha_asignacion==$miercoles){
									$fila['dia'] = "Miercoles";
								}if($row->fecha_asignacion==$jueves){
									$fila['dia'] = "Jueves";
								}if($row->fecha_asignacion==$viernes){
									$fila['dia'] = "Viernes";
								}
								$fila['id_causa']=$id_causa;
								$fila['tipo'] = "Causa";
								$fila['id_asignacion'] = $row->id_asignacion;
								$fila['fecha_asignacion'] = $row->fecha_asignacion;
								$fila['hora_inicio'] = $row->hora_inicio;
								$fila['hora_fin'] = $row->hora_fin;
								$fila['nombre_cliente'] = $row->nombre_cliente;
								$fila['nombre_alumno'] = $row->nombre;
								array_push($asignaciones, $fila);
															
							}
						}
					
				}
			} 
			
			$query5 = $this->db->query("SELECT idasuntos FROM asuntos WHERE rut_asociado = '$user'");		
			if ($query5->num_rows() > 0)
			{
				foreach ($query5->result() as $row)
				{
					$idasuntos = $row->idasuntos;
					
					//$query6 = $this->db->query("SELECT fecha_asignacion, hora_inicio, hora_fin, id_asignacion FROM  asignacion_agenda WHERE id_asunto = 'AS_$idasuntos' AND fecha_asignacion BETWEEN '$lunes' AND '$viernes'");	
					
					
					$query6 = $this->db->query("SELECT a.fecha_asignacion, a.hora_inicio, a.hora_fin, a.id_asignacion, b.titulo_Asunto, b.descripcion FROM  asignacion_agenda a left outer join asuntos b on b.idasuntos = '$idasuntos' WHERE a.id_asunto = 'AS_$idasuntos 'AND fecha_asignacion BETWEEN '$lunes' AND '$viernes'");	
					if ($query6->num_rows() > 0)
						{
							foreach ($query6->result() as $row)								{
								$fila = array();
								if($row->fecha_asignacion==$lunes){
									$fila['dia'] = "Lunes";
								}if($row->fecha_asignacion==$martes){
									$fila['dia'] = "Martes";
								}if($row->fecha_asignacion==$miercoles){
									$fila['dia'] = "Miercoles";
								}if($row->fecha_asignacion==$jueves){
									$fila['dia'] = "Jueves";
								}if($row->fecha_asignacion==$viernes){
									$fila['dia'] = "Viernes";
								}
								$fila['tipo'] = "Asunto";
								$fila['titulo'] = $row->titulo_Asunto;
								$fila['descripcion'] = $row->descripcion;
								$fila['id_asignacion'] = $row->id_asignacion;
								$fila['fecha_asignacion'] = $row->fecha_asignacion;
								$fila['hora_inicio'] = $row->hora_inicio;
								$fila['hora_fin'] = $row->hora_fin;
								array_push($asignaciones, $fila);
															
							}
						}
					
				}
			} 
			
			
									
			return $asignaciones;
			
			
			
			
			
			
			
			
		}
		
		public function traer_horario(){
			$hoy =  date("Y-m-d");			
			$hoy_string_2 = strtotime($hoy);
			if(date("w",strtotime($hoy))==0){
				$domingo = date('Y-m-d', strtotime($hoy));
			}else{
				$domingo = date('Y-m-d', strtotime('Next Sunday', $hoy_string_2));
			}
			$lunes = date('Y-m-d', strtotime($domingo .' -6 day'));
			$martes = date('Y-m-d', strtotime($domingo .' -5 day'));
			$miercoles = date('Y-m-d', strtotime($domingo .' -4 day'));
			$jueves = date('Y-m-d', strtotime($domingo .' -3 day'));
			$viernes = date('Y-m-d', strtotime($domingo .' -2 day'));
			$sabado = date('Y-m-d', strtotime($domingo .' -1 day'));
			
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
				
			$user=$_SESSION['login_user'];
			$asignaciones = array();
		
			$query = $this->db->query("SELECT tipo_usuario FROM usuarios WHERE rut = '$user';");		
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$tipo_usuario = $row->tipo_usuario;
				}
			} // = P
			if($tipo_usuario=='P'){//profesor
				$col_tipo_usuario = "RUT_ABOGADO";
			}else if($tipo_usuario=='A'){//Alumno
				$col_tipo_usuario = "RUT_ALUMNO";
			}
			
			$query2 = $this->db->query("SELECT id_causa FROM causas WHERE $col_tipo_usuario = $user AND sede = '$sede' ");		
			if ($query2->num_rows() > 0)
			{
				foreach ($query2->result() as $row)
				{
					$id_causa = $row->id_causa;
					
					$query3 = $this->db->query("SELECT fecha_asignacion, hora_inicio, hora_fin, id_asignacion FROM  asignacion_agenda WHERE id_asunto = '$id_causa' AND fecha_asignacion BETWEEN '$lunes' AND '$viernes' AND sede = '$sede' order by hora_inicio asc");	
					if ($query3->num_rows() > 0)
						{
							foreach ($query3->result() as $row)								{
								$fila = array();
								if($row->fecha_asignacion==$lunes){
									$fila['dia'] = "Lunes";
								}if($row->fecha_asignacion==$martes){
									$fila['dia'] = "Martes";
								}if($row->fecha_asignacion==$miercoles){
									$fila['dia'] = "Miercoles";
								}if($row->fecha_asignacion==$jueves){
									$fila['dia'] = "Jueves";
								}if($row->fecha_asignacion==$viernes){
									$fila['dia'] = "Viernes";
								}
								$fila['id_causa']=$id_causa;
								$fila['tipo'] = "Causa";
								$fila['id_asignacion'] = $row->id_asignacion;
								$fila['fecha_asignacion'] = $row->fecha_asignacion;
								$fila['hora_inicio'] = $row->hora_inicio;
								$fila['hora_fin'] = $row->hora_fin;
								array_push($asignaciones, $fila);
															
							}
						}
					
				}
			} 
			
			$query5 = $this->db->query("SELECT idasuntos FROM asuntos WHERE rut_asociado = '$user' AND sede = '$sede' ");		
			if ($query5->num_rows() > 0)
			{
				foreach ($query5->result() as $row)
				{
					$idasuntos = $row->idasuntos;
					
					$query6 = $this->db->query("SELECT fecha_asignacion, hora_inicio, hora_fin, id_asignacion FROM  asignacion_agenda WHERE id_asunto = 'AS_$idasuntos' AND fecha_asignacion BETWEEN '$lunes' AND '$viernes' AND sede = '$sede' ");	
					if ($query6->num_rows() > 0)
						{
							foreach ($query6->result() as $row)								{
								$fila = array();
								if($row->fecha_asignacion==$lunes){
									$fila['dia'] = "Lunes";
								}if($row->fecha_asignacion==$martes){
									$fila['dia'] = "Martes";
								}if($row->fecha_asignacion==$miercoles){
									$fila['dia'] = "Miercoles";
								}if($row->fecha_asignacion==$jueves){
									$fila['dia'] = "Jueves";
								}if($row->fecha_asignacion==$viernes){
									$fila['dia'] = "Viernes";
								}
								$fila['tipo'] = "Asunto";
								$fila['id_asignacion'] = $row->id_asignacion;
								$fila['fecha_asignacion'] = $row->fecha_asignacion;
								$fila['hora_inicio'] = $row->hora_inicio;
								$fila['hora_fin'] = $row->hora_fin;
								array_push($asignaciones, $fila);
															
							}
						}
					
				}
			} 
			
			
									
			return $asignaciones;
			
			
			
			
			
			
			
			
		}
		
		
	}
?>