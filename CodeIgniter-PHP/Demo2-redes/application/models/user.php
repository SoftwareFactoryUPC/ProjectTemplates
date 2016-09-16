<?php
class User extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}
	
	public function Agregar($nick='',$email='',$nombre='',$token='',$apellido='',$foto='')
	{
		$query = $this->db->query("SELECT u.email, u.firstName,u.identifier, u.lastName, u.photoURL, u.displayName
			FROM  user u
			WHERE u.identifier = ?", array($token));

			

			if(!$query->result_array())
			{
				$this->db->trans_start();

				$array = array(
					"displayName"    => $nick,
					"email" => $email,
					"firstName" => $nombre,
					"identifier"      =>$token,
					"lastName"       =>$apellido,
					"photoURL"      => $foto
				);
				
				$this->db->insert("user",$array);

				$id_usuario	  = $this->db->insert_id();

				$this->db->trans_complete();
				return 0;
			}
			else
			{
				return $query->result_array();
			}

	}
	public function get_listado_user($id=0)
	{

		$query = $this->db->query("SELECT  u.id_user, u.email, u.firstName,u.identifier, u.lastName, u.photoURL, u.displayName
			FROM  user u
			WHERE u.identifier = ?", array($id));

		return $query->result_array();	
	
	}

	public function Editar()
	{


		$array = array(
			"displayName"    => $this->input->post('displayName'),
			"email" => $this->input->post('email'),
			"firstName" => $this->input->post('firstName'),
			"lastName"       =>$this->input->post('lastName')
		);
		
		$this->db->where('identifier', $this->input->post('identifier'));			
		$this->db->update("user",$array);
				
	}

	
}
?>