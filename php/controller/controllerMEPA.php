<?php
require('./DAO/mepaDAO.php');

function controlMEPA($json){
    $replyServerUS = array(
        "msg" => 'Mensaje',
        "information" => '',
        "status" => '0' //0 => INCORRECTO. 1 => CORRECTO
    ); // Mensaje  a retornar

    if (isset($json['idOp'])){
        switch ($json['idOp']){
            case '1010'; //INSERTAR MEDIO DE PAGO
                $result = insertMedioDePago($json);
                if($result){                 
                $replyServerUS['msg'] = "Se ha insertado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;                    
            }
            return $replyServerUS;
            break;
            case '2020'; //ACTUALICE MEDIO DE PAGO
                $result = updateMedioDePago($json);
                if($result){                  
                $replyServerUS['msg'] = "Se ha insertado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;                    
            }
            return $replyServerUS;
            break;
            case '3030'; //SELECIONAR UN MEDIO DE PAGO
                $result = selectMedioDePago($json,1);
                if(!$result['mepa_id'] == ''){                
                $replyServerUS['msg'] = "Se ha Consultado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;                    
            }else{
                $replyServerUS['msg'] = "Sin registros de metodo de pago";
            }
            return $replyServerUS;
            break;
            case '4040'; //SELECIONAR TODOS 
                $result = selectMedioDePago($json,2);
                if(!$result[0]['mepa_id'] == ''){                  
                $replyServerUS['msg'] = "Se ha Consultado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;                    
            }else {
                $replyServerUS['msg'] = "Sin registros de metodo de pago";
            }
            return $replyServerUS;
            break;
            case '8080'; //ELIMINAR MEDIO DE PAGO
                $result = deleteMedioDePago($json);
                if($result){                  
                $replyServerUS['msg'] = "Se ha Eliminado correctamente";
                $replyServerUS['information'] = $result;
                $replyServerUS['status'] = 1;                    
            }else{
                $replyServerUS['msg'] = "Sin registros de metodo de pago";
            }
            return $replyServerUS;
            break;
        default:
                 echo "Objeto No Encontrado";
        }
    }
    return $replyServerUS ;
}