<?php
class Servicio_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

	public function get_total()
	{
		$query = $this->db->query("SELECT * FROM  servicio s");
		return $query->num_rows();								
	}
	
	public function get_listado()
	{

		$query = $this->db->query("SELECT s.id_servicio, s.no_servicio 
								   FROM  servicio s
								   ORDER BY s.id_servicio DESC", array());

		return $query->result_array();						
	}

	public function get_listado_id($id=0)
	{

		$query = $this->db->query("SELECT s.id_servicio, s.no_servicio, s.tx_servicio_breve, s.tx_servicio, s.im_servicio  
								   FROM  servicio s
								   WHERE s.id_servicio = ?
								   ORDER BY s.id_servicio DESC LIMIT 0,1", array($id));
		
		return $query->row(); //Retorna una sola fila fila en objeto		
	
	}
	

	public function agregar($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_servicio" => $this->input->post('no_servicio'),
			"tx_servicio_breve" => $this->input->post('tx_servicio_breve'),
			"tx_servicio" => $this->input->post('tx_servicio'),
			"im_servicio" => $archivo
		);

		$this->db->insert("servicio",$array);

		$this->db->trans_complete();

	}


	public function update($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_servicio" => $this->input->post('no_servicio'),
			"tx_servicio_breve" => $this->input->post('tx_servicio_breve'),
			"tx_servicio" => $this->input->post('tx_servicio')
		);

		if($archivo!=''){
			$array = array_merge($array, array("im_servicio" => $archivo));
		}

		$this->db->where('id_servicio', $this->input->post('id'));
		$this->db->update("servicio",$array);

		$this->db->trans_complete();

	}

	public function eliminar($id=0)
	{

		$this->db->trans_start();

		$this->db->where('id_servicio', $id);
		$this->db->delete("servicio");

		$this->db->trans_complete();

	}

	
}
?>