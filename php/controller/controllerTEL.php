<?php
require './DAO/telDAO.php';

function controlTEL($json)
{
    $replyServerUs = array(
        "msg" => "Mensaje",
        "information" => "",
        "status" => "0", //0 => INCORRECTO, 1 => CORRECTO
    ); //Mensaje a retornar

    if (isset($json['idOp'])) {
        switch ($json['idOp']) { //Segun operación
            case '1010': //Insertar
                $result = insertTelefono($json); //
                if ($result) {
                    $replyServerUs['msg'] = "Se ha insertado correctamente";
                    $replyServerUs['information'] = $result;
                    $replyServerUs['status'] = 1;
                }
                return $replyServerUs;
                break;
            case '2020': //ACTUALIZAR
                $result = updateTelefono($json);
                $replyServerUs['msg'] = "Se ha actualizado el telefono";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                return $replyServerUs;
            case '3030': //ELIMINAR
                $result = deleteTEL($json);
                $replyServerUs['msg'] = "Se ha eliminado el telefono";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                return $replyServerUs;
            case '4040': //Consultar
                $result = consultarTEL($json, 1);
                $replyServerUs['msg'] = "";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                return $replyServerUs;
      
            default:
                echo "Objeto no localizado.";
        }
    }
    return $replyServerUs;
}
