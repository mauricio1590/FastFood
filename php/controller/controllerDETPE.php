<?php

require ('./DAO/detpeDAO.php');

function controlDETPE($json){
    $replyServerUs = array(
        'msg' => "Mensaje", //Mensaje a retornar
        'information' => "", //DATOS
        'status' => 0 //0 => INCORRECTO, 1 => CORRECTO
    ); 
    if(isset($json['idOp'])){
        switch($json['idOp']){
            case '1010';
            $result = insertDETPE($json);
            if($result){                  
                $replyServerUS['msg'] = "Se ha insertado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;        
               }
            return $replyServerUS;

            default:
            echo "Objeto no encontrado";
        }
    }

    return $replyServerUs;
}