<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Ingreso extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function orientacion(){
		$this->load->model('modelo_ingresos');
		$var['materia'] = $this->modelo_ingresos->trae_materia();
		$var['usuario'] = '';
		$this->load->view('orientacion/ingreso_orientacion', $var);
	}

	public function audiencias(){
		$this->load->view('audiencia/audiencias');
	}

	public function causa(){
		$this->load->model('modelo_ingresos');
		$var['info'] = $this->modelo_ingresos->trae_profesores();
		//inicio seba
		$var['alumnos'] = $this->modelo_ingresos->trae_alumnos();
		//fin seba
		$var['materia'] = $this->modelo_ingresos->trae_materia();

		$this->load->view('causa/ingreso_causa', $var);
	}


	 /*
		$fecha = $this->input->get('fecha_causa');
		$fecha = $this->input->get('nombre_abogado');
		$fecha = $this->input->get('nombre_alumno');
		$fecha = $this->input->get('nombre_usuario');
		$fecha = $this->input->get('rut_usuario');
		$fecha = $this->input->get('edad');
		$fecha = $this->input->get('domicilio');
		$fecha = $this->input->get('telefono');
		$fecha = $this->input->get('email');
	*/
	//inicio seba

	public function form_ingreso_audiencia(){

		$this->load->model('modelo_busquedas');
		$id_causa = $this->input->get('id_causa');
		$var['info_causa'] = $this->modelo_busquedas->buscar_detalle_causa($id_causa);
		$var['id_causa'] = $this->input->get('id_causa');
		$this->load->view('audiencia/ingreso_audiencia', $var);
	}

	public function ingresar_causa(){
		$this->load->model('modelo_ingresos');

		//capturo datos
		$id = $this->input->get('id');
		$materia = $this->input->get('materia');
		$fecha_string = $this->input->get('fecha');
		$abogado = $this->input->get('abogado');
		$alumno = $this->input->get('alumno');
		$usuario = $this->input->get('usuario');
		$dv = $this->input->get('dv');

		$nombre_usuario = $this->input->get('nombre_usuario');
		$telefono = $this->input->get('telefono');
		$domicilio = $this->input->get('domicilio');
		$email = $this->input->get('email');

		$dv_abogado=$this->modelo_ingresos->trae_dv($abogado);
		$dv_alumno=$this->modelo_ingresos->trae_dv($alumno);

		$this->modelo_ingresos->ingresar_cliente($usuario,$dv, $nombre_usuario, $telefono, $domicilio,$email);



		//convierto las fechas a date
		$fecha=date('Y-m-d', strtotime($fecha_string));
		//convierto las horas a time
		$this->modelo_ingresos->ingresar_configuracion_causa($id,$materia, $fecha, $alumno, $abogado,$usuario,$dv_abogado,$dv_alumno,$dv);
		echo "ok";

	}

	public function ingresar_asunto(){
		$this->load->model('modelo_ingresos');

		//capturo datos
		$nombre_asunto = $this->input->get('nombre_asunto');
		$descripcion_asunto = $this->input->get('descripcion_asunto');
		$abogado = $this->input->get('abogado');
		$dv_abogado=$this->modelo_ingresos->trae_dv($abogado);
		$fecha_string = $this->input->get('fecha');
		$hora = $this->input->get('hora');
		$tipo = $this->input->get('tipo');
		$causa = $this->input->get('causa');
		//convierto las fechas a date
		$fecha=date('Y-m-d', strtotime($fecha_string));

		$this->load->model('modelo_busquedas');
		$sede = $this->modelo_busquedas->sede_actual();

		if($causa != ""){
			$this->modelo_ingresos->ingresa_asunto_audiencia($nombre_asunto, $descripcion_asunto, $abogado, $fecha, $hora, $causa, $sede);
		}else{
			$this->modelo_ingresos->ingresa_asuntos($nombre_asunto, $descripcion_asunto, $abogado, $fecha, $hora, $sede);
		}

		echo "ok";
	}



	public function ingresar_orientacion(){


		$current_session = $_SESSION['rut_user'];
		$this->load->model('modelo_ingresos');


		//capturo datos
		$materia = $this->input->get('materia');
		$fecha_string = $this->input->get('fecha');
		$rut_usuario = $this->input->get('usuario');
		$dv = $this->input->get('dv');

		$nombre_usuario = $this->input->get('nombre_usuario');
		$telefono = $this->input->get('telefono');
		$domicilio = $this->input->get('domicilio');
		$email = $this->input->get('email');
		$resena = $this->input->get('resena');

		$this->load->model('modelo_busquedas');
		$sede = $this->modelo_busquedas->sede_actual();

		$this->modelo_ingresos->ingresar_cliente($rut_usuario,$dv, $nombre_usuario, $telefono, $domicilio,$email);
		//convierto las fechas a date
		$fecha=date('Y-m-d', strtotime($fecha_string));
		//convierto las horas a time
		$this->modelo_ingresos->ingresa_orientacion($fecha, $materia, $resena, $current_session, $rut_usuario, $sede);
		echo "ok";

	}

	function ingresar_audiencia(){
		$this->load->model('modelo_ingresos');
		$this->load->model('modelo_busquedas');

		$id_causa = $this->input->get('id_causa');
		$tipo_audiencia = $this->input->get('tipo_audiencia');
		$descripcion = $this->input->get('descripcion');
		$rut_alumno = $this->input->get('rut_alumno');
		$rut_profesor = $this->input->get('rut_profesor');

		$fecha = $this->input->get('fecha_audiencia');

		$fec_ingreso = date('Y-m-d', strtotime($fecha));
		$hora_ingreso = $this->input->get('hora_audiencia');

		$nota_item_1			= 0;
		$nota_item_2 			= 0;
		$nota_item_3 			= 0;
		$nota_final				= 0;

		//-- NOTAS REGISTRO --//

		$nota_registro_1 		=  $this->input->get('nota_registro_1');
		$nota_item_1			=  $nota_item_1 + $nota_registro_1;
		$nota_registro_2 		=  $this->input->get('nota_registro_2');
		$nota_item_1			=  $nota_item_1 + $nota_registro_2;
		$nota_registro_3 		=  $this->input->get('nota_registro_3');
		$nota_item_1			=  $nota_item_1 + $nota_registro_3;

		$nota_registro_otros 	=  $this->input->get('nota_registro_otros');

		$nota_item_1 			=  round(($nota_item_1)/3);
		$nota_final				=  $nota_final + $nota_item_1;

		//-- NOTAS DESTREZA --//

		$nota_destreza_1 		=  $this->input->get('nota_destreza_1');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_1;
		$nota_destreza_2 		=  $this->input->get('nota_destreza_2');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_2;
		$nota_destreza_3 		=  $this->input->get('nota_destreza_3');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_3;
		$nota_destreza_4 		=  $this->input->get('nota_destreza_4');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_4;
		$nota_destreza_5 		=  $this->input->get('nota_destreza_5');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_5;
		$nota_destreza_6 		=  $this->input->get('nota_destreza_6');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_6;
		$nota_destreza_7 		=  $this->input->get('nota_destreza_7');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_7;
		$nota_destreza_8 		=  $this->input->get('nota_destreza_8');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_8;
		$nota_destreza_9 		=  $this->input->get('nota_destreza_9');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_9;
		$nota_destreza_10 		=  $this->input->get('nota_destreza_10');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_10;
		$nota_destreza_11 		=  $this->input->get('nota_destreza_11');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_11;
		$nota_destreza_12 		=  $this->input->get('nota_destreza_12');
		$nota_item_2 			=  $nota_item_2 + $nota_destreza_12;

		$nota_item_2 			=  round(($nota_item_2)/12);
		$nota_final				=  $nota_final + $nota_item_2;

		//-- NOTA OTROS ASPECTOS --//

		$nota_item_3 			=  $this->input->get('nota_item_3');
		$nota_final				=  $nota_final + $nota_item_3;

		//-- NOTA FINAL --//

		$nota_final				=  round(($nota_final)/3);


		$sede = $this->modelo_busquedas->sede_actual();

		$this->modelo_ingresos->ingresa_audiencia($descripcion, $id_causa, $tipo_audiencia, $rut_profesor, $rut_alumno, $nota_registro_1,
												  $nota_registro_2, $nota_registro_3, $nota_registro_otros, $nota_destreza_1, $nota_destreza_2,
												  $nota_destreza_3, $nota_destreza_4, $nota_destreza_5, $nota_destreza_6, $nota_destreza_7,
												  $nota_destreza_8, $nota_destreza_9, $nota_destreza_10, $nota_destreza_11, $nota_destreza_12,
												  $nota_item_1, $nota_item_2, $nota_item_3, $nota_final, $fec_ingreso, $hora_ingreso, $sede);

		$var['audiencias'] = $this->modelo_busquedas->buscar_audiencias($id_causa);
		$this->load->view('audiencia/resultado_audiencia', $var);
	}

	public function eliminar_asignacion(){
		$this->load->model('modelo_agenda');
		$id = $this->input->get('id');
		$this->modelo_agenda->eliminar_asignacion($id);
		echo "ok";
	}

	public function mantenedor(){
		$this->load->view('mantenedor/mantenedor_bloques');
	}

	public function ingresar_configuracion(){
		$this->load->model('modelo_agenda');
		$this->load->model('modelo_ingresos');
		$estado = "";

		//capturo datos
		$rut = $this->input->get('rut');
		$fecha_inicio_string = $this->input->get('fecha_inicio');
		$fecha_termino_string = $this->input->get('fecha_termino');
		$hora_inicio = $this->input->get('hora_inicio');
		$hora_termino = $this->input->get('hora_termino');
		$dia = $this->input->get('dia');
		//convierto las fechas a date
		$fecha_inicio =date('Y-m-d', strtotime($fecha_inicio_string));
		$fecha_termino =date('Y-m-d', strtotime($fecha_termino_string));
		//traigo inicio y fin de jornada
		$termino_jornada = $this->modelo_agenda->traer_termino();
		$inicio_jornada= $this->modelo_agenda->traer_inicio();
		//convierto las horas a time
		$hora_inicio = date("H:i:s",strtotime($hora_inicio));
		$hora_termino = date("H:i:s",strtotime($hora_termino));
		$inicio_jornada = date("H:i:s",strtotime($inicio_jornada));
		$termino_jornada = date("H:i:s",strtotime($termino_jornada));
		//comparo fechas y hora para el estado del ingresos

		$this->load->model('modelo_busquedas');
		$sede = $this->modelo_busquedas->sede_actual();

		if($fecha_inicio <= $fecha_termino){
			if($inicio_jornada<=$hora_inicio&&$termino_jornada>=$hora_termino&&$hora_inicio<$hora_termino){
				$this->modelo_ingresos->ingresar_configuracion_agenda($rut,$fecha_inicio, $fecha_termino, $hora_inicio, $hora_termino,$dia, $sede);
				$estado="ok";
			}else{
				$estado="hora";
			}
		}else{
			$estado="fecha";
		}

		echo "ok";

	}
	//fin seba

	public function _cb_col_rut($value, $row)
	{
		$str = $row->rut_cliente.'-'.$row->dv_cliente;
		return $str;
	}

	public function _cb_col_rut_admin($value, $row)
	{
		$str = $row->rut.'-'.$row->dv;
		return $str;
	}

	function callback_admin($post_array)
	{
		$key = 'F';
		$post_array['tipo_usuario'] = $key;
		// ENCRIPTACIÓN DE CLAVE CON BCRYPT
		$post_array['pwd'] = $this->_encriptar_nuevo_password($post_array['pwd']);
		return $post_array;
	}

	function after_admin($post_array)
	{
		$this->load->model('modelo_busquedas');
		$this->load->model('modelo_ingresos');
		$rut = $post_array['rut'];

		$sede = $this->modelo_busquedas->sede_actual();

		$this->modelo_ingresos->delete_privilegios($rut, $sede);

		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Mantencion", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Busquedas", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Agenda", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Orientaciones", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Audiencia", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Panel", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Reportes", "1");

		$this->modelo_ingresos->ingreso_sede_usuario($rut, $sede);

		$this->modelo_ingresos->actualiza_sede_nuevo_usuario($rut, $sede);
	}

	function callback_profesores($post_array)
	{
		$key = 'P';
		$post_array['tipo_usuario'] = $key;
		// ENCRIPTACIÓN DE CLAVE CON BCRYPT
		$post_array['pwd'] = $this->_encriptar_nuevo_password($post_array['pwd']);
		return $post_array;
	}

	function after_profesores($post_array)
	{
		$this->load->model('modelo_busquedas');
		$this->load->model('modelo_ingresos');
		$rut = $post_array['rut'];

		$sede = $this->modelo_busquedas->sede_actual();

		$this->modelo_ingresos->delete_privilegios($rut, $sede);

		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Mantencion", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Busquedas", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Agenda", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Orientaciones", "1");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Audiencia", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Panel", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Reportes", "0");

		$this->modelo_ingresos->ingreso_sede_usuario($rut, $sede);

		$this->modelo_ingresos->actualiza_sede_nuevo_usuario($rut, $sede);
	}

	function callback_alumnos($post_array)
	{
		$key = 'A';
		$post_array['tipo_usuario'] = $key;
		// ENCRIPTACIÓN DE CLAVE CON BCRYPT
		$post_array['pwd'] = $this->_encriptar_nuevo_password($post_array['pwd']);
		return $post_array;
	}

	function after_alumnos($post_array)
	{
		$this->load->model('modelo_busquedas');
		$this->load->model('modelo_ingresos');
		$rut = $post_array['rut'];

		$sede = $this->modelo_busquedas->sede_actual();

		$this->modelo_ingresos->delete_privilegios($rut, $sede);

		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Mantencion", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Busquedas", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Agenda", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Orientaciones", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Audiencia", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Panel", "0");
		$this->modelo_ingresos->ingreso_privilegios($rut, $sede, "Reportes", "0");

		$this->modelo_ingresos->ingreso_sede_usuario($rut, $sede);

		$this->modelo_ingresos->actualiza_sede_nuevo_usuario($rut, $sede);
	}

	public function configuracion_admin(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('modelo_busquedas');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$sede = $this->modelo_busquedas->sede_actual();

			$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			$crud->set_subject('usuarios');
			$crud->where('tipo_usuario','F');
			$crud->required_fields('rut', 'dv', 'pwd', 'nombre');
			$crud->fields('rut','dv','nombre_usuario','nombre', 'pwd','telefono', 'email', 'tipo_usuario');
			$crud->columns('rut','dv','nombre_usuario','nombre', 'telefono', 'email');

			$crud->callback_before_insert(array($this,'callback_admin'));
			$crud->callback_after_insert(array($this,'after_admin'));

			$crud->change_field_type('tipo_usuario','invisible');
			$crud->change_field_type('pwd','password');
			$crud->change_field_type('telefono','phone');
			$crud->change_field_type('email','email');

			// unset the other name columns from view
			$crud->unset_columns('dv');
			$crud->callback_column('rut',array($this,'_cb_col_rut_admin'));

			$crud->set_language('spanish');
			$output = $crud->render();

			$this->load->view('mantenedor/mantenedor_admin',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_profesores(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			$crud->set_subject('usuarios');
			$crud->where('tipo_usuario','P');
			$crud->required_fields('rut', 'dv', 'pwd', 'nombre');
			$crud->fields('rut','dv','nombre_usuario', 'nombre', 'pwd','telefono', 'email', 'tipo_usuario');
			$crud->columns('rut','dv','nombre_usuario', 'nombre', 'telefono', 'email');

			$crud->callback_before_insert(array($this,'callback_profesores'));
			$crud->callback_after_insert(array($this,'after_profesores'));

			$crud->change_field_type('tipo_usuario','invisible');
			$crud->change_field_type('pwd','password');
			$crud->change_field_type('telefono','phone');
			$crud->change_field_type('email','email');

			// unset the other name columns from view
			$crud->unset_columns('dv');
			$crud->callback_column('rut',array($this,'_cb_col_rut_admin'));

			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_profesores',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_alumnos(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			$crud->set_subject('usuarios');
			$crud->where('tipo_usuario','A');
			$crud->required_fields('rut', 'dv', 'pwd', 'nombre');
			$crud->fields('rut','dv','nombre_usuario','nombre', 'pwd','telefono', 'email', 'tipo_usuario');
			$crud->columns('rut','dv','nombre_usuario','nombre', 'telefono', 'email');

			$crud->callback_before_insert(array($this,'callback_alumnos'));
			$crud->callback_after_insert(array($this,'after_alumnos'));

			$crud->change_field_type('tipo_usuario','invisible');
			$crud->change_field_type('pwd','password');
			$crud->change_field_type('telefono','phone');
			$crud->change_field_type('email','email');

			// unset the other name columns from view
			$crud->unset_columns('dv');
			$crud->callback_column('rut',array($this,'_cb_col_rut_admin'));

			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_alumnos',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_clientes(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{

			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('clientes');
			$crud->set_subject('usuarios');
			$crud->required_fields('rut_cliente', 'dv_cliente', 'nombre_cliente', 'email');
			$crud->fields('rut_cliente','dv_cliente','nombre_cliente', 'telefono', 'domicilio', 'email');
			$crud->columns('rut_cliente','dv_cliente','nombre_cliente', 'telefono','email');

			$crud->change_field_type('telefono','phone');
			$crud->change_field_type('email','email');

			$crud->unset_columns('dv_cliente');
			$crud->callback_column('rut_cliente',array($this,'_cb_col_rut'));

			$crud->display_as('rut_cliente', 'Rut');
			$crud->display_as('nombre_cliente', 'Nombre');

			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_clientes',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}



	public function configuracion_materias(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('materia');
			$crud->set_subject('materia');
			$crud->required_fields('nom_materia');
			$crud->display_as('nom_materia','Nombre Materia');
			$crud->columns('nom_materia');
			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_materias',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_causales(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('causal_termino');
			$crud->set_subject('causal_termino');
			$crud->required_fields('nom_causal');
			$crud->display_as('nom_causal','Nombre Causal');
			$crud->columns('nom_causal');
			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_causales',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_privilegios(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('privilegios');
			$crud->set_subject('privilegios');
			$crud->required_fields('rut', 'sede');
			$crud->columns('rut', 'tipo_privilegio', 'privilegio', 'sede');
			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_privilegios',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_sedes(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('sedes');
			$crud->set_subject('sedes');
			$crud->required_fields('nombre_sede');
			$crud->display_as('nombre_sede','Nombre Sede');
			$crud->columns('nombre_sede');
			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_sedes',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function configuracion_users(){

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('Grocery_crud_model');

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('usuario_sede');
			$crud->set_subject('usuario_sede');
			$crud->required_fields('rut', 'id_sede');
			$crud->columns('rut', 'id_sede');
			$crud->set_language('spanish');
			$output = $crud->render();
			$this->load->view('mantenedor/mantenedor_users_sede',$output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function traspaso_datos_orientacion(){
		$this->load->model('modelo_busquedas');
		$this->load->model('modelo_ingresos');

		$rut_cliente = $this->input->get('rut_cliente');
		$var['usuario'] = $this->modelo_busquedas->buscar_usuario_por_rut($rut_cliente);
		//$var['materia'] = $this->modelo_ingresos->trae_materia();
		//$this->load->view('orientacion/ingreso_orientacion', $var);
		return $var;

	}

	public function update_estado_asignacion(){
		$this->load->model('modelo_ingresos');
		$id_asignacion = $this->input->get('id_asignacion');
		$estado = $this->input->get('estado');

		$this->modelo_ingresos->up_estado_asignacion($id_asignacion, $estado);

	}

	public function update_termino_causa(){
		$this->load->model('modelo_ingresos');
		$id_causa = $this->input->get('id_causa');
		$id_causal_termino = $this->input->get('id_causal_termino');
		$fecha = $this->input->get('fecha_termino');
		$fecha_termino = date('Y-m-d', strtotime($fecha));

		$this->modelo_ingresos->up_termino_causa($id_causa, $id_causal_termino, $fecha_termino);

	}

	public function update_sede_actual(){
		$this->load->model('modelo_ingresos');
		$sede_seleccionada = $this->input->get('sede_seleccionada');
		$this->modelo_ingresos->actualiza_sede_actual($sede_seleccionada);

	}

	// http://php.net/manual/en/function.password-hash.php //
	private function _encriptar_nuevo_password($password) {
		$cost = 8;
		$password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
		return $password_hash;
	}
}
