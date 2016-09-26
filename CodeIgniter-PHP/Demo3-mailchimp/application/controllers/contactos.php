<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contactos_model','contacto');
		$this->load->library('pagination');
			
	}
	

	public function index()
	{
		$this->load->view('contactos/agr_cont');
	}

	public function nuevo()
	{
		$this->load->view('contactos/agr_cont');
	}
	public function agregar()
	{

			$this->contacto->agregar();
			$data['contacto']    =  $this->contacto->get_listado();
			$this->load->view("contactos/list_cont",$data);
		
		
	}
	public function listado()
	{
		$config['base_url']   = base_url().'contactos/list_cont';
		$config['total_rows'] = $this->contacto->get_total() ;  
		$config['per_page']   = 10;  //Numero de registros mostrados por páginas
		$config['num_links']  = 5;  //Numero de links mostrados en la paginación
		$config['uri_segment']= 4;  //Numero de links mostrados en la paginación
		$config['first_link'] = 'Primero'; //Texto del enlace que nos lleva a la página
        $config['last_link']  = 'Ultimo'; //Texto del enlace que nos lleva a la última página
        $config['prev_link']  = '« Anterior'; //Texto del enlace que nos lleva a la página
        $config['next_link']  = 'Siguiente »'; //Texto del enlace que nos lleva a la última página
       
		$this->pagination->initialize($config); 

		$data['contacto']    =  $this->contacto->get_listado($config['per_page'], $this->uri->segment(4));
		$this->load->view('contactos/list_cont',$data);
	}
	public function editar($id=0)
	{

		$data['contacto'] = $this->contacto->get_listado_id($id);
		$this->load->view('contactos/edt_cont', $data);
	}
	public function update()
	{

			$this->contacto->update();
			redirect("../contactos/listado");
		
		
	}

	public function eliminar($id=0)
	{

		$this->contacto->eliminar($id);
	    redirect("../contactos/listado");
	}


}











