<?php 
	
	
	
	class modelo_privilegios extends CI_Model {

		public function login($usuario,$clave){			
			$query = $this->db->query("SELECT rut FROM usuarios WHERE rut='$usuario' and pwd='$clave'");		
			
			if ($query->num_rows() > 0)
				{
					$_SESSION['login_user']=$usuario;	
					return "OK";
				}
				else 
				{
					return "NO";
				}
		}
		
		public function traer_privilegios(){
			$user=$_SESSION['login_user'];
			$query = $this->db->query("SELECT tipo_privilegio, privilegio FROM privilegios WHERE rut = '$user';");		
			return $query;
		}
		
		public function nombre_usuario(){	
			$user=$_SESSION['login_user'];
			$query = $this->db->query("SELECT nombre FROM usuarios WHERE rut = '$user';");	

			if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$nombre = $row->nombre;
					}
				}			
			return $nombre;
		}
		
		public function sede_usuario(){	
			$user=$_SESSION['login_user'];
			$query = $this->db->query("select nombre_sede from sedes where id_sede = (select sede from usuarios where rut = '$user');");	

			if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$sede = $row->nombre_sede;
					}
				}			
			return $sede;
		}
		
		public function tipo_usuario(){	
			$user=$_SESSION['login_user'];
			$query = $this->db->query("select tipo_usuario FROM usuarios WHERE rut = '$user';");
			if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$tipo = $row->tipo_usuario;
					}
				}			
			return $tipo;
		}
		
		
		public function cantidad_sedes(){	
			$user=$_SESSION['login_user'];
			$query = $this->db->query("select COUNT(rut) as cantidad FROM usuario_sede WHERE rut = '$user';");
			if ($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$cantidad = $row->cantidad;
					}
				}			
			return $cantidad;
		}
		
		
		
	}
?>