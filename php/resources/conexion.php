<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $bd = "fastfood";
    $conection = mysqli_connect($host,$user,$pw,$bd) or die("Problemas al conectar con el servidor");
    $conection -> set_charset('utf8');
?>