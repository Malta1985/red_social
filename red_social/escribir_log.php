<?php 
    class Logger {
        private static $log_file;

        public static function setLogFile($file){
            self::$log_file = $file;
        } 

        public static function logError($message){
            if(isset(self::$log_file)){
                $dateTime = date("Y-m-d H:i:s");

                file_put_contents(self::$log_file,"[$dateTime] $message" . PHP_EOL, FILE_APPEND);
               }else{
                  error_log("Error: Archivo de registro no encontrado");
               }
        }
    }

?>