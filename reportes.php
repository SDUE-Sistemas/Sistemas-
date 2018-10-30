<!doctype html>
<html lang="en">
<head>
<!-- Obtener el ultimo Folio -->
<?php
    include_once('info.php');
    $query = "SELECT folio FROM reportes ORDER BY folio";
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
      <a href="modificar.html">MODIFICAR REPORTES</a>
      <a href="#contact">Contact</a>
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
        <div class="form-group">
         <label for=""></label>
           <input type="text"
             class="form-control" name="FOLIO" id="" aria-describedby="helpId" placeholder="<?php echo $reportes['folio']+1; ?>" style="text-align:center; width: 30%;" disabled>
             <br>
             <button type="submit" class="btn btn-outline-primary" form="main">GUARDAR</button>
        </div>
      </div>
    <!-- Parte Derecha -->
      <div class="col-md">
        <form style="text-align:rigth;" id="main" action="reportese.php" method="post">
          <!-- Formulario -->
          <div id="main" class="form-group" >
            <label for=""></label>
            <input type="text" class="form-control" name="asunto" id="" aria-describedby="helpId" placeholder="ASUNTO DEL REPORTE" style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
            <input type="text" class="form-control" name="usuario" id="" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
           <!--Departamenots Desplegables-->
              <select class="form-control" name="departamento">
                <option >ADMINISTRATIVO</option>
                <option>COORDINACION Y GESTION CATASTRAL</option>
                <option>CUAHUTEMOC</option>
                <option>DELICIAS</option>
                <option>DESPACHO S.D.U.E</option>
                <option>DIR. CATASTRO</option>
                <option>DIR. DESARROLLO URBANO</option>
                <option>DIR. ECOLOGIA</option>
                <option>FORESTACION Y REFORESTACION</option>
                <option>INFORM. GEOGRAFICA Y CART. URBANA</option>
                <option>JUAREZ</option>
                <option>JURIDICO</option>
                <option>MOVILIDAD URBANA</option>
                <option>NVO. CASAS GRANDES</option>
                <option>ORD. ECOLOGICO E IMPAC. AMB.</option>
                <option>PARRAL</option>
                <option>PLANEACION</option>
                <option>PREVENCION Y CONTROL CONTAM.</option>
                <option>PROYECTOS ESPECIALES</option>
                <option>REGULARIZACION</option>
                <option>VIDA SILVESTRE</option>
              </select>
              <br>
            <!--Encargados Desplegable -->
                <select class="form-control" name="tecnico">
                  <option>Karla Lira</option>
                  <option>Juan Hernandez</option>
                  <option>Myrna Enriquez</option>
                  <option>Omar Herrera</option>
                  <option>Otros</option>
                </select>
            <div class="form-group">
              <label for=""></label>
              <!-- detalles -->
              <textarea class="form-control" name="detalles" id="" rows="5" placeholder="DETALLES" style="text-align:center"></textarea>
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
</html>