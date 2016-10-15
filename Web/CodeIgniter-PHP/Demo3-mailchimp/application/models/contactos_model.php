<?php
class Contactos_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

		public function get_total()
	{
		$query = $this->db->query("SELECT id_contacto,no_contacto, cor_contacto FROM contacto");
		return $query->num_rows();								
	}

	public function get_listado()
	{

		$query = $this->db->query("SELECT id_contacto,no_contacto, cor_contacto FROM contacto", array());

		return $query->result_array();						
	}

	public function get_listado_id($id=0)
	{

		$query = $this->db->query("SELECT c.id_contacto,c.no_contacto, c.cor_contacto FROM contacto c
								   WHERE c.id_contacto = ? LIMIT 0,1", array($id));
		
		return $query->row(); //Retorna una sola fila fila en objeto		
	
	}
	

	public function agregar()
	{

		$this->db->trans_start();

		$array = array(
			"no_contacto" => $this->input->post('nombre'),
			"cor_contacto" => $this->input->post('email')
		);

		$this->db->insert("contacto",$array);

		$this->db->trans_complete();

	}


	public function update()
	{

		$this->db->trans_start();

		$array = array(
			"no_contacto" => $this->input->post('nombre'),
			"cor_contacto" => $this->input->post('email')
		);


		$this->db->where('id_contacto', $this->input->post('id'));
		$this->db->update("contacto",$array);

		$this->db->trans_complete();

	}

	public function eliminar($id=0)
	{

		$this->db->trans_start();

		$this->db->where('id_contacto', $id);
		$this->db->delete("contacto");

		$this->db->trans_complete();

	}

	
}
?>