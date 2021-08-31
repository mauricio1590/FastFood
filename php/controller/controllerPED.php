<?php

require('./DAO/pedDAO.php');

function controlPED($json){
    $replyServerUs = array(
        'msg' => "Mensaje", //Mensaje a retornar
        'information' => "", //DATOS
        'status' => 0 //0 => INCORRECTO, 1 => CORRECTO
    ); 

    if(isset($json['idOp'])){
        switch ($json['idOp']) { //Segun operación
            case '1010': //Insertar PEDIDO
                if(!empty($json['information']['mes_id'])){
                    if(!empty($json['information']['per_id'])){
                        if(!empty($json['information']['usu_id'])){
                            if(!empty($json['information']['ped_estado'])){
                                if(!empty($json['information']['ped_domicilio']['indicador'])){
                                    $result = insertPED($json);
                                    if($result){
                                        $replyServerUs['msg'] = "Pedido insertado correctamente.";
                                    }else{
                                        $replyServerUs['msg'] = "Se ha presentado un error al insertar el pedido.";
                                    }
                                }else{
                                    $replyServerUs['msg'] = "Falta especificar si es domicilio";    
                                }
                            }else{
                                $replyServerUs['msg'] = "Falta el estado";
                            }
                        }else{
                            $replyServerUs['msg'] = "Falta seleccionar el usuario";
                        }
                    }else{
                        $replyServerUs['msg'] = "Falta seleccionar la persona";
                    }
                }else{
                    $replyServerUs['msg'] = "Falta seleccionar la mesa";
                }
                break;
            case '5050': //Validar
                break;
            default:
                echo "Objeto no localizado.";
        }
    }
    return $replyServerUs;
}

?>