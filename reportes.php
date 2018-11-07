<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])) :?>


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
         <label for=""></label>
           <input type="text"
             class="form-control" name="FOLIO" id="" aria-describedby="helpId" placeholder="<?php echo $reportes['folio']+1; ?>" style="text-align:center; width: 100%;" disabled>
             <br>
             <div class="row">
             <div class="col-md">
             <input type="text" class="form-control" name="e1" form="main" placeholder="ETIQUETA 1" style="text-align:center; width: 100%;">
             <br>
             <input type="text" class="form-control" name="e3" form="main" placeholder="ETIQUETA 3" style="text-align:center; width: 100%;">
             </div>
             <div class="col-md">
             <input type="text" class="form-control" name="e2" form="main" placeholder="ETIQUETA 2" style="text-align:center; width: 100%;">
             <br>
             <input type="text" class="form-control" name="e4" form="main" placeholder="ETIQUETA 4" style="text-align:center; width: 100%;">
             </div>
             </div>
             <br>
             <button type="submit" class="btn btn-secondary" style="width: 600px; height: 210px;" form="main">GUARDAR</button>
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
                  <option>KARLA LIRA</option>
                  <option>JUAN HERNANDEZ</option>
                  <option>MYRNA ENRIQUEZ</option>
                  <option>OMAR HERRERA</option>
                  <option>OTROS</option>
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

<!-- Diseño del login -->

<?php else : ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="jumbotron" style="text-align:center">
  <!-- imagen del lado derecho -->
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="right">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARÍA DE DESARROLLO URBANO Y ECOLOGÍA</h1>
        <p class="lead">INGRESAR AL SISTEMA</p>
      </div>
<div class="container">
  
  <div class="row">
    <div class="col-md">
      
    </div>
      <div class="col-md">
    
    <form action="prueba1.php" method="post" style="text-align:center">
    <input name="usuario" type="text" class="form-control" style="text-align:center; width:350px;" placeholder="USUARIO">
    <br><br>
    <input name="password" type="password" class="form-control" style="text-align:center; width:350px;" placeholder="CONTRASEÑA">
    <br><br>
    <button type="submit" class="btn btn-secondary">INGRESAR</button>
</form>
</div>
<div class="col-md"></div>
</div>
</div>
   

   <!-- Librerias -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php endif; ?>