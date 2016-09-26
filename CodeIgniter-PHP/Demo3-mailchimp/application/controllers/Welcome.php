<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contactos_model','contacto');
			
	}
	
	
	public function index()
	{

	
		$data['contacto'] =$this->contacto->get_listado();
		$data['mensaje']='';
		$this->load->view('welcome_message',$data);
	}


	public function enviarEmail()
	{
		require_once APPPATH.'/third_party/masivo/Mandrill.php';

		try {

		    $mandrill = new Mandrill('Aqui va la key');

		    $email_enviar= array();
    		for($x=0; $x< count($_POST['destino']); $x++)
    		{
    			$email_enviar[] = array('email'=>$_POST['destino'][$x],'name'=>'Cliente','type'=>'to');
    		}

		    $message = array(
		        'html' => $this->input->post('texto'),
		        'text' => $this->input->post('texto'),
		        'subject' =>$this->input->post('asunto'),
		        'from_email' => ' Aqui va el correo ',
		        'from_name' => $this->input->post('de'),
		        'to' => $email_enviar
		    );

		    $async = false;
		    $ip_pool = '';
		    $send_at = '';
		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		    if($result!=null or $result!='')
		    {
		    	$data['mensaje']='Se envio el mensaje';
		    }else
		    {	$data['mensaje']='';}
		    $this->load->view('welcome_message',$data);
		    
		    //print_r($result);
		} catch(Mandrill_Error $e) {
		    // Mandrill errors are thrown as exceptions
		    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		    throw $e;
		}
	}
}
