<?php
    include_once('info.php');
    $query = "UPDATE reportes
    SET estado= 1, fechaa = :fecha, causa = :causa, detalles = :detalles, tecnicoa = :atendio WHERE folio LIKE :folio"; 

    $statement = $db->prepare($query); 

    $causa= $_POST['causa'];
    $folio = $_POST['folio'];
    $fecha= $_POST['fecha'];
    $atendio= $_POST['atendio'];
    $detalles = $_POST['detalles'];

    $statement->bindValue(':causa', $causa);
    $statement->bindvalue(':folio', $folio);
    $statement->bindvalue(':detalles', $detalles);
    $statement->bindvalue(':fecha', $fecha);
    $statement->bindvalue(':atendio', $atendio);

    
    $statement->execute();
    $statement->closeCursor();
    
    header("Location: termrepor.php");

?>