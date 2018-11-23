<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])) :?>
<?php


include_once('info.php');
$query = "SELECT pass FROM tecnicos WHERE tecnico='".$_COOKIE['usuario']."'";
$statement = $db->prepare($query);
$statement->execute();
$usuario = $statement->fetch();
$statement->closeCursor();



if($usuario['pass']==$_COOKIE['password']){ 

  $user=$_COOKIE['usuario'];
  
  $query = "SELECT folio FROM reportes WHERE tecnico='".$user."' AND estado = 0";
  $statement = $db->prepare($query);
  $statement->execute();
  $nr = $statement->fetchAll();
  $statement->closeCursor();
  $n = sizeof($nr);?>
  
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

    <!--encabezado-->
    
    <div class="scrollmenu">
      <ul class="nav">
        <a href="reportes.php">REPORTES</a>
        <a href="modificar.php">MODIFICAR REPORTES</a>
      
        <li><a>BUSCAR</a>
          <ul>
						<li><a href="mostrando.php">POR FOLIO</a></li>
						<li><a href="mostrande.php">POR NOMBRE USUARIO</a></li>
						<li><a href="mostrandi.php">POR TECNICO</a></li>
            <li><a href="mostranda.php">POR AREA</a></li>          
          </ul>
        </li>
        <a href="termrepor.php">TERMINAR MIS REPORTES (<?php echo $n ?>)</a>
        <a href="graficas.php">GRAFICAS</a>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul style="float:right">
        <li ><a class="log" href="logout.php">CERRAR SESION</a></li>
        </ul>
      </ul>
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
           <input type="text" class="form-control" name="FOLIO" id="" aria-describedby="helpId" placeholder="<?php echo $reportes['folio']+1; ?>" style="text-align:center; width: 100%;" disabled>
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
             <button type="submit" class="btn btn-secondary" style="width: 600px; height: 50px;" form="main">GUARDAR</button>
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
            <?php
            include_once('info.php');
            $query = "SELECT tecnico FROM tecnicos";
            $statement = $db->prepare($query);
            $statement->execute();
            $reportes = $statement->fetchALL();
            $statement->closeCursor();
            ?>
                <select class="form-control" name="tecnico">
                <?php  foreach($reportes as $reporte): ?>
                  <option><?php echo $reporte['tecnico'];?></option>
                <?php endforeach; ?>
                </select>
            <div class="form-group">
              <label for=""></label>
              <!-- detalles -->
              
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


<?php }else{ 
  
  setcookie('usuario', "");
  setcookie('password', "");
  
  ?>
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
  </div>
  <div class="row">
    <div class="col-md">
      
    </div>
      <div class="col-md">
      <h1>Usuario y/o contraseña incorrrecto</h1>
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


<?php } ?>

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