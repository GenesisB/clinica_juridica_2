<?php

	class modelo_ingresos extends CI_Model {

		public function trae_profesores(){
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT * FROM ".$this->db->database.".usuarios WHERE tipo_usuario = 'P' and sede = '$sede';");
			return $query;
		}

		//inicio seba
		public function trae_alumnos(){
				$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
				$query=$this->db->query("SELECT * FROM ".$this->db->database.".usuarios WHERE tipo_usuario = 'A' and sede = '$sede';");
				return $query;
		}
		public function trae_materia(){
				$query=$this->db->query("SELECT * FROM ".$this->db->database.".materia;");
				return $query;
		}
		public function ingresar_configuracion_causa($id_causa,$id_materia, $fecha_ingreso, $rut_alumno, $rut_abogado,$rut_cliente,$dv_abogado,$dv_alumno,$dv_usuario){

		$this->load->model('modelo_busquedas');
		$sede = $this->modelo_busquedas->sede_actual();
			$exist = $this->db->query("SELECT * FROM causas WHERE id_causa = '$id_causa' AND sede = '$sede';");
				if(isset($exist)){
					if(!($exist->num_rows() > 0)){
						$query = $this->db->query("insert into causas(id_causa, id_materia, INGRESO, TERMINO, RUT_ALUMNO,
						RUT_CLIENTE, CAUSAL_TERMINO, RUT_ABOGADO, DV_ALUMNO, DV_CLIENTE, DV_ABOGADO, SEDE)
						values('$id_causa','$id_materia',
						'$fecha_ingreso',null,'$rut_alumno','$rut_cliente',null,'$rut_abogado','$dv_alumno',
						'$dv_usuario','$dv_abogado', '$sede');");
						return $query;
					}
					else
					{
						return "Id Causa ya existe.";
					}
				}
		}
		// public function ingresar_cliente($usuario,$dv, $nombre_usuario, $telefono, $domicilio,$email){
			// $query = $this->db->query("INSERT INTO clientes(rut_cliente, dv_cliente, nombre_cliente,telefono, domicilio,email)
									// SELECT * FROM (SELECT '$usuario','$dv','$nombre_usuario','$telefono','$domicilio','$email') AS tmp
									// WHERE NOT EXISTS (
									// SELECT rut_cliente FROM clientes WHERE rut_cliente= '$usuario'
									// ) LIMIT 1;");


			// return $query;
		// }
		public function trae_dv($rut){
			$query=$this->db->query("SELECT dv FROM usuarios where rut='$rut';");
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$dv = $row->dv;
				}
			}
			return $dv;
		}
		//fin seba

		public function ingresar_configuracion_agenda($rut,$fecha_inicio, $fecha_termino, $hora_inicio, $hora_termino,$dia, $sede){

			$query = $this->db->query("insert into conf_agenda values('','$fecha_inicio','$fecha_termino','$hora_inicio','$hora_termino','$dia','$rut','$sede',null)");
		}

		public function ingresar_cliente($rut_cliente, $dv_cliente, $nombre_cliente, $telefono, $domicilio, $email){
			$exist = $this->db->query("SELECT * FROM clientes WHERE rut_cliente = $rut_cliente;");
			if(isset($exist)){
				if(!($exist->num_rows() > 0)){
					$query = $this->db->query("INSERT INTO clientes(rut_cliente, dv_cliente, nombre_cliente, telefono, domicilio, email)
					VALUES('$rut_cliente', '$dv_cliente', '$nombre_cliente', '$telefono', 'domicilio', '$email');");

					return $query;
				}
			}
		}
		public function ingresa_orientacion($fec_ingreso, $id_materia, $resena, $rut_abogado, $rut_usuario){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("INSERT INTO orientacion(fec_ingreso, id_materia, resena, rut_abogado, rut_usuario, sede)
			VALUES('$fec_ingreso', '$id_materia', '$resena', '$rut_abogado', '$rut_usuario', '$sede');");
		}
		//
		public function ingresa_audiencia($descripcion, $id_causa, $tipo_audiencia, $rut_profesor, $rut_alumno, $nota_registro_1,
										  $nota_registro_2, $nota_registro_3, $nota_registro_otros, $nota_destreza_1, $nota_destreza_2,
										  $nota_destreza_3, $nota_destreza_4, $nota_destreza_5, $nota_destreza_6, $nota_destreza_7,
										  $nota_destreza_8, $nota_destreza_9, $nota_destreza_10, $nota_destreza_11, $nota_destreza_12,
										  $nota_item_1, $nota_item_2, $nota_item_3, $nota_final, $fec_ingreso, $hora_ingreso, $sede){


		$query = "INSERT INTO audiencias (descripcion, id_causa, tipo_audiencia, numero_audiencia, rut_alumno, rut_profesor, nota_registro_1,
				nota_registro_2, nota_registro_3, nota_registro_otros, nota_destreza_1, nota_destreza_2, nota_destreza_3, nota_destreza_4,
				nota_destreza_5, nota_destreza_6, nota_destreza_7, nota_destreza_8, nota_destreza_9, nota_destreza_10,
				nota_destreza_11, nota_destreza_12, nota_item_1, nota_item_2, nota_item_3, nota_final, fecha, hora, sede)";

		$num_audiencia = $this->db->query("SELECT COUNT(*) as num FROM audiencias WHERE id_causa = '$id_causa';");
			if(isset($num_audiencia)){
				if(($num_audiencia->num_rows() > 0)){
					foreach($num_audiencia->result() as $num_audiencia)

					$query .= "VALUES('$descripcion', '$id_causa', '$tipo_audiencia', (".$num_audiencia->num." + 1), '$rut_alumno', '$rut_profesor', $nota_registro_1,
							$nota_registro_2, $nota_registro_3, '$nota_registro_otros', $nota_destreza_1, $nota_destreza_2, $nota_destreza_3, $nota_destreza_4,
							$nota_destreza_5, $nota_destreza_6, $nota_destreza_7, $nota_destreza_8, $nota_destreza_9, $nota_destreza_10,
							$nota_destreza_11, $nota_destreza_12, $nota_item_1, $nota_item_2, $nota_item_3, $nota_final, '$fec_ingreso', '$hora_ingreso', '$sede' );";
				}
				else{

					$query .= "VALUES('$descripcion', '$id_causa', '$tipo_audiencia', 1, '$rut_alumno', '$rut_profesor', $nota_registro_1,
							$nota_registro_2, $nota_registro_3, '$nota_registro_otros', $nota_destreza_1, $nota_destreza_2, $nota_destreza_3, $nota_destreza_4,
							$nota_destreza_5, $nota_destreza_6, $nota_destreza_7, $nota_destreza_8, $nota_destreza_9, $nota_destreza_10,
							$nota_destreza_11, $nota_destreza_12, $nota_item_1, $nota_item_2, $nota_item_3, $nota_final, '$fec_ingreso', '$hora_ingreso', '$sede'  );";
				}

				$this->db->query($query);
			}
		}
		//
		public function ingresa_asuntos($titulo, $descripcion, $rut_asociado, $fecha, $hora_inicio, $sede){

			$query = $this->db->query("INSERT INTO asuntos(titulo_asunto, descripcion, rut_asociado, sede)
			VALUES('$titulo', '$descripcion', '$rut_asociado', '$sede');");
			$id = $this->db->query("SELECT LAST_INSERT_ID() as ID;");
			foreach($id->result() as $row){
				$this->load->model('modelo_agenda');
				$this->modelo_agenda->ingresar_asignacion($rut_asociado, $fecha, "AS_".$row->ID, $hora_inicio, 'asunto');
				break;
			}
		}

		public function ingresa_asunto_audiencia($titulo, $descripcion, $rut_asociado, $fecha, $hora_inicio, $id_causa, $sede){

			$this->load->model('modelo_agenda');
			$this->modelo_agenda->ingresar_asignacion($rut_asociado, $fecha, "AU_".$id_causa, $hora_inicio, 'audiencia');
		}

		public function ingresa_usuario($rut, $tipo_usuario){
			$data = array(
			'tipo_usuario' => $tipo_usuario
			);
			$this->db->set( $data );
			$this->db->where( 'rut' , $rut );
			$this->db->update( 'usuarios', $data );
		}

		public function up_estado_asignacion($id_asignacion, $estado){
			$data = array(
			'estado' => $estado
			);

			$this->db->set( $data );
			$this->db->where ( 'id_asignacion', $id_asignacion );
			$this->db->update( 'asignacion_agenda', $data );
		}

		public function up_termino_causa($id_causa, $id_causal_termino, $fecha_termino){
			$data = array(
			'TERMINO' => $fecha_termino,
			'CAUSAL_TERMINO' => $id_causal_termino
			);

			$this->db->set( $data );
			$this->db->where ( 'id_causa', $id_causa );
			$this->db->update( 'causas', $data );
		}

		public function ingreso_privilegios($rut, $sede, $tipo_privilegio, $privilegio){
			$query = $this->db->query("INSERT INTO privilegios(rut, sede, tipo_privilegio, privilegio)
			VALUES('$rut', '$sede', '$tipo_privilegio', '$privilegio');");
		}

		public function delete_privilegios($rut, $sede){
			$query = $this->db->query("DELETE FROM privilegios WHERE rut = '$rut' AND sede = '$sede';");
		}

		public function actualiza_sede_nuevo_usuario($rut, $sede){
			$query = $this->db->query("UPDATE usuarios SET sede = '$sede' WHERE rut = '$rut';");
		}

		public function ingreso_sede_usuario($rut, $sede){
			$verificar = $this->db->query("SELECT * FROM usuario_sede WHERE rut = '$rut' AND id_sede = '$sede';");
			if(!($verificar->num_rows() > 0)){
				$query = $this->db->query("INSERT INTO usuario_sede(rut, id_sede) VALUES('$rut', '$sede');");
			}
		}

		public function actualiza_sede_actual($sede_seleccionada){
			$user=$_SESSION['login_user'];
			$query = $this->db->query("update usuarios set sede = '$sede_seleccionada' where rut = '$user'");
		}
	}
?>
