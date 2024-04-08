<?php 
    require 'vendor/autoload.php';
    include_once 'leer_configuracion.php';

    if(isset($_POST['nombre_usuario']) && isset($_POST['email'])) {

        $nombre_usuario_solicitud = $_POST['nombre_usuario'];
        $email_solicitud = $_POST['email'];
        $resultados = array(
            "status" => "OK",
        );

        try {
            $consultaPreparada = $conexion->prepare('SELECT * FROM users WHERE email = ? AND userName = ?');
            $consultaPreparada->bind_param("ss", $email_solicitud, $nombre_usuario_solicitud);
            $consultaPreparada->execute();
            $consultaPreparada->bind_result($id, $name, $userName, $email);

            while($consultaPreparada->fetch()) {
                $registro = array(
                    "id" => $id,
                    "name" => $name,
                    "userName" => $userName,
                    "email" => $email,
                );

                $resultados[] = $registro;
            }

            $consultaPreparada->close();
            $conexion->close();

        } catch(Exception $ex) {
            $erroMessage = "Ocurrió un error al intentar consultar información en la BD: " . $ex->getMessage();
            Logger::logError($erroMessage);
        }

        $jsonInformacion = json_encode($resultados);
        echo $jsonInformacion;
    }
?>
