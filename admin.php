<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
  
  include_once('info.php');
  $query = "SELECT pass FROM tecnicos WHERE tecnico='".$_COOKIE['usuario']."'";
  $statement = $db->prepare($query);
  $statement->execute();
  $usuario = $statement->fetch();
  $statement->closeCursor();
  }
else{
  header('Location: reportes.php');
}
if(!($usuario['pass']==$_COOKIE['password'])){
  header('Location: reportes.php');
}

if($_COOKIE['usuario'] == "JUAN HERNANDEZ"){
   $user='JUAN HERNANDEZ';
 }
else {
    header('Location: reportes.php'); 
}
  
  $query = "SELECT folio FROM reportes WHERE tecnico='".$user."' AND estado = 0";
  $statement = $db->prepare($query);
  $statement->execute();
  $nr = $statement->fetchAll();
  $statement->closeCursor();
$n = sizeof($nr); 

?>
<!doctype html>
<html lang="en">
<head>
  
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
  <body style="background-image:url='imagen.jpg'">

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
        <p class="lead">OFICINA DE INFORMATICA / ADMINISTRADOR </p>
      </div>
      <div class="container">
        <div class="row">
      <div class="col-md">
      <h1>Cambiar Estado de Reporte</h1>
      <br>
      <form action="" id="cambiar-estado">
      <input type="text" name="" id=""class="form-control" style="width:500px" placeholder="Folio" aria-describedby="helpId" placeholder="">
      <button name="" type="submit" id="" class="btn btn-primary"  class="form-control" href="" role="button">BUSCAR</button>  
    </form>
    <br><br>
    <h1>Vaciar Base de Datos</h1>
      <button name="" type="submit" id="" class="btn btn-primary" class="form-control" href="" role="button">MUCHO OJO MI ADMIN</button>
      </div>
      
      <div class="col-md">
      <h1>Agregar Usuario</h1><br>
      <form action="agregar.php" method="post">
      <input type="text" name="nombre" id=""class="form-control" style="width:500px" placeholder="Nombre" aria-describedby="helpId" >
      <input type="text" name="contra" id=""class="form-control" style="width:500px" placeholder="Password" aria-describedby="helpId" >
      <button name="" type="submit" id="" class="btn btn-primary"  class="form-control" href="" role="button">AGREGAR</button> 
      </form>
      <br>
      <form action="admin_modificar.php" method="post">
      <h1>Modificar Usuario</h1>
      <button name="" type="submit" id="" class="btn btn-primary"  class="form-control" href="" role="button">MODIFICAR</button>
      <br>
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
                  <option <?php if($reporte['tecnico']=="JUAN HERNANDEZ"){echo "disabled";}?>><?php echo $reporte['tecnico'];?></option>
                <?php endforeach; ?>
                </select>
                </form>
      </div>
      </div>
      </div>
      </div>
      </body>
      </html>

