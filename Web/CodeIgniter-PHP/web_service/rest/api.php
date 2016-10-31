<?php
require_once("Rest.inc.php");
class API extends REST 
{

	public function __construct()
	{
		parent::__construct();
			define('DB_SERVER','localhost');
			define('DB_USER','root');
			define('DB_PASSWORD','');
			define('DB','demorest');
			// Init parent contructor
		$this->dbConnect();// Initiate Database connection
	}

	//Database connection
	private function dbConnect()
	{
		$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB);
		if ($mysqli->connect_errno) {
		    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		return $mysqli;
	}


	public function processApi()
	{
		$url = explode("/",$_SERVER["REQUEST_URI"]);
		$func = end($url);
		$func = explode('?',$func);
		$func = $func[0];

		//echo $func[0];
		if((int)method_exists($this,$func) > 0)
		$this->$func();
		else
		$this->response('',404); 
		// If the method not exist with in this class, response would be "Page not found".
	}

	private function verificarUsuario($usuario,$password) {

		    $cnx = $this->dbConnect();
		    $sql="SELECT u.idusuario FROM usuario u 
		                          WHERE u.usuario = '".$usuario."' AND u.clave = '".$password."' ";

		    $query = $cnx->query($sql);

		    if (!$query) { echo 'Fallo la consulta: ' . $cnx->error; exit;}

		    $usuarios = array();

		    if($query->num_rows!=0 or $query->num_rows!=''){
		    	 return true;
		    }else{
		    	 return false;
		    }
		    
		}

	private function enviarSMS()
	{

		$usuario  = $_POST['usuario'];
		$password = $_POST['password'];


		if($this->verificarUsuario($usuario,$password)){

	        $data = array();

	        //insert a la tabla envio

	        $mensaje = $_POST['mensaje'];
	        $numero  = $_POST['numero'];


	        for($x=0; $x<count($numero); $x++){

	            if(!$this->validarNumero($numero[$x])){
	                $estado    = 'Rechazado';
	                $nota = 'Numero Invalido';
	            }else{
	                $estado = 'Recibido';
	                $nota = 'Registros Validos';
	            }

	            //Aqui podrias insertar los mensajes de texto en una base de datos si quisieras
	             
	            $data[] = array("numero"=>$numero[$x],"texto"=>$mensaje[$x],"estado"=>$estado,"nota_estado"=>$nota);
	            
	            
	        }

	        $datos = array("usuario"=>$usuario,"password"=>$password,"mensaje"=>$data);
	         

	    }else{
	        $datos = array("usuario"=>$usuario,"password"=>$password,"estado"=>"Rechazado","nota_estado"=>"Usuario Invalido");
	    }

	    return $this->response($this->json($datos), 200);

		
	}



	public function validarNumero($numero)
	{

	    if (preg_match("/^(9)[[:digit:]]{8}/", $numero)){
	        return true;
	    }else{
	        return false;
	    }
	}


}

// Initiiate Library
$api = new API;
$api->processApi();
?>