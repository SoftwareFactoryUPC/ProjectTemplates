<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracion extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();	
		
		
		$this->load->model('panel/modulo_model','modulo');
		$this->load->model('panel/configuracion_model','configuracion');
	
		$this->load->library('pagination');

		$this->output->set_title();
		
	}
	
	
	public function listado()
	{	
		
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

			$data['modulos']       =  $this->modulo->get_modulos();
			$data['configuracion'] =  $this->configuracion->get_listado();

			$this->template->display('panel/configuracion/listado', $data);
		}
	}
	

	public function nuevo(){
		
		$data['modulos'] =  $this->modulo->get_modulos();

		$this->template->display('panel/configuracion/nuevo',$data);
		
	}


	public function agregar()
	{

		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

			$this->form_validation->set_rules('contitulo', 'titulo', 'required');
			$this->form_validation->set_rules('convalor', 'valor', 'required');
					
			if(!$this->form_validation->run())
			{
				$this->nuevo();

			}else{

				$this->configuracion->agregar();
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido guardado.</div>');
				redirect("panel/configuracion/listado");
			}
		}
	}

	
	public function editar($id=0)
	{

		$data['modulos']       = $this->modulo->get_modulos();
		$data['configuracion'] = $this->configuracion->get_listado_id($id);

		$this->template->display('panel/configuracion/editar', $data);
	}

	public function update()
	{

		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

			$this->form_validation->set_rules('contitulo', 'titulo', 'required');
			$this->form_validation->set_rules('convalor', 'valor', 'required');
		
			if(!$this->form_validation->run())
			{
				$this->editar($this->input->post('id'));

			}else{

				$this->configuracion->update();
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido actualizado.</div>');
				redirect("panel/configuracion/listado");
			}
		}
	}

	public function eliminar($id=0)
	{
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

			$this->configuracion->eliminar($id);
		    $this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido eliminado.</div>');
		    redirect("panel/configuracion/listado");
		}
	}

	
}
?>