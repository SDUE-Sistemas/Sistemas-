<!doctype html>
<html lang="en">
<head>

<?php


    
?>
    <!-- Icono -->
    <link rel="icon" type="image/png" href="img/icono.png" />
    <title>Reportes</title>
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
      <a href="#contact"></a>
      <a href="#about">About</a>
    </div>
  <div class="jumbotron" style="text-align:center">
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="left">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARIA DE DESARROLLO URBANO Y ECOLOGIA</h1>
        <p class="lead">OFICINA DE INFORMATICA / REPORTES </p>
      </div>

      <!-- Contenedor -->
<div class="container">
  <div class="row">
       <!-- Parte Izquierda xd-->
      <div class="col-md">
          <form>
        <div class="form-group">
         <label for=""></label>
           <input type="text"
             class="form-control" name="FOLIO" id="" aria-describedby="helpId" placeholder="xd" style="text-align:center; width: 30%;" disabled>
             <br>
             <button type="submit" class="btn btn-outline-primary" action="">GUARDAR</button>
        
            <select class="form-control" name="consulta">
                <option value="1">FOLIO<option>
                <option value="2">FECHAS<option>
                <option value="3">ENCARGADO<option>
                <option value="4">USUARIO<option>
            </select>
        </div>
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
</html>