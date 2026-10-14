<?php

    // Configurar la conexión de la BD con las credenciales
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db = 'sistema_roles_dinamico';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    //opciones de seguridad de PDO
    $opcions = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Reportar errores como excepciones aditables
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Retornar arreglos asocioatibos de columnas
        PDO::ATTR_EMULATE_PREPARES => false, // Desactivar emulacion para mitigar SQLinjection de raiz
    ];
    header('Content-Type: application/json');
    try{
        $pdo = new PDO ($dsn, $user, $pass, $opcions);
        /*echo json_encode([
            "status" => "success",
            "message" => "¡Conexion establecida correctamente con la base de datos"
        ]);*/
    }catch(\PDOException $e ){
        //no mostrar $e->getMesseg() en produccion, expone credenciales
        header ('content-Type: application/json');
        echo json_encode(["status" => "error", "message" => "Error interno del servidor."]);
    }

?>
