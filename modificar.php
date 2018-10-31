<?php 

$folio = $_GET['FOLIO'];

include_once('info.php');
$query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico FROM reportes WHERE folio LIKE $folio";
$statement = $db->prepare($query);
$statement->execute();
$reporte = $statement->fetch();
$statement->closeCursor();
?>
<?php if ($folio>=1):?>
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
      <a href="modificar.php?FOLIO=0">MODIFICAR REPORTES</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
    </div>
  <div class="jumbotron" style="text-align:center">
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="left">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARIA DE DESARROLLO URBANO Y ECOLOGIA</h1>
        <p class="lead">OFICINA DE INFORMATICA / MODIFICAR REPORTES </p>
      </div>

      <!-- Contenedor -->
<div class="container">
  <div class="row">
       <!-- Parte Izquierda xd-->
      <div class="col-md">
        <div class="form-group">
         <label for=""></label>
           <input type="text"
             class="form-control" name="FOLIO" value= "<?php echo $reporte['folio']; ?>" id="" aria-describedby="helpId" placeholder="FOLIO" style="text-align:center; width: 30%;" disabled>
             <br>
             <button type="button" class="btn btn-outline-primary">GUARDAR</button>
        </div>
      </div>
    <!-- Parte Derecha -->
      <div class="col-md">
        <form style="text-align:rigth;">
          <!-- Formulario -->
          <div id="main" class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="ASUNTO DEL REPORTE" value= "<?php echo $reporte['asunto']; ?>" id="" aria-describedby="helpId" placeholder="ASUNTO DEL REPORTE" style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
            <input type="text" class="form-control" name="QUIEN REPORTA" id="" value= "<?php echo $reporte['usuario']; ?>" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
           <!--Departamenots Desplegables-->
              <select class="form-control">
                <option <?php if($reporte['departamento']='ADMINISTRATIVO'){echo 'selected';}?> >ADMINISTRATIVO</option>
                <option <?php if($reporte['departamento']='COORDINACION Y GESTION CATASTRAL'){echo 'selected';}?> >COORDINACION Y GESTION CATASTRAL</option>
                <option <?php if($reporte['departamento']='CUAHUTEMOC'){echo 'selected';}?> >CUAHUTEMOC</option>
                <option <?php if($reporte['departamento']='DELICIAS'){echo 'selected';}?> >DELICIAS</option>
                <option <?php if($reporte['departamento']='DESPACHO S.D.U.E'){echo 'selected';}?> >DESPACHO S.D.U.E</option>
                <option <?php if($reporte['departamento']='DIR. CATASTRO'){echo 'selected';}?> >DIR. CATASTRO</option>
                <option <?php if($reporte['departamento']='DIR. DESARROLLO URBANO'){echo 'selected';}?> >DIR. DESARROLLO URBANO</option>
                <option <?php if($reporte['departamento']='DER. ECOLOGIA'){echo 'selected';}?> >DIR. ECOLOGIA</option>
                <option <?php if($reporte['departamento']='FORESTACIÓN Y  REFOESTACION'){echo 'selected';}?> >FORESTACION Y REFORESTACION</option>
                <option <?php if($reporte['departamento']='INFORM. GEOGRAFICA Y CART. URBANA'){echo 'selected';}?> >INFORM. GEOGRAFICA Y CART. URBANA</option>
                <option <?php if($reporte['departamento']='JUAREZ'){echo 'selected';}?> >JUAREZ</option>
                <option <?php if($reporte['departamento']='JURIDICO'){echo 'selected';}?> >JURIDICO</option>
                <option <?php if($reporte['departamento']='MOVILIDAD URBANA'){echo 'selected';}?> >MOVILIDAD URBANA</option>
                <option <?php if($reporte['departamento']='NVO. CASAS GRANDES'){echo 'selected';}?> >NVO. CASAS GRANDES</option>
                <option <?php if($reporte['departamento']='ORD. ECOLOGICO E IMPAC. AMB.'){echo 'selected';}?> >ORD. ECOLOGICO E IMPAC. AMB.</option>
                <option <?php if($reporte['departamento']='PARRAL'){echo 'selected';}?> >PARRAL</option>
                <option <?php if($reporte['departamento']='PLANEACION'){echo 'selected';}?> >PLANEACION</option>
                <option <?php if($reporte['departamento']='PREVENCION Y  CONTROL CONTAM.'){echo 'selected';}?> >PREVENCION Y CONTROL CONTAM.</option>
                <option <?php if($reporte['departamento']='PROYECTOS ESPECIALES'){echo 'selected';}?> >PROYECTOS ESPECIALES</option>
                <option <?php if($reporte['departamento']='REGULARIZACION'){echo 'selected';}?> >REGULARIZACION</option>
                <option <?php if($reporte['departamento']='VIDA SILVESTRE'){echo 'selected';}?> >VIDA SILVESTRE</option>
              </select>
              <br>
            <!--Encargados Desplegable -->
                <select class="form-control" value= "<?php echo $reporte['tecnico']; ?>">
                  <option <?php if($reporte['tecnico']='Karla Lira'){echo 'selected';}?> >Karla Lira</option>
                  <option <?php if($reporte['tecnico']='Juan Hernandez'){echo 'selected';}?> >Juan Hernandez</option>
                  <option  <?php if($reporte['tecnico']='Myrna Enriquez'){echo 'selected';}?> >Myrna Enriquez</option>
                  <option  <?php if($reporte['tecnico']='Omar Herrera'){echo 'selected';}?> >Omar Herrera</option>
                  <option  <?php if($reporte['tecnico']='Otros'){echo 'selected';}?> >Otros</option>
                </select>
            <div class="form-group">
              <label for=""></label>
              <textarea class="form-control" name="DETALLES" id="" rows="5" placeholder="DETALLES" style="text-align:center"><?php echo $reporte['detalles']; ?></textarea>
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
      <a href="modificar.html">MODIFICAR REPORTES</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
    </div>
  <div class="jumbotron" style="text-align:center">
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="left">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARIA DE DESARROLLO URBANO Y ECOLOGIA</h1>
        <p class="lead">OFICINA DE INFORMATICA / MODIFICAR REPORTES </p>
      </div>

      <!-- Contenedor -->
