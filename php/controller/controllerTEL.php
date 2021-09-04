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
                if ($result) {
                    $replyServerUs['msg'] = "Se ha Actualizado correctamente";
                    $replyServerUs['information'] = $result;
                    $replyServerUs['status'] = 1;
                }
                return $replyServerUs;
            case '3030': //ELIMINAR
                $result = deleteTEL($json);
                if ($result) {
                $replyServerUs['msg'] = "Se ha eliminado el telefono";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                }
                return $replyServerUs;
            case '4040': //Consultar por id telefono 
                $result = consultarTEL($json, 1);
                if ($result['tel_id']) {
                $replyServerUs['msg'] = "Se ha consultado de forma Exitosa";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
            }else{
                $replyServerUs['msg'] = "Sin registros de Telefonos";
            }
                return $replyServerUs;
            case '5050': //Consultar todos los telefono
                $result = consultarTEL($json, 2);
                if ($result[0]['tel_id']) {
                $replyServerUs['msg'] = "Se ha consultado de forma Exitosa";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                }else{
                    $replyServerUs['msg'] = "Sin registros de Telefonos";
                }
                return $replyServerUs;
            case '6060': //Consultar telefonos de una persona
                $result = consultarTEL($json, 3);
                
                if ($result[0]['tel_id']) {
                $replyServerUs['msg'] = "Se ha consultado de forma Exitosa";
                $replyServerUs['information'] = $result;
                $replyServerUs['status'] = 1;
                }else{
                    $replyServerUs['msg'] = "Sin registros de Telefonos";
                }
                return $replyServerUs;
      
            default:
                echo "Objeto no localizado.";
        }
    }
    return $replyServerUs;
}
