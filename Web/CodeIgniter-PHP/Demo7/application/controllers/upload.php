<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	
	public function index()
	{

		$this->load->view('upload');
	}

	public function upload_file(){				
		//Config the parameters to upload the file to the server.
		//Configuramos los parametros para subir el archivo al servidor.		
		$config['upload_path'] = realpath(APPPATH.'../files');		
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '0';			

		//Load the Upload CI library 
		//Cargamos la libreria CI para Subir
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file') ){		
			//Displaying Errors.
			//Mostramos los errores.
			$data['error']=$this->upload->display_errors();	

			$this->load->view('upload',$data);						
		}
		else{
			//Uploads the excel file and read it with the PHPExcel Library.
			//Subimos el archivo de excel y lo leemos con la libreria PHPExcel.
			$data = array('upload_data' => $this->upload->data());			
			$this->load->library('excel');
			$excel = $this->excel->read_file($data['upload_data']['file_name']);
		

		$this->load->library("Simple_html_dom");


		$comienzo = microtime(true);
		$encontrados = 0;
		$no_encontrados = 0;

		$options = array('http' =>
		    array(
		        'method'  => 'GET',
		        'header'  => 'Content-type: text/plain;charset=UTF-8' . PHP_EOL .
		        'Referer: http://www.forosdelweb.com' . PHP_EOL .
		        'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6' . PHP_EOL .
		        'Cookie: user=FDW; actividad=programacion;' . PHP_EOL
		    )
		);

		$context = stream_context_create($options);


		$datos_llenar[] = array("Nombres y Apellidos","Direccion Completa","Provincia / Distrito","Telefono Completo","Telefono Filtrado");


	foreach($excel as $row){
		    foreach ($row as $col){


		            $telefono_a_consultar = $col;

					$página_inicio = file_get_contents('http://www.paginasblancas.pe/telefono/'.$telefono_a_consultar,false, $context);

					$html = str_get_html($página_inicio);

					if($html === FALSE){
					 	//echo "La pagina que en blanco :".$telefono_a_consultar."\n";
					}else{
						$valor_duro = $html->find('div[class=m-result-business--recomendation-adv-data is-hidden]', 0);

						$valorTextArea = ($valor_duro != null) ? $valor_duro->innertext : '';

						$h3 = str_get_html($valorTextArea);

						if ($h3 === FALSE) {
							/*echo "No se encontro datos para este telefono: ".$telefono_a_consultar."\n";*/
							$no_encontrados++;
						}else{
							$valorh3    = $h3->find('h3', 0)->innertext;
							$valorspan1 = $h3->find('span', 0)->innertext;
							$valorspan2 = $h3->find('span', 1)->innertext;
							$valorspan3 = $h3->find('span', 2)->innertext;

							$datos_llenar[] = array($valorh3,$valorspan1,$valorspan2,$valorspan3,$telefono_a_consultar);
							$encontrados++;
						
						}
					

		             }
		    
		    }

	}

		
		$final = microtime(true);
		

		$data['excel'] = $excel;
		$data['datos_llenar'] = $datos_llenar;
		$this->load->view('upload', $data);	
	}



		
	}
}
