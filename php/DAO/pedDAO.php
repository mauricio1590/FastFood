<?php

function insertarPED($json){
    include_once('./resources/conexion.php');

    $query = "SELECT * FROM USUARIO WHERE usu_usuario ='".$json['information']['usu_us']."' AND
                usu_pw ='". $json['information']['usu_pw']."';";
    $query = "INSERT INTO PEDIDO 
                    (mes_id, per_id, usu_id, ped_estado, ped_observaciones, ped_domicilio) 
                VALUES 
                    (".$json['information']['mes_id'].","
                    .$json['information']['per_id'].","
                    .$json['information']['usu_id'].","
                    .$json['information']['ped_estado'].","
                    .$json['information']['ped_observaciones'].","
                    .$json['information']['ped_domicilio']['indicador'].");";

    //$con = mysqli_connect($host,$user,$pw,$bd) or die("Problemas al conectar"); //Conectar a la base de datos

    $SELECT = mysqli_query($conection, $query);

    $Usuario = "0";
    if($SELECT){
        //Se inserto correctamente
    }
    return $Usuario;
}

?>