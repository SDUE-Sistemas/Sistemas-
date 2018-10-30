<?php
    include_once('info.php');
    $query = "INSERT INTO reportes(estado, detalles, asunto, usuario, departamento, tecnico)
            VALUES(:estado, :detalles, :asunto, :usuario, :departamento, :tecnico)";
    $statement = $db->prepare($query); 

    $detalles = $_POST['detalles'];
    $asunto = $_POST['asunto'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $tecnico = $_POST['tecnico'];
    $estado = 0;

    $statement->bindValue(':estado', $estado);
    $statement->bindValue(':detalles' , $detalles);
    $statement->bindValue(':asunto' , $asunto);
    $statement->bindValue(':usuario' , $usuario);
    $statement->bindValue(':departamento' , $departamento);
    $statement->bindValue(':tecnico' , $tecnico);
    $statement->execute();
    $statement->closeCursor();

?>