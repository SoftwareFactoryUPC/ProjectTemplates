<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio extends CI_Controller {

	var $_IS_ARCHIVO = "";

	public function __construct()
	{
		parent::__construct();	
		
		$this->load->model('panel/modulo_model','modulo');
		$this->load->model('panel/servicio_model','servicio');

		$this->load->library('pagination');

		$this->output->set_title();

		
	}

	public function listado()
	{
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$data['modulos']  =  $this->modulo->get_modulos();
			$data['servicio'] =  $this->servicio->get_listado();

			$this->template->display('panel/servicio/listado', $data);
		}
	}

	public function nuevo()
	{

		$data['modulos']  = $this->modulo->get_modulos();
		$data['archivo']  = $this->_IS_ARCHIVO;

		$this->template->display('panel/servicio/nuevo', $data);
	}

	public function agregar()
	{
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$this->form_validation->set_rules('no_servicio', 'titulo', 'required');
			$this->form_validation->set_rules('tx_servicio', 'descripción', 'required');

			if(!isset($_POST['archivo_hidden'])){
				$this->form_validation->set_rules('imagen', 'imagen', 'callback_subir_imagen');
			}else{
				$this->_IS_ARCHIVO = $_POST['archivo_hidden'];
			}
					
			if(!$this->form_validation->run())
			{
				$this->nuevo();

			}else{

				$this->servicio->agregar($this->_IS_ARCHIVO);
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido guardado.</div>');
				redirect("panel/servicio/listado");
			}
		}
	}

	public function editar($id=0)
	{

		$data['modulos']  = $this->modulo->get_modulos();
		$data['servicio'] = $this->servicio->get_listado_id($id);

		$this->template->display('panel/servicio/editar', $data);
	}

	public function update()
	{

		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$this->form_validation->set_rules('no_servicio', 'titulo', 'required');
			$this->form_validation->set_rules('tx_servicio', 'descripción', 'required');

			if($_FILES['imagen']['name'] != "" && isset($_FILES['imagen'])){
				$this->form_validation->set_rules('imagen', 'imagen', 'callback_subir_imagen');
			}
					
			if(!$this->form_validation->run())
			{
				$this->editar($this->input->post('id'));

			}else{

				$this->servicio->update($this->_IS_ARCHIVO);
				$this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido actualizado.</div>');
				redirect("panel/servicio/listado");
			}
		}
	}

	public function eliminar($id=0)
	{
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{

		$this->servicio->eliminar($id);
	    $this->session->set_flashdata('message', '<div class="success message">Listo! el registro ha sido eliminado.</div>');
	    redirect("panel/servicio/listado");
		}
	}


	public function subir_imagen()
	{
		
		$auth = new Auth();
		if(!$auth->check(FALSE)){
			$this->load->view('panel/login');
		}else{
			$nombre = '';

			if($_FILES['imagen']['name'] != "" && isset($_FILES['imagen']))
			{

				$ext = ".".end(explode('.',$_FILES['imagen']['name']));

				$nombre = date('dmYHis').rand(0,9).$ext;
				
				$config['upload_path']   = './public/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_width']     = '10024'; //10mb
				$config['file_name']     = $nombre;
		
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload("imagen"))
				{
					$datos_img = $this->upload->data();

					$this->form_validation->set_message('subir_imagen','<b>ERROR AL SUBIR ARCHIVO</b><br/>NOMBRE &nbsp;&nbsp;: '.$datos_img["client_name"].'<br/>MENSAJE : '.$this->upload->display_errors('',''));
					return false;
				}else{
					$this->_IS_ARCHIVO = $nombre;
					return true;
				}
					
			}else{
				$this->form_validation->set_message('subir_imagen','El campo imagen es obligatorio.');
				return false;
			}
				

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */