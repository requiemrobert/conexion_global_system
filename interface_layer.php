<?php
include 'system/DB_Model.php';
/**
* 
*/

class InterfaceLayer extends DB_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function route($dataArray){
       	
		  switch ($dataArray['rc']):
		      case 'get_login':

		        echo $this->get_login($dataArray['data']);
		            
		      break;

		      case 'get_menu':

		        echo $this->get_menu($dataArray['data']);
		            
		      break;
		      
		      default:
		          
		        echo "no response service";

		      break;
	      endswitch;

    }	

	/*// Esta funcion imprime las respuesta en estilo JSON y establece los estatus de la cebeceras HTTP
	function response_json($status, $response_db, $mensaje) {
	  header("HTTP/1.1 $status $mensaje");
	  header("Content-Type: application/json; charset=UTF-8");

	  $response['rc'] = $status;
	  $response['statusMessage'] = $mensaje;
	  $response['response'] = $response_db;

	  echo json_encode($response, JSON_PRETTY_PRINT);

	 }*/


}