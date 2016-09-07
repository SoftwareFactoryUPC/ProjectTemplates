<?php 
if(!defined('BASEPATH')) 
	exit('No direct script access allowed');
	
class Auth
{
	
	var $_id_usuario  = 0;
	var $_usuario     = "";
	var $_nick        = "";
	var $_clave       = "";
	var $_auth        = FALSE;

	function Auth($auto = TRUE)
	{
		if($auto)
		{
			$CI =& get_instance();
			
			if($this->login($CI->session->userdata('nick'), $CI->session->userdata('clave')))
			{
				
				$this->_id_usuario = $CI->session->userdata('id_usuario');
				$this->_usuario    = $CI->session->userdata('usuario');
				$this->_nick       = $CI->session->userdata('nick');
				$this->_clave      = $CI->session->userdata('clave');
								
			}
		}
	}

	function __get($field)
	{
		return $this->$field;
	}


	function login($usuario = "", $password = "")
	{
		
		if(empty($usuario)||empty($password))
			return FALSE;
		
		$CI =& get_instance();		
			
		$query = $CI->db->query("SELECT u.id_usuario, u.usunombres, u.usuapepaterno, u.usuapematerno FROM usuario u WHERE u.usunick = ? AND u.usuclave = ? AND u.usuestado = 1", array($usuario, $password,1));
		

		if($query->num_rows()==1){	
			
			$row = $query->row();
			
			$CI->session->set_userdata('id_usuario', $row->id_usuario);
			$this->_id_usuario = $row->id_usuario;

			$CI->session->set_userdata('usuario', $row->usunombres." ".$row->usuapepaterno." ".$row->usuapematerno);				
			$this->_usuario = $row->usunombres." ".$row->usuapepaterno." ".$row->usuapematerno;

			$CI->session->set_userdata('nick', $usuario);
			$this->_nick = $usuario;

			$CI->session->set_userdata('clave', $password);
			$this->_clave = $password;
			
			
			$this->_auth = TRUE;

			$query->next_result();
       		$query->free_result();
			
			
			$this->_auth = TRUE;
			
			return TRUE;

		}else{

			$this->_auth = FALSE;
			//$this->logout();

			$query->next_result();
       		$query->free_result();
			
			return FALSE;
		}

	}

	function logout()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
		$this->_auth = FALSE;			
	}

	function check($estricto = TRUE)
	{
		
		if(!$this->_auth)
			return FALSE;

			return true;
	}				


}
?>