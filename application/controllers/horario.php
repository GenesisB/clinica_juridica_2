<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Horario extends CI_Controller {
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
	public function traer_horario(){
		$this->load->model('modelo_horario');
		$this->load->model('modelo_agenda');
		$var['horario'] = $this->modelo_horario->traer_horario();	
		$var['termino'] = $this->modelo_agenda->traer_termino();	
		$var['inicio'] = $this->modelo_agenda->traer_inicio();
		$this->load->view('horario/horario', $var);
	}
	public function traer_horario_json(){
		$rut =  $this->input->get('rut');
		$this->load->model('modelo_horario');
		$var['horario'] = $this->modelo_horario->traer_horario_json($rut);		
		$this->load->view('horario/horario_json', $var);
	}
	public function login_horario(){
		$rut =  $this->input->get('rut');	
		$password =  $this->input->get('password');
		$this->load->model('modelo_horario');
		$resultado = $this->modelo_horario->login_horario($rut, $password);	
		echo $resultado;
		
	}
	
	
	
}
