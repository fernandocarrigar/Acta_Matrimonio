<?php

//------    DATOS CONEXION    -----//
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "actmat";

//-----     CONEXION     ------// 
    $conexion = new mysqli($host, $user, $password, $database);

//-----     VALIDACIÓN CONEXIÓN     ------//
    if ($conexion->connect_error) {
        die("Conexión fallida: ". $conexion->connect_error);
    }
        //echo("Conexión exitosa <br>");

?>