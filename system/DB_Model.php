<?php 
 // Se incluye el archivo de conexion de base de datos
 include 'core/ConexionDB.php';
 // Se incluye la interfaz de Modelo
 include 'core/iConexionDB.php';

 // Se crea la clase que ejecuta llama a las funciones de ejecución para interactuar con la Base de datos
 // Esta clase extiende a la clase db_model en el archivo db_model.php (hereda sus propiedades y metodos)
 // Esta clase implementa la interfaz iModel (Enmascara cada una de las funciones declaradas) generic_class
 class DB_Model extends ConexionDB {
  // Ya que la clase es generica, es importante poseer una variable que permitira identificar con que tabla se trabaja
  public $entity;
  // Almacena la informacion que sera enviada a la Base de datos
  public $data;

  private function get_fields_query($array_field=[]){

    $fields_query='';

    foreach ($array_field as $value) {
        
        $fields_query .= $value . ",";
    }

    return rtrim($fields_query,',');

  }

  public function get_login($dataArray = array()){

    $array_field = $this->get_fields_query(["status", "user_name", "email"]);
    
    $sql = "SELECT $array_field FROM usuario WHERE user_name = ? AND password = ?";

    $response_query = $this->execute_query_login($dataArray, $sql);

      if ($response_query) {
          return $this->response_json(200, $response_query, "consulta exitosa");
      }else{
          return $this->response_json(-200, $response_query, "usuario o contraseña no son válidos");
      }

  }  

  public function get_menu($dataArray = array()){

    $array_field = $this->get_fields_query(["modulo.descripcion"]);
    
    extract($dataArray);

    $sql = "SELECT $array_field FROM autorizacion";  
    $sql .= " INNER JOIN modulo ON autorizacion.id_modulo_fk = modulo.id_modulo";
    $sql .= " INNER JOIN perfil ON autorizacion.id_perfil_fk = perfil.id_perfil";
    $sql .= " INNER JOIN usuario ON usuario.id_perfil_fk = perfil.id_perfil";
    $sql .= " WHERE usuario.`user_name` = '$user_name' AND usuario.`status` = $status";

    $response_query = $this->get_query($sql);

 /*   $count = count($response_query) - 1;

    unset($response_query[$count]);*/

      /*if ($response_query) {
          return $this->response_json(200, $response_query, "consulta exitosa");
      }else{
          return $this->response_json(-200, $response_query, "no se pudo realizar la consulta");
      }*/

  }

  protected function response_json($status, $response, $mensaje) {
    
    header("HTTP/1.1 $status $mensaje");
    header("Content-Type: application/json; charset=UTF-8");

    $response = [ 
                  'rc'      => $status, 
                  'data'    => $response,
                  'mensaje' => $mensaje
                ];

    return json_encode($response, JSON_PRETTY_PRINT);

  }


 }
