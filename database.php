<?php
//se realiza la conexion a la base de datos con el método PDO
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bd_piensa";
    

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database"
                    , $username
                    , $password);
    } catch(PDOException $e) {
        die ('La conexión falló: '.$e->getMessage());      
    }

?>


