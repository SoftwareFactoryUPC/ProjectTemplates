<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('panel/modulo_model','modulo');
		$this->load->model('panel/usuario_model','usuario');
	
		$this->load->library('pagination');

		$this->output->set_title();
		
	}
	
	
	public function listado()
	{	
		$auth = new Auth();
		
	
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$data['modulos']  = $this->modulo->get_modulos();
			$data['usuario']  = $this->usuario->get_listado();

			$this->template->display('panel/usuario/listado',$data);
		}

	}
	
	
	public function nuevo()
	{
		
		$data['modulos'] =  $this->modulo->get_modulos();
		$this->template->display('panel/usuario/nuevo',$data);
		
	}

	
	function editar($id=0){
		
		$auth = new Auth();

		
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$data['usuario']	 =  $this->usuario->get_listado_id($id);
			$data['modulos']     =  $this->modulo->get_modulos();

			$this->template->display('panel/usuario/editar',$data);
		
		}
	}
	
	function agregar()
	{	
		
		
		$auth = new Auth();

		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

			$this->form_validation->set_rules('usunombres', 'Ingrese el nombre del usuario', 'required');
			$this->form_validation->set_error_delimiters('', '<br />');
					
			if(!$this->form_validation->run())
			{
				$this->nuevo();
				
			}else{
				
				$this->usuario->Agregar();
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido guardado.</div>');
				
				redirect("panel/usuario/listado");
			}
		}
	}
	
	function actualizar()
	{							
		
		$auth = new Auth();

		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$this->form_validation->set_rules('usunombres', 'Ingrese el nombre del usuario', 'required');
			$this->form_validation->set_error_delimiters('', '<br />');
					
			if(!$this->form_validation->run())
			{
				$this->editar($_POST['id']);
				
			}else{
				
			
				$this->usuario->Actualizar();
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido actualizado.</div>');
				
				redirect("panel/usuario/listado");
			}
		}
	}


	function eliminar($id)
	{	
		
		$auth = new Auth();

		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$this->usuario->Eliminar($id);
			$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido  eliminado.</div>');
			redirect("panel/usuario/listado");
		}
	}

	
	
}
?>