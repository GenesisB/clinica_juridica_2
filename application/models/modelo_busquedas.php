<?php

	class modelo_busquedas extends CI_Model {

		//inicio seba
		public function buscar_disponibilidad_profesor($rut){
			$query = $this->db->query("SELECT DISTINCT c.id_conf_agenda,c.fecha_inicio, c.fecha_fin,c.hora_inicio,c.hora_fin,c.dia, s.nombre_sede FROM conf_agenda c left join sedes s on c.sede = s.id_sede WHERE rut='$rut'");
			return $query;
		}


		public function buscar_profesores($rut, $nombre){
			$query = $this->db->query("SELECT rut,nombre from usuarios where rut='$rut' or nombre like '%$nombre%' and tipo_usuario='P'");
			return $query;
		}

		public function buscar_profesores_sede(){
			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT rut,nombre from usuarios where tipo_usuario='P' and rut in (select rut from usuario_sede where id_sede = '$sede')");
			return $query;
		}
		//fin seba

		public function buscar_usuarios(){
			$query = $this->db->query("SELECT * FROM clientes");
			return $query;
		}

		public function buscar_causas_rut($rol, $abogado, $alumno, $usuario, $vigente){

			$this->load->model('modelo_busquedas');
			$sede = $this->modelo_busquedas->sede_actual();


			$condicion_vigencia = "";
			if($vigente=="si"){
				$condicion_vigencia = "AND A.TERMINO IS NULL";
			}
			$query = $this->db->query("SELECT
										A.id_causa,
										A.INGRESO,
										A.TERMINO,
										B.nombre AS ALUMNO,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												T.nom_causal
											FROM
												causal_termino T
											WHERE
												T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										B.rut as RUT_ALUMNO,
										CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										causas A
											JOIN
										usuarios B ON B.rut = A.RUT_ALUMNO
											AND B.dv = A.DV_ALUMNO
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE
											AND C.dv_cliente = A.DV_CLIENTE

									WHERE
										a.id_causa like '%$rol%'
										and A.RUT_ABOGADO like '%$abogado%'
										and B.rut like '%$alumno%'
										and C.rut_cliente like '%$usuario%'
										AND A.sede = '$sede'
										$condicion_vigencia

									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}



		public function buscar_causas_individual(){
				$rut_user=$_SESSION['rut_user'];
				$condicion_vigencia = "AND A.TERMINO IS NULL";
				$query_tipo = $_SESSION['tipo_usuario_user'];
				$consulta_persona="";

				$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();

				if ($query_tipo->num_rows() > 0)
					{
						foreach ($query_tipo->result() as $row)
						{
							$tipo = $row->tipo_usuario;
						}
					}
				if($tipo==='A'){
					$consulta_persona = "B.rut = '$rut_user'";
				}else if($tipo==='P') {
					$consulta_persona = "A.RUT_ABOGADO = '$rut_user'";
				}else{
					$alumno = "sin_permiso_para_acceder";
				}


				$query = $this->db->query("SELECT
											A.id_causa,
											A.INGRESO,
											A.TERMINO,
											B.nombre AS ALUMNO,
											C.nombre_cliente AS USUARIO,
											(SELECT
													M.nom_materia
												FROM
													materia M
												WHERE
													M.id_materia = A.id_materia) AS MATERIA,
											(SELECT
													T.nom_causal
												FROM
													causal_termino T
												WHERE
													T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
											D.NOMBRE AS ABOGADO,
											B.rut AS RUT_ALUMNO,
											CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
											C.rut_cliente AS RUT_USUARIO,
											CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
											D.rut AS RUT_ABOGADO,
											CONCAT(D.rut, '-', D.dv) AS RUT_ABOGADO_COMPLETO
										FROM
											causas A
												JOIN
											usuarios B ON B.rut = A.RUT_ALUMNO
												AND B.dv = A.DV_ALUMNO
												JOIN
											clientes C ON C.rut_cliente = A.RUT_CLIENTE
												AND C.dv_cliente = A.DV_CLIENTE
												JOIN
											usuarios D ON D.rut = A.RUT_ABOGADO
												AND D.dv = A.DV_ABOGADO

									WHERE


										$consulta_persona
										AND A.sede = '$sede'
										$condicion_vigencia

									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}


		public function buscar_causas_nombre($rol, $abogado, $alumno, $usuario, $vigente){
				$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
				$condicion_vigencia = "";
				if($vigente=="si"){
					$condicion_vigencia = "AND A.TERMINO IS NULL";
				}
				$query = $this->db->query("SELECT
											A.id_causa,
											A.INGRESO,
											A.TERMINO,
											B.nombre AS ALUMNO,
											C.nombre_cliente AS USUARIO,
											(SELECT
													M.nom_materia
												FROM
													materia M
												WHERE
													M.id_materia = A.id_materia) AS MATERIA,
											(SELECT
													T.nom_causal
												FROM
													causal_termino T
												WHERE
													T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
											D.NOMBRE AS ABOGADO,
											B.rut AS RUT_ALUMNO,
											CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
											C.rut_cliente AS RUT_USUARIO,
											CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
											D.rut AS RUT_ABOGADO,
											CONCAT(D.rut, '-', D.dv) AS RUT_ABOGADO_COMPLETO
										FROM
											causas A
												JOIN
											usuarios B ON B.rut = A.RUT_ALUMNO
												AND B.dv = A.DV_ALUMNO
												JOIN
											clientes C ON C.rut_cliente = A.RUT_CLIENTE
												AND C.dv_cliente = A.DV_CLIENTE
												JOIN
											usuarios D ON D.rut = A.RUT_ABOGADO
												AND D.dv = A.DV_ABOGADO

									WHERE
										a.id_causa like '%$rol%'
									    and B.nombre like '%$alumno%'
										and D.nombre like '%$abogado%'
										and C.nombre_cliente like '%$usuario%'
										$condicion_vigencia
										and a.sede = '$sede'
									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_causas_audiencias(){

			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();

				$query = $this->db->query("SELECT
											A.id_causa,
											A.INGRESO,
											A.TERMINO,
											B.nombre AS ALUMNO,
											C.nombre_cliente AS USUARIO,
											(SELECT
													M.nom_materia
												FROM
													materia M
												WHERE
													M.id_materia = A.id_materia) AS MATERIA,
											(SELECT
													T.nom_causal
												FROM
													causal_termino T
												WHERE
													T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
											D.NOMBRE AS ABOGADO,
											B.rut AS RUT_ALUMNO,
											CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
											C.rut_cliente AS RUT_USUARIO,
											CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
											D.rut AS RUT_ABOGADO,
											CONCAT(D.rut, '-', D.dv) AS RUT_ABOGADO_COMPLETO
										FROM
											causas A
												JOIN
											usuarios B ON B.rut = A.RUT_ALUMNO
												AND B.dv = A.DV_ALUMNO
												JOIN
											clientes C ON C.rut_cliente = A.RUT_CLIENTE
												AND C.dv_cliente = A.DV_CLIENTE
												JOIN
											usuarios D ON D.rut = A.RUT_ABOGADO
												AND D.dv = A.DV_ABOGADO
										WHERE
										A.TERMINO IS NULL

										AND A.SEDE = '$sede'

									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_causas_historicas_nombre($rol, $abogado, $alumno, $usuario){
				$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
				$query = $this->db->query("SELECT
											A.id_causa,
											A.INGRESO,
											A.TERMINO,
											B.nombre AS ALUMNO,
											C.nombre_cliente AS USUARIO,
											(SELECT
													M.nom_materia
												FROM
													materia M
												WHERE
													M.id_materia = A.id_materia) AS MATERIA,
											(SELECT
													T.nom_causal
												FROM
													causal_termino T
												WHERE
													T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
											D.NOMBRE AS ABOGADO,
											B.rut AS RUT_ALUMNO,
											CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
											C.rut_cliente AS RUT_USUARIO,
											CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
											D.rut AS RUT_ABOGADO,
											CONCAT(D.rut, '-', D.dv) AS RUT_ABOGADO_COMPLETO
										FROM
											causas A
												JOIN
											usuarios B ON B.rut = A.RUT_ALUMNO
												AND B.dv = A.DV_ALUMNO
												JOIN
											clientes C ON C.rut_cliente = A.RUT_CLIENTE
												AND C.dv_cliente = A.DV_CLIENTE
												JOIN
											usuarios D ON D.rut = A.RUT_ABOGADO
												AND D.dv = A.DV_ABOGADO

									WHERE
										a.id_causa like '%$rol%'
									    and B.nombre like '%$alumno%'
										and D.nombre like '%$abogado%'
										and C.nombre_cliente like '%$usuario%'
										AND A.SEDE = '$sede'
										AND A.TERMINO IS NOT NULL

									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_orientaciones_nombre($abogado, $usuario){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
				$query = $this->db->query("SELECT
											A.id_orientacion,
											A.fec_ingreso,
											C.nombre_cliente AS USUARIO,
											(SELECT
													M.nom_materia
												FROM
													materia M
												WHERE
													M.id_materia = A.id_materia) AS MATERIA,
											D.NOMBRE AS ABOGADO,
											C.rut_cliente AS RUT_USUARIO,
											CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
											D.rut AS RUT_ABOGADO,
											CONCAT(D.rut, '-', D.dv) AS RUT_ABOGADO_COMPLETO,
											A.resena
										FROM
											orientacion A
												JOIN
											clientes C ON C.rut_cliente = A.rut_usuario
												JOIN
											usuarios D ON D.rut = A.rut_abogado

									WHERE
										D.NOMBRE like '%$abogado%'
										and C.nombre_cliente like '%$usuario%'
										AND A.sede = '$sede'

									ORDER BY ABOGADO , A.fec_ingreso ASC;

									");



			return $query;
		}



		public function buscar_detalle_causa($rol){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT
										A.id_causa,
										(select count(*) from audiencias where id_causa = A.id_causa) as cantidad_audiencias,
										(select count(*) from asignacion_agenda where id_asunto = A.id_causa) as cantidad_agendaciones,
										A.INGRESO,
										A.TERMINO,
										B.nombre AS ALUMNO,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												T.nom_causal
											FROM
												causal_termino T
											WHERE
												T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										B.rut as RUT_ALUMNO,
										CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										causas A
											JOIN
										usuarios B ON B.rut = A.RUT_ALUMNO
											AND B.dv = A.DV_ALUMNO
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE
											AND C.dv_cliente = A.DV_CLIENTE

									WHERE
										a.id_causa like '%$rol%'

										AND A.sede = '$sede'

									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_detalle_abogado($rut, $vigente){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$condicion_vigencia = "";
				if($vigente=="si"){
					$condicion_vigencia = "AND A.TERMINO IS NULL";
				}
			$query = $this->db->query("SELECT
										A.id_causa,
										(select count(*) from audiencias where id_causa = A.id_causa) as cantidad_audiencias,
										(select count(*) from asignacion_agenda where id_asunto = A.id_causa) as cantidad_agendaciones,
										A.INGRESO,
										A.TERMINO,
										B.nombre AS ALUMNO,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												T.nom_causal
											FROM
												causal_termino T
											WHERE
												T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										B.rut as RUT_ALUMNO,
										CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										causas A
											JOIN
										usuarios B ON B.rut = A.RUT_ALUMNO
											AND B.dv = A.DV_ALUMNO
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE
											AND C.dv_cliente = A.DV_CLIENTE

										WHERE
										 a.rut_abogado = '$rut'
										 AND A.sede = '$sede'
										 $condicion_vigencia
									ORDER BY ABOGADO , A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_detalle_abogado_orientacion($id){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT
										A.id_orientacion,
										A.fec_ingreso,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										orientacion A
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE

										WHERE
										 a.id_orientacion = '$id'
										 AND A.sede = '$sede'
									ORDER BY ABOGADO , A.fec_ingreso ASC;

									");



			return $query;
		}


		public function buscar_detalle_alumno($rut, $vigente){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$condicion_vigencia = "";
				if($vigente=="si"){
					$condicion_vigencia = "AND A.TERMINO IS NULL";
				}
			$query = $this->db->query("SELECT
										A.id_causa,
										(select count(*) from audiencias where id_causa = A.id_causa) as cantidad_audiencias,
										(select count(*) from asignacion_agenda where id_asunto = A.id_causa) as cantidad_agendaciones,
										A.INGRESO,
										A.TERMINO,
										B.nombre AS ALUMNO,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												T.nom_causal
											FROM
												causal_termino T
											WHERE
												T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										B.rut as RUT_ALUMNO,
										CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										causas A
											JOIN
										usuarios B ON B.rut = A.RUT_ALUMNO
											AND B.dv = A.DV_ALUMNO
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE
											AND C.dv_cliente = A.DV_CLIENTE

										WHERE
										 b.rut = '$rut'
										 AND A.sede = '$sede'
										 $condicion_vigencia

									ORDER BY A.INGRESO ASC;

									");



			return $query;
		}
		public function buscar_detalle_usuario($rut, $vigente){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$condicion_vigencia = "";
				if($vigente=="si"){
					$condicion_vigencia = "AND A.TERMINO IS NULL";
				}
			$query = $this->db->query("SELECT
										A.id_causa,
										(select count(*) from audiencias where id_causa = A.id_causa) as cantidad_audiencias,
										(select count(*) from asignacion_agenda where id_asunto = A.id_causa) as cantidad_agendaciones,
										A.INGRESO,
										A.TERMINO,
										B.nombre AS ALUMNO,
										C.nombre_cliente AS USUARIO,
										(SELECT
												M.nom_materia
											FROM
												materia M
											WHERE
												M.id_materia = A.id_materia) AS MATERIA,
										(SELECT
												T.nom_causal
											FROM
												causal_termino T
											WHERE
												T.id_causal_termino = A.CAUSAL_TERMINO) AS CAUSAL_TERMINO,
										(SELECT
												d.nombre
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS ABOGADO,
										B.rut as RUT_ALUMNO,
										CONCAT(B.rut, '-', B.dv) AS RUT_ALUMNO_COMPLETO,
										C.rut_cliente AS RUT_USUARIO,
										CONCAT(C.rut_cliente, '-', C.dv_cliente) AS RUT_USUARIO_COMPLETO,
										(SELECT
												CONCAT(d.rut, '-', d.dv)

											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO_COMPLETO,

										(SELECT
												d.rut
											FROM
												usuarios d
											WHERE
												d.rut = A.RUT_ABOGADO
													AND d.dv = A.DV_ABOGADO) AS RUT_ABOGADO
									FROM
										causas A
											JOIN
										usuarios B ON B.rut = A.RUT_ALUMNO
											AND B.dv = A.DV_ALUMNO
											JOIN
										clientes C ON C.rut_cliente = A.RUT_CLIENTE
											AND C.dv_cliente = A.DV_CLIENTE

										WHERE
										 C.rut_cliente = '$rut'
										 AND A.sede = '$sede'
										 $condicion_vigencia
									ORDER BY A.INGRESO ASC;

									");



			return $query;
		}

		public function buscar_causa_Abogado($fecha, $hora_inicio, $rut){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$fecha_query = date('Y-m-d', strtotime($fecha));

			$query = $this->db->query("SELECT *
										FROM  `asignacion_agenda`
										WHERE rut like '%$rut%'
										AND fecha_asignacion = '$fecha_query'
										AND hora_inicio = '$hora_inicio'
										AND sede = '$sede';

									");



			return $query;
		}
		public function buscar_libre_Abogado($fecha, $hora_inicio, $rut){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$fecha_query = date('Y-m-d', strtotime($fecha));

			$query = $this->db->query("SELECT *
										FROM  `asignacion_agenda`
										WHERE rut like '%$rut%'
										AND fecha_asignacion = '$fecha_query'
										AND hora_inicio = '$hora_inicio'
										AND sede = ' $sede';

									");



			return $query;
		}

		public function buscar_usuario_por_rut($rut){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT * FROM clientes WHERE rut_cliente = '$rut' AND sede = '$sede' ");
			return $query;
		}

		public function buscar_audiencias($id_causa){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT * FROM audiencias WHERE id_causa = '$id_causa' AND sede = '$sede'");
			return $query;
		}

		public function buscar_agendaciones($id_causa){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT * FROM asignacion_agenda WHERE id_asunto = '$id_causa' AND sede = '$sede' ");
			return $query;
		}

		public function buscar_agendaciones_por_id($id_asignacion){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT id_asunto, tipo_asunto, hora_inicio, hora_fin, fecha_asignacion
			FROM asignacion_agenda WHERE id_asignacion = '$id_asignacion' AND sede = '$sede' ");
			return $query;
		}

		public function buscar_audiencia_id($id_audiencia){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT A.*, B.nombre FROM audiencias A JOIN usuarios B ON B.rut = A.rut_alumno WHERE id_audiencia = '$id_audiencia' AND A.sede = '$sede';");
			return $query;
		}
		public function traer_promedio_usuario($rut){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT nota_final FROM audiencias WHERE rut_alumno = '$rut' AND sede = '$sede'");
			return $query;
		}

		public function cantidad_causas_materia(){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT A.id_materia, COUNT(A.id_materia) as cantidad , B.nom_materia
										FROM causas A JOIN materia B ON B.id_materia = A.id_materia WHERE termino IS NULL
										AND A.sede = '$sede'
										GROUP BY id_materia ORDER BY cantidad DESC;");
			return $query;
		}

		public function cantidad_causas_profesor(){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT A.rut_abogado, COUNT(A.rut_abogado) as cantidad , B.nombre
										FROM causas A JOIN usuarios B ON B.rut = A.rut_abogado WHERE termino IS NULL
										AND A.sede = '$sede'
										GROUP BY rut_abogado ORDER BY cantidad DESC;");
			return $query;
		}

		public function cantidad_causas_causal(){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT B.nom_causal , COUNT(A.id_materia) as cantidad
										FROM causas A JOIN causal_termino B ON B.id_causal_termino = A.causal_termino
										AND A.sede = '$sede'
										GROUP BY nom_causal ORDER BY cantidad DESC;");
			return $query;
		}

		public function cantidad_agendaciones_profesor_h(){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT B.nombre , COUNT(A.rut) as cantidad
										FROM asignacion_agenda A JOIN usuarios B ON B.rut = A.rut
										WHERE A.fecha_asignacion < sysdate()
										AND A.sede = '$sede'
										GROUP BY nombre ORDER BY cantidad DESC;");
			return $query;
		}

		public function cantidad_agendaciones_profesor_v(){
			$this->load->model('modelo_busquedas');
				$sede = $this->modelo_busquedas->sede_actual();
			$query = $this->db->query("SELECT B.nombre , COUNT(A.rut) as cantidad
										FROM asignacion_agenda A JOIN usuarios B ON B.rut = A.rut
										WHERE A.fecha_asignacion >= sysdate()
										AND A.sede = '$sede'
										GROUP BY nombre ORDER BY cantidad DESC;");
			return $query;
		}

		public function causales_termino(){
			$query = $this->db->query("SELECT * FROM causal_termino");
			return $query;
		}
		public function sede_actual(){
			$rut_user=$_SESSION['rut_user'];
			$query = $this->db->query("SELECT sede FROM usuarios WHERE rut = '$rut_user';");
			foreach($query->result()  as $row){
				return $row->sede;
			}
		}
		public function traer_sedes(){
			$rut_user=$_SESSION['rut_user'];
			$query = $this->db->query("SELECT u.id_sede, s.nombre_sede FROM usuario_sede u left outer join sedes s on s.id_sede = u.id_sede where rut = '$rut_user' ");
			return $query;
		}
	}
?>
