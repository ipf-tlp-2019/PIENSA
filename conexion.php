<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bd_piensa";
    

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;"
                    , $username
                    , $password
                    , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

    } catch(PDOException $e){
        echo "La conexión falló: " . $e->getMessage();  
        exit;      
    }

?>