<?php
class Solucion_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}
	
	public function get_listado_solucion()
	{

		$query = $this->db->query("SELECT s.id_solucion, s.no_solucion, s.tx_solucion_breve, s.tx_solucion, s.im_solucion
								   FROM  solucion s
								   ORDER BY s.id_solucion ASC LIMIT 0,3", array());

		return $query->result_array();						
	}

	public function get_listado_producto()
	{

		$query = $this->db->query("SELECT p.id_producto, p.no_producto, p.tx_producto_breve, p.tx_producto, p.im_producto
								   FROM  producto p
								   ORDER BY p.id_producto ASC LIMIT 0,10", array());

		return $query->result_array();						
	}

	public function get_listado_servicio()
	{

		$query = $this->db->query("SELECT s.id_servicio, s.no_servicio, s.tx_servicio_breve, s.tx_servicio, s.im_servicio
								   FROM  servicio s
								   ORDER BY s.id_servicio ASC LIMIT 0,3", array());

		return $query->result_array();						
	}

	public function get_listado_empresa()
	{

		$query = $this->db->query("SELECT e.id_empresa, e.no_empresa, e.tx_empresa, e.im_empresa
								   FROM  empresa e
								   ORDER BY e.id_empresa ASC LIMIT 0,3", array());

		return $query->result_array();						
	}

	public function get_listado_solucion_id()
	{

		$query = $this->db->query("SELECT s.id_solucion, s.no_solucion, s.tx_solucion, s.im_solucion  
								   FROM  solucion s
								   WHERE s.id_solucion = ?
								   ORDER BY s.id_solucion DESC LIMIT 0,1", array($this->input->post('id')));
		
		return $query->row(); //Retorna una sola fila fila en objeto		
	
	}
	public function get_listado_servicio_id()
	{

		$query = $this->db->query("SELECT s.id_servicio, s.no_servicio, s.tx_servicio, s.im_servicio
								   FROM  servicio s
								   WHERE s.id_servicio = ?
								   ORDER BY s.id_servicio ASC LIMIT 0,1", array($this->input->post('id')));

		return $query->row(); //Retorna una sola fila fila en objeto					
	}
	
}
?>