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

	
		$data['tproductos'] =$this->producto->get_total_productos();
		$this->load->view('welcome_message',$data);
	}

}
