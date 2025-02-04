<?php

    $host = 'localhost';
    $dbname = 'colegio';
    $username = 'root';
    $password = 'admin';

    //Data Source Name
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        //Creating an instance of pdo
        $pdo = new PDO($dsn, $username, $password);
        echo "Conexión exitosa";
    } catch (PDOexception $e){
        echo "Error en la conexión: " . $e->getMessage();
    }

?>