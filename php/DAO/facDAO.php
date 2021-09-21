<?php

function insertFAC($json){
    try {
        include('./resources/conexion.php');
        $query = "INSERT INTO 
                  factura (ped_id,per_id) 
                  VALUES (
                    ".$json['information']['ped_id'].",
                    ".$json['information']['ped_id']."
                  )";
        $query = mysqli_query($conection , $query);
        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

function selectFACT($json,$tipo){
    try {
        include('./resources/conexion.php');
        if($tipo == 1){  //BUSQUEDA DE DETALLE FACTURA POR ID DE PERSONS 
            $SELECT = "SELECT fa.fac_id,
                       fa.per_id,
                       CONCAT(pr.per_nombre1,' ',pr.per_nombre2)AS per_nombre,
                       fa.ped_id,
                       me.mes_id,
                       me.mes_nombre,
                       us.usu_id,
                       us.usu_usuario,
                       fa.fecha,
                       ca.car_id,
                       ca.car_nombre,
                       dp.depe_cantidad,
                       dp.depe_valor
                       FROM factura fa,pedido pe,detalle_pedido dp,mesa me,persona pr,usuario us,carta ca
                       WHERE fa.ped_id = pe.ped_id
                       AND   fa.per_id = pr.per_id
                       AND   pe.ped_id = dp.ped_id 
                       AND   dp.car_id = ca.car_id 
                       AND   pe.mes_id = me.mes_id
                       AND   pe.usu_id = us.usu_id
                       AND   pe.ped_fecha >= '".$json['information']['fecha_desde']."' ".
                      "AND   pe.ped_fecha <= '".$json['information']['fecha_hasta']."' ".
                      "AND   fa.per_id = ".$json['information']['per_id']."";
        }else if ($tipo == 2 ){  //BUSQUEDA DE FACTURA POR ID DE PEDIDO 
            $SELECT = "SELECT fa.fac_id,
            fa.per_id,
            CONCAT(pr.per_nombre1,' ',pr.per_nombre2)AS per_nombre,
            fa.ped_id,
            me.mes_id,
            me.mes_nombre,
            us.usu_id,
            us.usu_usuario,
            fa.fecha,
            ca.car_id,
            ca.car_nombre,
            dp.depe_cantidad,
            dp.depe_valor
            FROM factura fa,pedido pe,detalle_pedido dp,mesa me,persona pr,usuario us,carta ca
            WHERE fa.ped_id = pe.ped_id
            AND   fa.per_id = pr.per_id
            AND   pe.ped_id = dp.ped_id 
            AND   dp.car_id = ca.car_id 
            AND   pe.mes_id = me.mes_id
            AND   pe.usu_id = us.usu_id
            AND   pe.ped_fecha >= '".$json['information']['fecha_desde']."' ".
           "AND   pe.ped_fecha <= '".$json['information']['fecha_hasta']."' ".
           "AND   fa.per_id = ".$json['information']['ped_id']."";
        }else if ($tipo == 3){ //BUSQYEDA DE FACTURA EN RANGO DE FECHAS 
            $SELECT = "SELECT fa.fac_id,
            fa.per_id,
            CONCAT(pr.per_nombre1,' ',pr.per_nombre2)AS per_nombre,
            fa.ped_id,
            me.mes_id,
            me.mes_nombre,
            us.usu_id,
            us.usu_usuario,
            fa.fecha,
            ca.car_id,
            ca.car_nombre,
            dp.depe_cantidad,
            dp.depe_valor
            FROM factura fa,pedido pe,detalle_pedido dp,mesa me,persona pr,usuario us,carta ca
            WHERE fa.ped_id = pe.ped_id
            AND   fa.per_id = pr.per_id
            AND   pe.ped_id = dp.ped_id 
            AND   dp.car_id = ca.car_id 
            AND   pe.mes_id = me.mes_id
            AND   pe.usu_id = us.usu_id
            AND   pe.ped_fecha >= '".$json['information']['fecha_desde']."' ".
           "AND   pe.ped_fecha <= '".$json['information']['fecha_hasta']."' "."";
        }
    
    $facturas = [];
    $datos = false;

    $SELECT = mysqli_query($conection, $SELECT);
    while($row = mysqli_fetch_assoc($SELECT)){
        $datos = true;
        $detalle['fac_id'] = $row['fac_id'];
        $detalle['per_id'] = $row['per_id'];
        $detalle['per_nombre'] = $row['per_nombre'];
        $detalle['ped_id'] = $row['ped_id'];
        $detalle['mes_id'] = $row['mes_id'];
        $detalle['usu_id'] = $row['usu_id'];
        $detalle['usu_usuario'] = $row['usu_usuario'];
        $detalle['car_id'] = $row['car_id'];
        $detalle['car_nombre'] = $row['car_nombre'];
        $detalle['depe_cantidad'] = $row['depe_cantidad'];
        $detalle['depe_valor'] = $row['depe_valor'];
        $detalle['mes_nombre'] = $row['mes_nombre'];
        $detalle['fecha'] = $row['fecha'];
        array_push($facturas,$detalle);
    }
    if($datos == false){
        $detalle['fac_id'] = "";
        $detalle['per_id'] = "";
        $detalle['per_nombre'] = "";
        $detalle['ped_id'] = "";
        $detalle['mes_id'] = "";
        $detalle['mes_nombre'] = "";
        $detalle['usu_id'] = "";
        $detalle['usu_usuario'] = "";
        $detalle['car_id'] = "";
        $detalle['car_nombre'] = "";
        $detalle['depe_cantidad'] = "";
        $detalle['depe_valor'] = "";
        $detalle['fecha'] = "";
        array_push($facturas,$detalle);
    }
   
    return $facturas;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}