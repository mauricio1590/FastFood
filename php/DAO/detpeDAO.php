<?php

function insertDETPE($json){
    try {
       include('./resources/conexion.php');
       $query = "INSERT INTO detalle_pedido
                  (ped_id,car_id,depe_cantidad,depe_valor,depe_estado)
                 VALUES (
                 ".$json['information']['ped_id'].",
                 ".$json['information']['car_id'].",
                 ".$json['information']['depe_cantidad'].",
                 ".$json['information']['depe_valor'].",
                 ".$json['information']['depe_estado'].");";
                
        $query = mysqli_query($conection, $query);
        return $query;

    } catch (\Throwable $th) {
        var_dump($th);
    }
}