<?php
$asunto = $_POST['asunto'];
$usuario = $_POST['usuario'];
if(empty($asunto) || empty($usuario)){
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
      <h1 class='display-6' style="text-align:center">RELLENE TODOS LOS CAMPOS NECESARIOS :)</h1>
      <form action="reportes.php">
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
    $query = "INSERT INTO reportes(estado, asunto, usuario, departamento, tecnico)
            VALUES(:estado, :asunto, :usuario, :departamento, :tecnico)";
    $statement = $db->prepare($query); 
    $departamento = $_POST['departamento'];
    $tecnico = $_POST['tecnico'];

    $estado = 0;
    
    require_once('elimina_acentos.php');

    
    $asunto=elimina_acentos($asunto);
    $usuario=elimina_acentos($usuario);


    $statement->bindValue(':estado', $estado);
    $statement->bindValue(':asunto' , strtoupper($asunto));
    $statement->bindValue(':usuario' , strtoupper($usuario));
    $statement->bindValue(':departamento' , $departamento);
    $statement->bindValue(':tecnico' , $tecnico);
    $statement->execute();
    $statement->closeCursor();
    
    header("Location:reportes.php");
    
}

?>