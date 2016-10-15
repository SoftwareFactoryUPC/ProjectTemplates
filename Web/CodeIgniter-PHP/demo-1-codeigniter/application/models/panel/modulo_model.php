<?php
class Modulo_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
			
	}

	public function get_total()
	{
		$query = $this->db->query("SELECT * FROM  modulos m");
		return $query->num_rows();								
	}
	
	
	
	public function get_modulos_lista($limit='', $offset='')
	{

		$OFFSET = ($offset=='')? 0  : $offset;
		$LIMIT  = ($limit =='')? '' : 'LIMIT '.$limit.' OFFSET '.$OFFSET;

		$query = $this->db->query("SELECT m.id_modulo, m.nombre_modulo  
								   FROM  modulos m 
								   ORDER BY m.id_modulo ASC ".$LIMIT." ");

		return $query->result_array();						
	}

	public function get_modulos()
	{

		$query = $this->db->query("SELECT DISTINCT(m.id_modulo), m.modnombre  
								   FROM  modulo m 
								   INNER JOIN seccion s ON s.modulo_id_modulo = m.id_modulo
								   ORDER BY m.modorden ASC");

		$modulos = $query->result_array();

		$datos = array();
		
		foreach ($modulos as $mod) {
	
			$query_2 = $this->db->query("SELECT s.id_seccion, s.secnombre, s.securl  
								   	     FROM  seccion s 
								   	     WHERE s.modulo_id_modulo = ? 
								   	     ORDER BY s.secorden ASC", array($mod['id_modulo']));

			$datos[] = array('modulos'=>$mod, 'secciones'=>$query_2->result_array());

		}

		return $datos;

	}
	
	
	public function getIconosSecciones()
	{
		
		

		$query = $this->db->query("SELECT s.id_seccion, s.secnombre, s.securl, s.secclase, s.sectabla FROM  seccion s 	   
								    ORDER BY s.modulo_id_modulo ASC, s.id_seccion ASC");

		$secciones = $query->result_array();

		$datos = array();

		foreach ($secciones as $sec) {
		
			if($sec['sectabla']!=''){

				$tabla = $sec['sectabla'];
				$campo = 'id_'.$tabla;
				
				$query_2 = $this->db->query("SELECT $campo FROM  $tabla ");

				$datos[] = array('secciones'=>$sec, 'total'=>$query_2->num_rows());

			}else{

				$datos[] = array('secciones'=>$sec, 'total'=>'--');

			}
		}

		return $datos;

	}

	public function get_modulo_secciones()
	{

		$query = $this->db->query("SELECT DISTINCT(m.id_modulo), m.modnombre  
								   FROM  modulo m 
								   INNER JOIN seccion s ON s.modulo_id_modulo = m.id_modulo
								   ORDER BY m.modorden ASC");

		$modulos = $query->result_array();	
		
		foreach ($modulos as $mod) {
	
			$query_2 = $this->db->query("SELECT s.id_seccion, s.secnombre, s.securl  
								   	     FROM  seccion s 
								   	     WHERE s.modulo_id_modulo = ?
								   	     ORDER BY s.secorden ASC", array($mod['id_modulo']));

			$ds[] = array('modulos'=>$mod, 'secciones'=>$query_2->result_array());

		}

		return $ds;

	}

	public function get_modulos_id($id = 0)
	{

		$query = $this->db->query("SELECT m.id_modulo, m.nombre_modulo  
								   FROM  modulos m 
								   WHERE m.id_modulo = ".$id."
								   ORDER BY m.id_modulo ASC");

		return $query->result_array();						
	}
	
	

	public function add()
	
	{
		
		$array = array(
			"nombre_modulo"  => ucwords(strtolower($_POST['nombre_modulo']))
		);
		
		$this->db->insert("modulos",$array);		
	}


	public function update()
	
	{
		

		$array = array(
			"nombre_modulo"  => ucwords(strtolower($_POST['nombre_modulo']))
		);
		
		$this->db->where('id_modulo', $_POST['id']);			
		$this->db->update("modulos",$array);

	}
	
	
	public function delete_modulos($id)
	{	
			$this->db->where('id_modulo', $id);
			$this->db->delete("modulos");
			
		    $this->db->where('id_modulo', $id);
		    $this->db->delete("secciones");	
	}
}
?>