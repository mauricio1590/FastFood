<?php
include_once "Controller/controllerPER.php";
include_once "Controller/controllerPED.php";
include_once "Controller/controllerCAR.php";
include_once "Controller/controllerTIP.php";
include_once "Controller/controllerTEL.php";
include_once "Controller/controllerDIR.php";
include_once "Controller/controllerCAJ.php";
include_once "Controller/controllerMESA.php";
include_once "Controller/controllerMEPA.php";
include_once "Controller/controllerMOV.php";

// $json = $_POST['dataJSON'];

//print_r($json);

/* ID de URLs (idUrl)
101010 = Usuarios
202020 = Personas
303030 = Pedidos
404040 = Carta - Productos
505050 = Tipo (Categoría)
606060 = Telefonos
707070 = Direcciones
717171 = Metodo de pago
727272 = Metodo de pago
737373 = Mesa
909090 = Caja
 */
/* ID de operaciones (idOp)
1010 = INSERT
2020 = UPDATE
3030 = DELETE
4040 = SELECT
5050 = VALIDAR
 */
$json = [
    'idOp'=>'3030' ,
    'idUrl'=> "707070",
    'information' => [
    'aux_id'=>'8',
    'aux_texto'=>'calle 2 av 5',
    'per_id'=>'1',
    'aux_observaciones'=>'DIRECCION NUEVA',
    'mepa_id'=>'1',
    'caja_valor'=>'85000']
 ];


switch ($json['idUrl']) {
    case '101010':
        return print_r(json_encode(controlPER($json)));
    case '202020':
        return print_r(json_encode(controlPER($json)));
    case '303030':
        // return print_r(json_encode(controlPED($json)));
    case '404040':
        return print_r(json_encode(controlCAR($json)));
    case '505050':
        return print_r(json_encode(controlTIP($json)));
    case '606060':
        return print_r(json_encode(controlTEL($json)));
    case '707070':
        return print_r(json_encode(controlDIR($json)));
    case '717171':
        return print_r(json_encode(controlMEPA($json)));
    case '727272':
        return print_r(json_encode(controlMOV($json)));
    case '737373':
        return print_r(json_encode(controlMESA($json)));
    case '909090':
        return print_r(json_encode(controlCAJ($json)));
    default:
        echo "Problemas del servidor";
}
