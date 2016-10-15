<?php
class Productos_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

		public function get_total_arco()
	{
		$query = $this->db->query("SELECT c.no_categoria, count(p.id_subcategoria) as total FROM subcategoria p inner join categoria c ON c.id_categoria=p.id_categoria group by no_categoria");
		return $query->result_array();								
	}

	public function get_total_barras()
	{

		$query = $this->db->query("SELECT p.no_subcategoria, c.cantidad,p.id_subcategoria FROM subcategoria p inner join producto c ON c.id_subcategoria=p.id_subcategoria group by p.no_subcategoria limit 2");

		return $query->result_array();						
	}
	public function get_total_barras_1()
	{

		$query = $this->db->query(" SELECT p.no_producto, p.cantidad FROM producto p where p.id_subcategoria=25 ");

		return $query->result_array();						
	}
	public function get_total_barras_2()
	{

		$query = $this->db->query("SELECT p.no_producto, p.cantidad FROM producto p where p.id_subcategoria=24 ");

		return $query->result_array();						
	}

	public function get_total_piramide()
	{

		$query = $this->db->query("SELECT p.no_subcategoria, c.cantidad FROM subcategoria p inner join producto c ON c.id_subcategoria=p.id_subcategoria group by p.no_subcategoria limit 6");
		
		return $query->result_array();		
	
	}
	public function get_total_dona1()
	{

		$query = $this->db->query("SELECT p.no_categoria, count(s.id_subcategoria) as total FROM categoria p 
								   inner join subcategoria s ON s.id_categoria=p.id_categoria group by p.no_categoria");
		
		return $query->result_array();		
	
	}
	public function get_total_dona2()
	{

		$query = $this->db->query("SELECT p.no_categoria, count(c.no_subcategoria) as total FROM categoria p inner join subcategoria c ON c.id_categoria=p.id_categoria group by p.no_categoria limit 3");
		
		return $query->result_array();		
	}

	public function get_total_pie()
	{

		$query = $this->db->query("SELECT p.no_categoria, sum(c.cantidad) as total, p.id_categoria FROM categoria p 
									inner join subcategoria s ON s.id_categoria=p.id_categoria
									inner join producto c ON c.id_subcategoria=s.id_subcategoria group by p.no_categoria");
											
		return $query->result_array();		
	}
	public function get_total_piedatos()
	{

		$query = $this->db->query("SELECT p.no_subcategoria, sum(c.cantidad) as total , p.id_categoria FROM subcategoria p 
									inner join producto c ON c.id_subcategoria=p.id_subcategoria group by p.no_subcategoria");
											
		return $query->result_array();		
	}

	

	
}
?>