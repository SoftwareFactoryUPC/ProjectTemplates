<?php
class Usuario_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

	public function get_total()
	{
		$query = $this->db->query("SELECT * FROM  usuario u");
		return $query->num_rows();								
	}
	
	public function get_listado()
	{

		$query = $this->db->query("SELECT  u.id_usuario, CONCAT_WS(' ',u.usunombres,u.usuapepaterno,u.usuapematerno) AS usuario, u.usuemail, u.usunick 
								   FROM  usuario u
								   WHERE u.id_usuario > 0
								   ORDER BY u.id_usuario DESC", array());

		return $query->result_array();						
	}

	public function get_listado_id($id=0)
	{

		$query = $this->db->query("SELECT  u.id_usuario, u.usunombres,u.usuapepaterno,u.usuapematerno, u.usuemail, u.usunick, g.id_grupo 
								   FROM  usuario u
								   INNER JOIN usuario_grupo ug ON ug.usuario_id_usuario = u.id_usuario
								   INNER JOIN grupo g ON g.id_grupo = ug.grupo_id_grupo
								   WHERE u.id_usuario = ?
								   ORDER BY u.id_usuario ASC", array($id));

		return $query->result_array();	
	
	}


	public function Agregar()
	{

		$this->db->trans_start();

		$array = array(
			"usunombres"    => ucwords(strtolower($this->input->post('usunombres'))),
			"usuapepaterno" => ucwords(strtolower($this->input->post('usuapepaterno'))),
			"usuapematerno" => ucwords(strtolower($this->input->post('usuapematerno'))),
			"usuemail"      => $this->input->post('usuemail'),
			"usunick"       => $this->input->post('usunick'),
			"usuclave"      => md5($this->input->post('usuclave')),
			"usuestado"     => 1
		);
		
		$this->db->insert("usuario",$array);

		$id_usuario	  = $this->db->insert_id();

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
            
            $result = array("estado"=>1);
    
        }else{
        	
        	$result = array("estado" => 0, "datos" => '');

        }

        return $result;
				
	}



	public function Actualizar()
	{

	
		$this->db->trans_start();

		$array = array(	
			"usunombres"    => ucwords(strtolower($this->input->post('usunombres'))),
			"usuapepaterno" => ucwords(strtolower($this->input->post('usuapepaterno'))),
			"usuapematerno" => ucwords(strtolower($this->input->post('usuapematerno'))),
			"usuemail"      => $this->input->post('usuemail'),
			"usunick"       => $this->input->post('usunick')
		);
		
		$this->db->where('id_usuario', $this->input->post('id'));
		$this->db->update("usuario",$array);


		
		if(isset($_POST['usuclave']) && $_POST['usuclave']!='')
		{

			$array_3 = array(	
				"usuclave"       => md5($this->input->post('usuclave'))
			);
		
			$this->db->where('id_usuario', $_POST['id']);
			$this->db->update("usuario",$array_3);

		}


		$this->db->trans_complete();

				
	}
	
}
?>