<div class="container">
  <div class="row">
       <!-- Parte Izquierda xd-->
      <div class="col-md">
        <div class="form-group">
         <form action="modificar.php" method="get">
           <input type="text"class="form-control" name="FOLIO" id="" aria-describedby="helpId" placeholder="FOLIO" style="text-align:center; width: 30%;">
             <br>
             <button type="submit" class="btn btn-outline-primary">Buscar</button>
         </form>
            </div>
      </div>
    <!-- Parte Derecha -->
      <div class="col-md" hidden>
        <form style="text-align:rigth;">
          <!-- Formulario -->
          <div id="main" class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="ASUNTO DEL REPORTE" id="" aria-describedby="helpId" placeholder="ASUNTO DEL REPORTE" style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
            <input type="text" class="form-control" name="QUIEN REPORTA" id="" aria-describedby="helpId" placeholder="QUIEN REPORTA " style="text-align:center">
            <small id="helpId" class="form-text text-muted"></small>
            <label for=""></label>
           <!--Departamenots Desplegables-->
              <select class="form-control" >
                <option>ADMINISTRATIVO</option>
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
                <select class="form-control">
                  <option>Karla Lira</option>
                  <option>Juan Hernandez</option>
                  <option>Myrna Enriquez</option>
                  <option>Omar Herrera</option>
                  <option>Otros</option>
                </select>
            <div class="form-group">
              <label for=""></label>
              <textarea class="form-control" name="DETALLES" id="" rows="5" placeholder="DETALLES" style="text-align:center"></textarea>
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
<?php endif; ?>