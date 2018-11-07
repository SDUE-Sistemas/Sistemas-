<?php if (isset($_POST['folio'])):?>
<?php
include_once('info.php');

$query = "SELECT folio FROM reportes WHERE folio = (SELECT max(folio) FROM reportes)";
    $statement = $db->prepare($query);
    $statement->execute();
    $x = $statement->fetch();
    $statement->closeCursor();

$folio = $_POST['folio'];

if($folio < ($x['folio']+1) && $folio > 0){

$query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE folio LIKE $folio";
$statement = $db->prepare($query);
$statement->execute();
$reporte = $statement->fetch();
$statement->closeCursor();
}
else{
  header('Location: mostrando.php');
}
?>

<!-- Encontrado -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Icono -->
    <link rel="icon" type="image/png" href="img/icono.png" />
    <title>Modificar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    div.scrollmenu {
    background-color:darkgrey;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}

    
    </style>
     </head>
  <body>
    <!--encabezado-->
    <div class="scrollmenu">
      <a href="reportes.php">REPORTES</a>
      <a href="modificar.php">MODIFICAR REPORTES</a>
      <a href="mostrando.php">MOSTRAR</a>
      <a href="#about">About</a>
    </div>
  <div class="jumbotron" style="text-align:center">
    <!-- imagen del lado derecho -->
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="right">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARÍA DE DESARROLLO URBANO Y ECOLOGÍA</h1>
        <p class="lead">OFICINA DE INFORMATICA / REPORTES </p>
      </div>

      <!-- Contenedor -->
<div class="container">
  <div class="row">
       <!-- Parte Izquierda xd-->
      <div class="col-md">
        <div class="form-group">
         <div class="row">
         <div class="col-md">
         <label for="">FOLIO</label>
           <input type="text"
             class="form-control" name="folio" value= "<?php echo $reporte['folio']; ?>" id="" aria-describedby="helpId" placeholder="FOLIO" style="text-align:center; width: 100%;" disabled>
             <br>
             <label for="" text-align:center;>FECHA</label>
             <input type="text"
             class="form-control" name="folio" value= "<?php echo $reporte['fecha']; ?>" id="" aria-describedby="helpId" placeholder="FOLIO" style="text-align:center; width: 100%;" disabled> 
         </div>
         </div>
             <br>
            <label>ETIQUETAS</label>
             <div class="row">
             <div class="col-md">
             <input type="text" class="form-control" name="e1" placeholder="ETIQUETA 1" value="<?php echo $reporte['e1'] ?>" style="text-align:center; width: 100%;" disabled>
             <br>
             <input type="text" class="form-control" name="e3" placeholder="ETIQUETA 3" value="<?php echo $reporte['e3']; ?>"style="text-align:center; width: 100%;" disabled>
             </div>
             <div class="col-md">
             <input type="text" class="form-control" name="e2" placeholder="ETIQUETA 2" value="<?php echo $reporte['e2']; ?>"style="text-align:center; width: 100%;" disabled>
             <br>
             <input type="text" class="form-control" name="e4" placeholder="ETIQUETA 4" value="<?php echo $reporte['e4']; ?>"style="text-align:center; width: 100%;" disabled>
             </div>
             </div>
             <br>
            
        </div>
      </div>
    <!-- Parte Derecha -->
      <div class="col-md">
      <!-- Formulario -->
        <form style="text-align:rigth;" method="post" action="modificare.php?folio=<?php echo $reporte['folio']; ?>" id="main">
          
          <div id="main" class="form-group">
            <label for="">ASUNTO</label>
            <input type="text" class="form-control" name="asunto" value= "<?php echo $reporte['asunto']; ?>" id="" aria-describedby="helpId" placeholder="ASUNTO DEL REPORTE" style="text-align:center" disabled>
            <small id="helpId" class="form-text text-muted"></small>
            <label for="">USUARIO</label>
            <input type="text" class="form-control" name="usuario" id="" value= "<?php echo $reporte['usuario']; ?>" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center" disabled>
            <small id="helpId" class="form-text text-muted"></small>
            <label for="">DEPARTAMENTO</label>
           <!--Departamenots Desplegables-->
           <input type="text" class="form-control" name="usuario" id="" value= "<?php echo $reporte['departamento']; ?>" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center" disabled>
              
              <br>
            <!--Encargados Desplegable -->
            <label>TECNICO</label>
            <input type="text" class="form-control" name="usuario" id="" value= "<?php echo $reporte['tecnico']; ?>" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center" disabled>

            <div class="form-group">
            <label for="">DETALLES</label>
              <textarea class="form-control" name="detalles" id="" rows="5" placeholder="DETALLES" style="text-align:center" disabled><?php echo $reporte['detalles']; ?> </textarea>
            </div>                        
          </div>
        </form>
      </div>
    </div>
</div>
<!-- Librerias No Mover >:V -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

<!-- No encontrado -->
<?php else: ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Icono -->
    <link rel="icon" type="image/png" href="img/icono.png" />
    <title>Modificar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    div.scrollmenu {
    background-color:darkgrey;
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
    background-color: #777;
}

    
    </style>
     </head>
  <body>
    <!--encabezado-->
    <div class="scrollmenu">
      <a href="reportes.php">REPORTES</a>
      <a href="modificar.php">MODIFICAR REPORTES</a>
      <a href="mostrando.php">MOSTRAR</a>
      <a href="#about">About</a>
    </div>
  <div class="jumbotron" style="text-align:center">
    <!-- imagen del lado derecho -->
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="right">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARÍA DE DESARROLLO URBANO Y ECOLOGÍA</h1>
        <p class="lead">OFICINA DE INFORMATICA / REPORTES </p>
      </div>

<div class="container">
<div class="form-group">
         <form action="mostrando.php" method="post">
           <input type="text"class="form-control" name="folio" id="" aria-describedby="helpId" placeholder="FOLIO" style="text-align:center; width: 30%;">
             <br>
             <button type="submit" class="btn btn-outline-primary">Buscar</button>
         </form>
         </div>
    <!-- Librerias No Mover >:V -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php endif; ?>