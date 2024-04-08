<?php 
      $credenciales_file = 'database.json';
      $log_file = 'error.log';

      include_once 'escribir_log.php';
      Logger ::setLogFile($log_file);

      if(file_exists($credenciales_file) && is_readable($credenciales_file)) {

        $credenciales = json_decode(file_get_contents($credenciales_file), true);

        if($credenciales !== null) {

        $claves_requeridas = ['host', 'username', 'password', 'database'];

        if(count(array_diff($claves_requeridas,  array_keys($credenciales))) ==0);{
            $host = $credenciales['host'];
            $userName = $credenciales['username'];
            $password = $credenciales['password'];
            $database = $credenciales['database'];

            try{

                $conexion = new mysqli($host, $userName, $password, $database);

            } catch(Exception $ex) {
                $mensajeError = "Error en la conexión con BD" . $ex->getMessage();
                Logger::logError($mensajeError);
                header("Location: server_error_500.html");
            }
        }
      }
    }else{
        $mensajeError = "Error no se han encontrador credenciales para conectar";
        Logger::logError($mensajeError);
    }
?>