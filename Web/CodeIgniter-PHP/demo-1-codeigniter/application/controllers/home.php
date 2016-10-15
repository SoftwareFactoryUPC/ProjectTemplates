<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->model('solucion_model','solucion');

		$this->output->set_title();
		$this->load->helper('text');
	}

	public function index()
	{
		$data['solucion'] =  $this->solucion->get_listado_solucion();
		$data['servicio'] =  $this->solucion->get_listado_servicio();
		$data['empresa']  =  $this->solucion->get_listado_empresa();

		$this->load->view('home', $data);
	}

	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */