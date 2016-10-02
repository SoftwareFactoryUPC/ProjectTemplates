<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('productos_model','producto');
			
	}
	
	
	public function index()
	{

	
		$data['tproductos'] = $this->producto->get_total_arco();
		$data['tbarras'] = $this->producto->get_total_barras();

		$data['tdona1'] = $this->producto->get_total_dona1();
		$data['tdona2'] = $this->producto->get_total_dona2();
		$data['tpie'] = $this->producto->get_total_pie();

		$data['tpiedatos'] = $this->producto->get_total_piedatos();
		$data['tbarras1'] = $this->producto->get_total_barras_1();
		$data['tbarras2'] = $this->producto->get_total_barras_2();
		$data['tpiramide'] = $this->producto->get_total_piramide();
		$this->load->view('welcome_message',$data);
	}

}
