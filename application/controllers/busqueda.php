<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Busqueda extends CI_Controller {
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
	
	public function base(){		
		$this->load->view('busqueda/busqueda');
	}
	
	public function historica(){		
		$this->load->view('busqueda/historica');
	}
	
	public function orientacion(){
		$this->load->view('busqueda/busqueda_orientacion');
	}
	
	//inicio seba
		public function profesor(){
		
		$this->load->view('busqueda/busqueda_profesor');
	}
	
	public function disponibilidad_profesor(){
		$this->load->model('modelo_busquedas');
		
		$rut=$this->input->get('rut');
		$var['disponibilidad'] = $this->modelo_busquedas->buscar_disponibilidad_profesor($rut);
		$this->load->view('mantenedor/disponibilidad_profesor',$var);
	}
	
	public function resultado_profesor(){
		$this->load->model('modelo_busquedas');		
		$rut=$this->input->get('rut');
		$nombre=$this->input->get('nombre');
		$var['profesores'] = $this->modelo_busquedas->buscar_profesores($rut, $nombre);
		$this->load->view('busqueda/resultado_busqueda_profesor',$var);
	}
	
	public function resultado_profesor_sede(){
		$this->load->model('modelo_busquedas');			
		$var['profesores'] = $this->modelo_busquedas->buscar_profesores_sede();
		$this->load->view('busqueda/resultado_busqueda_profesor',$var);
	}
	//fin seba
	
	public function buscar_causas(){
		$rol = $this->input->get('rol');
		$abogado = $this->input->get('abogado');
		$alumno = $this->input->get('alumno');
		$usuario = $this->input->get('usuario');
		$tipo_busqueda =  $this->input->get('tipo_busqueda');
		$vigente =  $this->input->get('vigente');
		$var['info'] = null;
		$this->load->model('modelo_busquedas');
		if($tipo_busqueda=='rut'){
			$var['info'] = $this->modelo_busquedas->buscar_causas_rut($rol,$abogado, $alumno, $usuario, $vigente);
		}else if($tipo_busqueda=='nombres'){
			$var['info'] = $this->modelo_busquedas->buscar_causas_nombre($rol,$abogado, $alumno, $usuario, $vigente);
		}else{
			echo "error";
		}
			
		
		$this->load->view('busqueda/resultado_busqueda', $var);
	}
	
	public function buscar_mis_causas(){
		$this->load->model('modelo_privilegios');
		$this->load->model('modelo_busquedas');		
		$var['info'] = $this->modelo_busquedas->buscar_causas_individual();
		$var['tipo'] = $this->modelo_privilegios->tipo_usuario();		
		$this->load->view('busqueda/resultado_mis_causas', $var);
	}
	
	public function buscar_causas_audiencias(){
		
		$var['info'] = null;
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_causas_audiencias();
		
			
		
		$this->load->view('audiencia/busqueda_causas', $var);
	}
	
	public function buscar_causas_historicas(){
		$rol = $this->input->get('rol');
		$abogado = $this->input->get('abogado');
		$alumno = $this->input->get('alumno');
		$usuario = $this->input->get('usuario');
		$tipo_busqueda =  $this->input->get('tipo_busqueda');
		
		$var['info'] = null;
		$this->load->model('modelo_busquedas');
		if($tipo_busqueda=='rut'){
			$var['info'] = $this->modelo_busquedas->buscar_causas_rut($rol,$abogado, $alumno, $usuario, $vigente);
		}else if($tipo_busqueda=='nombres'){
			$var['info'] = $this->modelo_busquedas->buscar_causas_historicas_nombre($rol,$abogado, $alumno, $usuario);
		}else{
			echo "error";
		}
			
		
		$this->load->view('busqueda/resultado_busqueda', $var);
	}
	
	public function buscar_orientaciones(){
		$abogado = $this->input->get('abogado');
		$usuario = $this->input->get('usuario');
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_orientaciones_nombre($abogado, $usuario);
			
		
		$this->load->view('busqueda/resultado_orientacion', $var);
	}
	
	public function buscar_audiencias(){
		$this->load->model('modelo_busquedas');
		$id_causa = $this->input->get('id_causa');
		$var['audiencias'] = $this->modelo_busquedas->buscar_audiencias($id_causa);
		$this->load->view('audiencia/resultado_audiencia', $var);
	}
	
	public function buscar_agendaciones(){
		$this->load->model('modelo_busquedas');
		$id_causa = $this->input->get('id_causa');
		$var['agendaciones'] = $this->modelo_busquedas->buscar_agendaciones($id_causa);
		$this->load->view('agenda/resultado_agendaciones', $var);
	}
	
	public function buscar_agendaciones_por_id(){
		$this->load->model('modelo_busquedas');
		$id_asignacion = $this->input->get('id_asignacion');
		$agendaciones = $this->modelo_busquedas->buscar_agendaciones_por_id($id_asignacion);
		foreach($agendaciones->result() as $row){
			echo "Fecha: '$row->fecha_asignacion'<br>";
			echo "Inicio: '$row->hora_inicio'<br>";
			echo "Termino: '$row->hora_fin'<br>";
			echo "Tipo: '$row->tipo_asunto'<br>";
			echo "ID: '$row->id_asunto'<br>";
		}
		
	}
	
	public function buscar_audiencia_id(){
		$this->load->model('modelo_busquedas');
		$id_audiencia = $this->input->get('id_audiencia');
		$var['audiencia'] = $this->modelo_busquedas->buscar_audiencia_id($id_audiencia);
		$this->load->view('audiencia/detalle_audiencia', $var);
	}
	
	public function detalle_causa($rut){
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_detalle_causa($rut);		
		$this->load->view('busqueda/detalle_causa',$var);
	}
	public function detalle_abogado($rut, $vigente){
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_detalle_abogado($rut, $vigente);		
		$this->load->view('busqueda/detalle_abogado',$var);
	}
	
	public function detalle_orientacion($id){
		$this->load->model('modelo_busquedas');
		$this->load->model('modelo_ingresos');
		$var['materia'] = $this->modelo_ingresos->trae_materia();
		$var['info'] = $this->modelo_busquedas->buscar_detalle_abogado_orientacion($id);		
		$this->load->view('busqueda/detalle_orientacion',$var);
	}
	
	public function detalle_alumno($rut, $vigente){
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_detalle_alumno($rut, $vigente);
		$notas = $this->modelo_busquedas->traer_promedio_usuario($rut);
		$acumulado = 0;
		$total = 0;	
		$final = 0;
		if ($notas->num_rows() > 0)
		{
		
		   foreach ($notas->result() as $row)
		   {		
					$total = $total + 1;
					$acumulado = $acumulado + $row->nota_final;						
		   }
		}
		if($acumulado==0){
			$final = 0;
		}else{
			$final = $acumulado / $total;	
		}
			
		$var['promedio'] = $final;
		$this->load->view('busqueda/detalle_alumno',$var);
	}
	
	
	public function detalle_usuario($rut, $vigente){		
		$this->load->model('modelo_busquedas');
		$var['info'] = $this->modelo_busquedas->buscar_detalle_usuario($rut, $vigente);		
		$this->load->view('busqueda/detalle_usuario',$var);
	}
	
	public function buscar_usuarios(){
		$tipo = $this->input->get('tipo');
		$this->load->model('modelo_busquedas');
		$var['tipo'] = $tipo;
		$var['usuarios'] = $this->modelo_busquedas->buscar_usuarios();
		$this->load->view('busqueda/busqueda_usuarios', $var);
	}
	
	public function traer_promedio(){
		$rut = $this->input->get('rut');
		$this->load->model('modelo_busquedas');		
		$var['notas'] = $this->modelo_busquedas->traer_promedio_usuario($rut);
		
		
	}
	
	public function traer_causales_termino(){
		$this->load->model('modelo_busquedas');	
		$causales = $this->modelo_busquedas->causales_termino();
		if ($causales->num_rows() > 0)
		{	
			echo "Fecha : <input type='date' id='fecha_termino_causa'><br><br>";
			echo "<select id='causales'>";
			echo "<option value='no'>Seleccione una Causal</option>";
		   foreach ($causales->result() as $row)
		   {		
				echo "<option value='$row->id_causal_termino'>$row->nom_causal</option>";
										
		   }
		   echo "</select><br>";
		}		
	}
	
	public function traer_sedes(){
		$this->load->model('modelo_busquedas');	
		$causales = $this->modelo_busquedas->traer_sedes();
		if ($causales->num_rows() > 0)
		{	
			
			echo "<select id='sedes'>";
			echo "<option value='no'>Seleccione una Sede</option>";
		   foreach ($causales->result() as $row)
		   {		
				echo "<option value='$row->id_sede'>$row->nombre_sede</option>";									
		   }
		   echo "</select>";
		}		
	}
}
