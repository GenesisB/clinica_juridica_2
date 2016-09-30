<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Agenda extends CI_Controller {
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
			
		$this->load->model('modelo_agenda');
		$var['info'] = $this->modelo_agenda->traer_bloques();	
		$this->load->view('agenda/agenda', $var);
	}
	public function bloque(){			
		$var['dia'] =  $this->input->get('dia');	
		$var['hora'] =  $this->input->get('hora');	
		$var['profesor_a_cargar'] =  $this->input->get('profesor_a_cargar');
		
		$this->load->view('agenda/bloque', $var);
	}
	public function detalle_bloque(){		
		$dia_texto = "";
		$this->load->model('modelo_busquedas');		
		$this->load->model('modelo_agenda');			
		$profesor_a_cargar = $this->input->get('profesor_a_cargar');
		$dia = $this->input->get('dia');	
		$hora =  $this->input->get('hora');
		if($profesor_a_cargar==''){
			$var['dia'] =  $this->input->get('dia');	
			$var['hora'] =  $this->input->get('hora');
			if(date("w",strtotime($dia))==0){
				$dia_texto = "DOMINGO";
			}else if(date("w",strtotime($dia))==1){
				$dia_texto = "LUNES";
			}else if(date("w",strtotime($dia))==2){
				$dia_texto = "MARTES";
			}else if(date("w",strtotime($dia))==3){
				$dia_texto = "MIERCOLES";
			}else if(date("w",strtotime($dia))==4){
				$dia_texto = "JUEVES";
			}else if(date("w",strtotime($dia))==5){
				$dia_texto = "VIERNES";
			}else if(date("w",strtotime($dia))==6){
				$dia_texto = "SABADO";
			}
			$var['dia_texto'] = $dia_texto;		
			$var['profesor_a_cargar'] =  $this->input->get('profesor_a_cargar');
			
			$var['profesores_disponibles'] = $this->modelo_agenda->profesores_disponibles($dia,$hora,$dia_texto);
			
			$var['asignacion'] = $this->modelo_busquedas->buscar_causa_Abogado($dia,$hora,$profesor_a_cargar);	
			
			$this->load->view('agenda/detalle_bloque', $var);
		}
		else{
			$var['dia'] =  $this->input->get('dia');	
			$var['hora'] =  $this->input->get('hora');
			$var['tipo'] = $this->input->get('tipo');
			$var['info'] = $this->modelo_busquedas->buscar_detalle_abogado($profesor_a_cargar, 'si');	
			$this->load->view('agenda/detalle_agendar', $var); //arreglar aca que traiga el form antiguo
			
		}
		
	}
	
	public function detalle_bloque_individual(){		
		$dia_texto = "";
		$this->load->model('modelo_busquedas');		
		$this->load->model('modelo_agenda');			
		$profesor_a_cargar = $this->input->get('profesor_a_cargar');
		$dia = $this->input->get('dia');	
		$hora =  $this->input->get('hora');
		
		$var['dia'] =  $this->input->get('dia');	
		$var['hora'] =  $this->input->get('hora');
		if(date("w",strtotime($dia))==0){
			$dia_texto = "DOMINGO";
		}else if(date("w",strtotime($dia))==1){
			$dia_texto = "LUNES";
		}else if(date("w",strtotime($dia))==2){
			$dia_texto = "MARTES";
		}else if(date("w",strtotime($dia))==3){
			$dia_texto = "MIERCOLES";
		}else if(date("w",strtotime($dia))==4){
			$dia_texto = "JUEVES";
		}else if(date("w",strtotime($dia))==5){
			$dia_texto = "VIERNES";
		}else if(date("w",strtotime($dia))==6){
			$dia_texto = "SABADO";
		}
		$var['dia_texto'] = $dia_texto;		
		$var['profesor_a_cargar'] =  $this->input->get('profesor_a_cargar');
		
		$var['profesores_disponibles'] = $this->modelo_agenda->profesores_disponibles_individual($dia,$hora,$dia_texto,$profesor_a_cargar);
		
		$var['asignacion'] = $this->modelo_busquedas->buscar_causa_Abogado($dia,$hora,$profesor_a_cargar);	
		
		$this->load->view('agenda/detalle_bloque', $var);
		
		
		
	}
	
	
	
	public function semanal(){	
		$hoy_string = $this->input->get('hoy');
		$profesor = $this->input->get('profesor');
		
		if($hoy_string==null || $hoy_string == '' || $hoy_string=='undefined'){
			$hoy =  date("d-m-Y"); 
			
		}else{
			
			$hoy = date('d-m-Y', strtotime($hoy_string));
			
		}
		
		$hoy_string_2 = strtotime($hoy);
		if(date("w",strtotime($hoy))==0){
			$domingo = date('d-m-Y', strtotime($hoy));
		}else{
			$domingo = date('d-m-Y', strtotime('Next Sunday', $hoy_string_2));
		}
		$lunes = date('d-m-Y', strtotime($domingo .' -6 day'));
		$martes = date('d-m-Y', strtotime($domingo .' -5 day'));
		$miercoles = date('d-m-Y', strtotime($domingo .' -4 day'));
		$jueves = date('d-m-Y', strtotime($domingo .' -3 day'));
		$viernes = date('d-m-Y', strtotime($domingo .' -2 day'));
		$sabado = date('d-m-Y', strtotime($domingo .' -1 day'));	
		$var['profesor_seleccionado'] =  $profesor;	
		$var['fecha_hoy'] =  $hoy;
		$var['sabado']=$sabado;
		$var['domingo']=$domingo;		
		$this->load->model('modelo_agenda');
		$var['termino'] = $this->modelo_agenda->traer_termino();	
		$var['inicio'] = $this->modelo_agenda->traer_inicio();
		$var['profesores'] = $this->modelo_agenda->cantidad_asignaciones($lunes, $viernes);
		$inicio_tiempo = $var['inicio'];
		$termino_tiempo = $var['termino'];
		
		$inicio_tiempo = $inicio_tiempo;
		$inicio_tiempo = date("H:i:s",strtotime($inicio_tiempo));
		
		$termino_tiempo = $termino_tiempo;
		$termino_tiempo = date("H:i:s",strtotime($termino_tiempo));
		$termino_tiempo_original = $termino_tiempo;
		
		while($inicio_tiempo < $termino_tiempo_original ){
			$termino_tiempo = date('H:i:s', strtotime("$inicio_tiempo + 30 minutes") );
			$var['asignaciones'][] = $this->modelo_agenda->asignaciones($lunes,$inicio_tiempo, $termino_tiempo, 'lunes',$profesor);
			$var['asignaciones'][] = $this->modelo_agenda->asignaciones($martes,$inicio_tiempo, $termino_tiempo, 'martes',$profesor);
			$var['asignaciones'][] = $this->modelo_agenda->asignaciones($miercoles,$inicio_tiempo, $termino_tiempo, 'miercoles',$profesor);
			$var['asignaciones'][] = $this->modelo_agenda->asignaciones($jueves,$inicio_tiempo, $termino_tiempo, 'jueves',$profesor);
			$var['asignaciones'][] = $this->modelo_agenda->asignaciones($viernes,$inicio_tiempo, $termino_tiempo, 'viernes',$profesor);
			
			$inicio_tiempo = date('H:i:s', strtotime("$inicio_tiempo + 30 minutes") );
			$termino_tiempo = date('H:i:s', strtotime("$inicio_tiempo + 30 minutes") );
		}
			
		 
		$this->load->view('agenda/agenda_semanal', $var);
	}
	
	public function cargar_dia(){	
		
		$var['dia'] =  $this->input->get('dia');		
		$this->load->model('modelo_agenda');
		$var['info'] = $this->modelo_agenda->traer_bloques();	
		$this->load->view('agenda/agenda_diaria', $var);
	}
	public function agendar_causa(){	
		
		$rut =  $this->input->get('rut');
		$fecha =  $this->input->get('fecha');
		$id_asunto =  $this->input->get('id_asunto');
		$hora_inicio =  $this->input->get('hora_inicio');
		$tipo_asunto =  $this->input->get('tipo_asunto');
		
		$this->load->model('modelo_agenda');
		$this->modelo_agenda->ingresar_asignacion($rut, $fecha, $id_asunto, $hora_inicio, $tipo_asunto);
		
		
	}
	
	
	public function nueva_agendacion(){		
		$dia_texto = "";
		$this->load->model('modelo_busquedas');		
		$this->load->model('modelo_agenda');
		$this->load->model('modelo_ingresos');			
		$var["profesor_a_cargar"]= $this->input->get('profesor_a_cargar');
		$dia = $this->input->get('dia');	
		$hora =  $this->input->get('hora');
		$tipo_agendacion = $this->input->get('tipo_agendacion');
		$var['dia'] =  $this->input->get('dia');	
		$var['hora'] =  $this->input->get('hora');
		$var['info'] = $this->modelo_ingresos->trae_profesores();
		
		if($tipo_agendacion == 'C'){
			$var['alumnos'] = $this->modelo_ingresos->trae_alumnos();
			$var['materia'] = $this->modelo_ingresos->trae_materia();
			$this->load->view('causa/ingreso_causa', $var);
		}
		else if($tipo_agendacion == 'Au'){
			$var['tipo'] = $tipo_agendacion;
			$var['causa'] = $this->input->get('causa');
			$this->load->view('agenda/ingresar_asunto', $var);
		}
		else{
			$var['tipo'] = $tipo_agendacion;
			$this->load->view('agenda/ingresar_asunto', $var);
		}
		
	}
	
	public function eliminar_agendacion(){	
		$id_agendacion = $this->input->get('id_agendacion');	
		$motivo =  $this->input->get('motivo');
		$quien_elimina =  $this->input->get('quien_elimina');
			
		$this->load->model('modelo_agenda');
		$this->modelo_agenda->eliminar_agendacion($id_agendacion,$motivo,$quien_elimina);	
		echo "ok";
	}

		
	
	
	
}
