﻿<?php



	class modelo_privilegios extends CI_Model {

		public function login($usuario, $clave) {
			if (is_numeric($usuario)) {
				$query = $this->db->query("SELECT pwd, rut, nombre, tipo_usuario FROM usuarios WHERE rut='$usuario'");
			} else {
				$query = $this->db->query("SELECT pwd, rut, nombre, tipo_usuario FROM usuarios WHERE nombre_usuario='$usuario'");
			}

			$primera_fila = $query->row();
			$clave_hash = $primera_fila->pwd;

			// Para claves Encriptadas BCRYPT.
			if(substr($clave_hash, 0, 3) === "$2a" || substr($clave_hash, 0, 3) === "$2y") {
				// Verify stored hash against plain-text password
				if (password_verify($clave, $clave_hash)) {
				    // Check if a newer hashing algorithm is available
				    // or the cost has changed
				    if (password_needs_rehash($clave_hash, PASSWORD_BCRYPT, ["cost" => 8])) {
				        // If so, create a new hash, and replace the old one
						  //TODO. implementar opciones de hash globales. e insertar nuevo hash en BD.
				        $newHash = password_hash($clave, PASSWORD_BCRYPT, ["cost" => 8]);
				    }

					 $_SESSION['login_user']=$usuario;
					 $_SESSION['rut_user']=$primera_fila->rut;
					 $_SESSION['nombre_completo_user']=$primera_fila->nombre;
					 $_SESSION['tipo_usuario_user']=$primera_fila->tipo_usuario;
					 return "OK";
				}
				else {
					return "NO";
				}
			}
			// Para claves No Encriptadas.
			elseif ($clave === $clave_hash) {
				$_SESSION['login_user']=$usuario;
				$_SESSION['rut_user']=$primera_fila->rut;
				$_SESSION['nombre_completo_user']=$primera_fila->nombre;
				$_SESSION['tipo_usuario_user']=$primera_fila->tipo_usuario;
			 	return "OK";
			}
			else {
  				 return "NO";
			}
		}

		public function traer_privilegios(){
			$rut_user=$_SESSION['rut_user'];
			$query = $this->db->query("SELECT tipo_privilegio, privilegio FROM privilegios WHERE rut = '$rut_user';");
			return $query;
		}

		public function nombre_usuario(){
			// $rut_user=$_SESSION['rut_user'];
			// $query = $this->db->query("SELECT nombre FROM usuarios WHERE rut = '$rut_user';");
			//
			// if ($query->num_rows() > 0)
			// 	{
			// 		foreach ($query->result() as $row)
			// 		{
			// 			$nombre = $row->nombre;
			// 		}
			// 	}
			// return $nombre;
			return $_SESSION['nombre_completo_user'];
		}

		public function sede_usuario(){
			$rut_user=$_SESSION['rut_user'];
			$query = $this->db->query("select nombre_sede from sedes where id_sede = (select sede from usuarios where rut = '$rut_user');");

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
			// $rut_user=$_SESSION['rut_user'];
			// $query = $this->db->query("select tipo_usuario FROM usuarios WHERE rut = '$rut_user';");
			// if ($query->num_rows() > 0)
			// 	{
			// 		foreach ($query->result() as $row)
			// 		{
			// 			$tipo = $row->tipo_usuario;
			// 		}
			// 	}
			// return $tipo;
			return $_SESSION['tipo_usuario_user'];
		}


		public function cantidad_sedes(){
			$rut_user=$_SESSION['rut_user'];
			$query = $this->db->query("select COUNT(rut) as cantidad FROM usuario_sede WHERE rut = '$rut_user';");
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
