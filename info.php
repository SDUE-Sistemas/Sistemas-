<?php  
    $host = 'localhost';
    $database = 'sistemas';
    $username = 'root';
    $password = '';
    $dsn = "mysql:host=$host;dbname=$database";
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "Algo anda mal..." . $error_message;
        exit();
    }
?>