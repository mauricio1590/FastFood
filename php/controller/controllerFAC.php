<?php

require('./DAO/facDAO.php');

function controlFAC($json){
    $replyServerUs = array(
        'msg' => "Mensaje", //Mensaje a retornar
        'information' => "", //DATOS
        'status' => 0 //0 => INCORRECTO, 1 => CORRECTO
    );

   if(isset($json['idOp'])){
       switch ($json['idOp']){
        case '1010': //Insertar PEDIDO
            $result = insertFAC($json);
            if($result){                  
            $replyServerUS['msg'] = "Se ha insertado correctamente";
            $replyServerUS['information'] = $result;
            $replyServerUS['status'] = 1;        
           }
           return $replyServerUS;
        case '3030': //SELECCIONAR FACTURA POR ID PERSONA 
            $result = selectFACT($json , 1);
            if(!$result[0]['ped_id']==''){                               
            $replyServerUS['msg'] = "Se ha listado correctamente";
            $replyServerUS['information'] = $result;
            $replyServerUS['status'] = 1;        
           }
           return $replyServerUS;
        case '4040': //SELECCIONAR FACTURA POR ID PERSONA 
            $result = selectFACT($json , 2);
            if(!$result[0]['ped_id']==''){                               
            $replyServerUS['msg'] = "Se ha listado correctamente";
            $replyServerUS['information'] = $result;
            $replyServerUS['status'] = 1;        
           }
           return $replyServerUS;
        case '5050': //SELECCIONAR FACTURA POR ID PERSONA 
            $result = selectFACT($json , 3);
            if(!$result[0]['ped_id']==''){                               
            $replyServerUS['msg'] = "Se ha listado correctamente";
            $replyServerUS['information'] = $result;
            $replyServerUS['status'] = 1;        
           }
           return $replyServerUS;
        default:
            echo "Objeto no localizado.,";

       }
   }     
}