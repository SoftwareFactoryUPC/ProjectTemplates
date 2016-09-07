<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->model('panel/modulo_model','modulo');

		$this->output->set_title();
		
	}
	
	function index()
	{	
		$auth = new Auth();

		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$data['modulos']  =  $this->modulo->get_modulos();
			$data['iconos']   =  $this->modulo->getIconosSecciones();

			$this->template->display('panel/privado', $data);
		
		}
	}
	
	function acceso()
	{
		
		if(isset($_POST['usuario']) && $_POST['usuario'] != "" && isset($_POST['password']) && $_POST['password'] != ""){

			$auth = new Auth(FALSE);

			if($auth->login($_POST['usuario'], md5($_POST['password']))){

				redirect("panel");

			}else{

				$this->session->set_flashdata('message', '<div class="message error"><span class="strong">ERROR!</span> El usuario o contraseña son inválidas.</div>');

				redirect("panel");
			}


		}else{
			
			$this->session->set_flashdata('message', '<div class="message error"><span class="strong">ERROR!</span> Ingrese usuario y/o contraseña.</div>');
		
			redirect("panel");
			
		}
	
	}


	function cerrar_sesion()
	{
		$auth = new Auth(FALSE);
		$auth->logout();
		redirect("panel");
	}

	
}
?>