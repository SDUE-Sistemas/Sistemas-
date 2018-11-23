<?php

    $fecha= $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $e1 = $_POST['e1'];
    $e2 = $_POST['e2'];
    $e3 = $_POST['e3'];
    $e4 = $_POST['e4'];
    
    if(empty($fecha) || empty($detalles)){
     ?> 
        <!doctype html>
<html lang="en">
<head>
<!-- Obtener el ultimo Folio -->
<?php
    include_once('info.php');
    $query = "SELECT folio FROM reportes WHERE folio = (SELECT max(folio) FROM reportes)";
    $statement = $db->prepare($query);
    $statement->execute();
    $reportes = $statement->fetch();
    $statement->closeCursor();
?>
    <!-- Icono -->
    <link rel="icon" type="image/png" href="img/icono.png" />
    <title>Reportes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="menu.css">
     </head>
  <body>


  <div class="jumbotron" style="text-align:center">
  <!-- imagen del lado derecho -->
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="right">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARÍA DE DESARROLLO URBANO Y ECOLOGÍA</h1>
        <p class="lead">OFICINA DE INFORMATICA / ERROR </p>
      </div>
      <h1 class='display-6' style="text-align:center">RELLENE TODOS LOS CAMPOS NESECIARIOS :)</h1>
      <form action="termrepor.php">
      <div class="row">
      <div class="col-md"></div>
      <div class="col-md">
      <button type="submit" class="btn btn-secondary" style="width: 600px; height: 50px;">VOLVER</button>
      </div>
      <div class="col-md"></div>
      </div>
      </form>
      </body>
      </html>
     <?php   
    }else{

    include_once('info.php');
    $query = "UPDATE reportes
    SET estado= 1, fechaa = :fecha, causa = :causa, detalles = :detalles, tecnicoa = :atendio, e1 = :e1, e2 = :e2, e3 = :e3, e4 = :e4 WHERE folio LIKE :folio"; 

    $statement = $db->prepare($query); 

    $causa= $_POST['causa'];
    $folio = $_POST['folio'];
    $atendio= $_POST['atendio'];
 
    require_once('elimina_acentos.php');
    
    $detalles=elimina_acentos(strtoupper($detalles));

    $statement->bindvalue(':e1', $e1);
    $statement->bindvalue(':e2', $e2);
    $statement->bindvalue(':e3', $e3);
    $statement->bindvalue(':e4', $e4);
    $statement->bindValue(':causa', $causa);
    $statement->bindvalue(':folio', $folio);
    $statement->bindvalue(':detalles', $detalles);
    $statement->bindvalue(':fecha', $fecha);
    $statement->bindvalue(':atendio', $atendio);
    
    $statement->execute();
    $statement->closeCursor();
    
    header("Location: termrepor.php");
    }
?>