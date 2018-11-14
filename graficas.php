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
$a = "JUAN HERNANDEZ";

$query = "SELECT folio FROM reportes WHERE tecnico='".$a."'";
$statement = $db->prepare($query);
$statement->execute();
$juan = $statement->fetchAll();
$juan = sizeof($juan);
$statement->closeCursor();

$a = "KARLA LIRA";

$query = "SELECT folio FROM reportes WHERE tecnico='".$a."'";
$statement = $db->prepare($query);
$statement->execute();
$karla = $statement->fetchAll();
$karla = sizeof($karla);
$statement->closeCursor();

$a = "MYRNA ENRIQUEZ";

$query = "SELECT folio FROM reportes WHERE tecnico='".$a."'";
$statement = $db->prepare($query);
$statement->execute();
$myrna = $statement->fetchAll();
$myrna = sizeof($myrna);
$statement->closeCursor();

$a = "OMAR HERRERA";

$query = "SELECT folio FROM reportes WHERE tecnico='".$a."'";
$statement = $db->prepare($query);
$statement->execute();
$omar = $statement->fetchAll();
$omar = sizeof($omar);
$statement->closeCursor();

$a = "OTROS";

$query = "SELECT folio FROM reportes WHERE tecnico='".$a."'";
$statement = $db->prepare($query);
$statement->execute();
$otros = $statement->fetchAll();
$otros = sizeof($otros);
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
        <a href="graficas.php">GRAFICAS</a><ul></ul>
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
        <p class="lead">OFICINA DE INFORMATICA / GRAFICAS </p>
      </div>

    
  <!-- GRAFICAS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tecnico', 'Reportes'],
          ['Juan Hernandez',    <?php echo $juan ?>],
          ['Karla Lira',     <?php echo $karla ?>],
          ['Myrna Enriquez',  <?php echo $myrna ?>],
          ['Omar Herrera', <?php echo $omar ?>],
          ['Otros',    <?php echo $otros ?>]
        ]);

        var options = {
          title: 'REPORTES POR TECNICOS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
    <div id="piechart" style="width: 900px; height: 500px;"></div>


<!-- Librerias No Mover >:V -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>