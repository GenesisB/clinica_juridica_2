<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Menu extends CI_Controller {

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
	
	public function index()
	{
		$this->load->view('inicio');
	}
	public function menu_principal()
	{
		$this->load->model('modelo_privilegios');	
		$var['privilegios'] = $this->modelo_privilegios->traer_privilegios();
		$var['nombre'] = $this->modelo_privilegios->nombre_usuario();
		$var['sede'] = $this->modelo_privilegios->sede_usuario();
		$var['tipo'] = $this->modelo_privilegios->tipo_usuario();
		$var['cantidad_sedes'] = $this->modelo_privilegios->cantidad_sedes();
		$this->load->view('menu_principal',$var);
	}
	
	public function cerrar_sesion()
	{
		$this->load->view('Logout');
	}
	public function slider()
	{
		$this->load->view('slider');
	}
	public function login()
	{
		$usuario =  $this->input->post('username');	
		$clave =  $this->input->post('password');	
		$this->load->model('modelo_privilegios');
		$estado = $this->modelo_privilegios->login($usuario,$clave);
		if($estado=="OK"){
			echo "OK";
		}else{
			echo "NO";
		}
	}	
	
	


}
