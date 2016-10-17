<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index() {

		$this->load->library("Nusoap_lib");
		$this->load->helper('form');
        $this->nusoap_client = new nusoap_client('http://www.webservicex.net/globalweather.asmx?WSDL',true); 
        if($this->nusoap_client->fault)
        {
             $text = 'Error: '.$this->nusoap_client->fault;
        }
        else
        {
            if ($this->nusoap_client->getError())
            {
                 $text = 'Error: '.$this->nusoap_client->getError();
            }
            else
            {
            	$country=$this->input->post('pais');
            	$data['resultados']='';
                 if($country!='' and $country!=null){
                 $row = $this->nusoap_client->call('GetCitiesByCountry',array("CountryName"=>$country));
                 $data['resultados']= $row['GetCitiesByCountryResult'];}
            }


	     }
	     $this->load->view('welcome_message',$data);
	 }


	public function index2()
	{

		$this->load->view('welcome_message');
	}
}