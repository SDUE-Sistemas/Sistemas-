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
<?php
$tec=$_POST['tecnico'];
$query="SELECT tecnico, pass FROM tecnicos WHERE tecnico='".$tec."'";
$statement = $db->prepare($query);
$statement->execute();
$f=$statement->fetch();
$statement->closeCursor();
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
        <p class="lead">OFICINA DE INFORMATICA / ADMINISTRADOR </p>
      </div>
      <form id="modificar" action="modificar_adm.php" method="post">
     <div class="form-group">
       <label for="">usuario</label>
       <input type="text" class="form-control" value="<?php echo $f['tecnico'] ?>" name="user" id="" aria-describedby="helpId" placeholder="">
         <div class="form-group">
           <label for="">contraseña</label>
           <input type="text" class="form-control" value="<?php echo $f['pass']; ?>" name="pass" id="" aria-describedby="helpId" placeholder="">
         </div>
         <input type="text" value="<?php echo $f['tecnico'] ?>" name="user1" hidden>
         <input type="text" value="<?php echo $f['pass']; ?>" name="pass1" hidden>
</form>
         <form id="eliminar" action="eliminar.php" method="post">
     <div class="form-group">
       <input type="text" class="form-control" value="<?php echo $f['tecnico'] ?>" name="user" id="" aria-describedby="helpId" placeholder="" hidden> 
         <div class="form-group">
           <input type="text" class="form-control" value="<?php echo $f['pass']; ?>" name="pass" id="" aria-describedby="helpId" placeholder="" hidden>
         </div>
     </div>
    </form>
    <div class="row">
        <div class="col-md">
            <button type="submit" form="modificar" class="btn primary">Cambiar Contraseña/Usuario</button>
        </div>
        <div class="col-md">
            <button type="submit" form="eliminar" class="btn primary">Eliminar Usuario</button>
        </div>
    </div>

      </body>
      </html>