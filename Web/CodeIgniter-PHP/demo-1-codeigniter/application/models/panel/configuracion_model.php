<?php
class Configuracion_model extends CI_Model
{
	
	// Constructor
	public function __construct()
	{
		parent::__construct();

	}

	public function get_total()
	{
		$query = $this->db->query("SELECT  c.id_configuracion FROM  configuracion c");
		return $query->num_rows();								
	}
	
	
	public function get_listado()
	{
		
		$query = $this->db->query("SELECT c.id_configuracion, c.contitulo, c.convalor
								   FROM configuracion c
					 			   ORDER BY 1 ASC", array());

		return $query->result_array();						
	}
	
	
	
	public function get_listado_id($id = 0)
	{
		$query = $this->db->query("SELECT c.id_configuracion, c.contitulo, c.convalor
								   FROM configuracion c
								   WHERE c.id_configuracion = ?
								   ORDER BY 1 ASC LIMIT 0,1", array($id));
		
		return $query->row(); //Retorna una sola fila fila en objeto								
	}


	public function agregar()
	{

		$this->db->trans_start();

		$array = array(
			"contitulo" => strtoupper($this->input->post('contitulo')),
			"convalor"  => $this->input->post('convalor')
		);

		$this->db->insert("configuracion",$array);

		$this->db->trans_complete();

	}


	public function update()
	{

		$this->db->trans_start();

		$array = array(
			"convalor"  => $this->input->post('convalor')
		);

		$this->db->where('id_configuracion', $this->input->post('id'));
		$this->db->update("configuracion",$array);

		$this->db->trans_complete();

	}

	
}
?>