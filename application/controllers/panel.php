<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Panel extends CI_Controller {

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
	
	public function cargar()	{
		
		$this->load->model('modelo_busquedas');
		$var['cantidad_causas_materia'] = $this->modelo_busquedas->cantidad_causas_materia();
		$var['cantidad_causas_profesor'] = $this->modelo_busquedas->cantidad_causas_profesor();
		$var['cantidad_causas_causal'] = $this->modelo_busquedas->cantidad_causas_causal();
		$var['cantidad_agendaciones_profesor_h'] = $this->modelo_busquedas->cantidad_agendaciones_profesor_h();
		$var['cantidad_agendaciones_profesor_v'] = $this->modelo_busquedas->cantidad_agendaciones_profesor_v();
		$this->load->view('panel/panel',$var);
	}
	
}
