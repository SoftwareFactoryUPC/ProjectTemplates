<?php
class Empresa_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

	public function get_total()
	{
		$query = $this->db->query("SELECT * FROM  empresa e");
		return $query->num_rows();								
	}
	
	public function get_listado()
	{

		$query = $this->db->query("SELECT e.id_empresa, e.no_empresa
								   FROM  empresa e
								   ORDER BY e.id_empresa DESC", array());

		return $query->result_array();						
	}

	public function get_listado_id($id=0)
	{

		$query = $this->db->query("SELECT e.id_empresa, e.no_empresa, e.tx_empresa, e.im_empresa  
								   FROM  empresa e
								   WHERE e.id_empresa = ?
								   ORDER BY e.id_empresa DESC LIMIT 0,1", array($id));
		
		return $query->row(); //Retorna una sola fila fila en objeto		
	
	}
	

	public function agregar($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_empresa" => $this->input->post('no_empresa'),
			"tx_empresa" => $this->input->post('tx_empresa'),
			"im_empresa" => $archivo
		);

		$this->db->insert("empresa",$array);

		$this->db->trans_complete();

	}


	public function update($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_empresa" => $this->input->post('no_empresa'),
			"tx_empresa" => $this->input->post('tx_empresa')
		);

		if($archivo!=''){
			$array = array_merge($array, array("im_empresa" => $archivo));
		}

		$this->db->where('id_empresa', $this->input->post('id'));
		$this->db->update("empresa",$array);

		$this->db->trans_complete();

	}

	public function eliminar($id=0)
	{

		$this->db->trans_start();

		$this->db->where('id_empresa', $id);
		$this->db->delete("empresa");

		$this->db->trans_complete();

	}

	
}
?>