<?php
class Solucion_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

	public function get_total()
	{
		$query = $this->db->query("SELECT * FROM  solucion s");
		return $query->num_rows();								
	}
	
	public function get_listado()
	{

		$query = $this->db->query("SELECT s.id_solucion, s.no_solucion  
								   FROM  solucion s
								   ORDER BY s.id_solucion DESC", array());

		return $query->result_array();						
	}

	public function get_listado_id($id=0)
	{

		$query = $this->db->query("SELECT s.id_solucion, s.no_solucion, s.tx_solucion_breve, s.tx_solucion, s.im_solucion  
								   FROM  solucion s
								   WHERE s.id_solucion = ?
								   ORDER BY s.id_solucion DESC LIMIT 0,1", array($id));
		
		return $query->row(); //Retorna una sola fila fila en objeto		
	
	}
	

	public function agregar($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_solucion" => $this->input->post('no_solucion'),
			"tx_solucion_breve" => $this->input->post('tx_solucion_breve'),
			"tx_solucion" => $this->input->post('tx_solucion'),
			"im_solucion" => $archivo
		);

		$this->db->insert("solucion",$array);

		$this->db->trans_complete();

	}


	public function update($archivo='')
	{

		$this->db->trans_start();

		$array = array(
			"no_solucion" => $this->input->post('no_solucion'),
			"tx_solucion_breve" => $this->input->post('tx_solucion_breve'),
			"tx_solucion" => $this->input->post('tx_solucion')
		);

		if($archivo!=''){
			$array = array_merge($array, array("im_solucion" => $archivo));
		}

		$this->db->where('id_solucion', $this->input->post('id'));
		$this->db->update("solucion",$array);

		$this->db->trans_complete();

	}

	public function eliminar($id=0)
	{

		$this->db->trans_start();

		$this->db->where('id_solucion', $id);
		$this->db->delete("solucion");

		$this->db->trans_complete();

	}

	
}
?>