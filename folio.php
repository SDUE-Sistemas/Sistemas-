<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
  
  include_once('info.php');
  $query = "SELECT pass FROM tecnicos WHERE tecnico='".$_COOKIE['usuario']."'";
  $statement = $db->prepare($query);
  $statement->execute();
  $usuario = $statement->fetch();
  $statement->closeCursor();
  if($_COOKIE['usuario'] == "KARLA"){
    $user='KARLA LIRA';
  }elseif($_COOKIE['usuario'] == "JUAN"){
    $user='JUAN HERNANDEZ';
  }elseif($_COOKIE['usuario'] == "MYRNA"){
   $user='MYRNA ENRIQUEZ';
  }elseif($_COOKIE['usuario'] == "OMAR"){
   $user='OMAR HERRERA';
  }elseif($_COOKIE['usuario'] == "OTROS"){
   $user='OTROS';
  }
  
  $query = "SELECT folio FROM reportes WHERE tecnico='".$user."' AND estado = 0";
  $statement = $db->prepare($query);
  $statement->execute();
  $nr = $statement->fetchAll();
  $statement->closeCursor();
  $n = sizeof($nr);
  }
else{
  header('Location: reportes.php');
}
if(!($usuario['pass']==$_COOKIE['password'])){
  header('Location: reportes.php');
}
?>

<?php
    include_once('info.php');
    $query = "SELECT folio FROM reportes WHERE folio = (SELECT max(folio) FROM reportes)";
    $statement = $db->prepare($query);
    $statement->execute();
    $x = $statement->fetch();
    $statement->closeCursor();

$query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE folio=$x[folio]";
$statement = $db->prepare($query);
$statement->execute();
$reporte = $statement->fetch();
$statement->closeCursor();

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
    background-color:white;
    }

	ul, ol {
				list-style:none;
			}
			
			.nav li a {
				display:block;
        background-color:darkgrey;
			}
			
			
			.nav li ul {
				display:none;
				position:absolute;

			}
			
			.nav li:hover > ul {
				display:block;
      
			}

    
    </style>
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
    </div>

  <div class="jumbotron" style="text-align:center">
    <!-- imagen del lado derecho -->
    <img src="img/Logo Chihuahua.png" alt="" style="height:150px; width:150px" align="right">
    <!-- Nombres -->
        <h1 class="display-6">SECRETARÍA DE DESARROLLO URBANO Y ECOLOGÍA</h1>
        <p class="lead">OFICINA DE INFORMATICA / BUSCAR </p>
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
        <form action="generarpdf.php" method="post">
          <input type="text" value="<?php echo $reporte['folio']; ?>" name="folio" hidden>
          <button type="submit" class="btn btn-secondary" style="width: 600px; height: 120px;">PDF</button>
          </form>
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
      </div>
    </div>
    </form>
        <form action="reportes.php" method="post">  
        <button type="submit" class="btn btn-secondary" style="width: 100%; height: 210px;">OK</button>

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
