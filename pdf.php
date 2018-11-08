<?php if(isset($_GET['code'])) ?>
<?php 
$code = $_GET['code']; 
if($code == 2)
{
    $usuario=strtoupper($_GET['usuario']);
    include_once('info.php');
    $query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE usuario='".$usuario."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $reportes = $statement->fetchAll();
    $statement->closeCursor();

}
else if($code == 3)
{
    $tecnico=strtoupper($_GET['tecnico']);
    include_once('info.php');
    $query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE departamento='".$tecnico."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $reportes = $statement->fetchAll();
    $statement->closeCursor();
}
else if($code == 4)
{

    $departamento=strtoupper($_GET['departamento']);
    include_once('info.php');
    $query = "SELECT folio, estado, fecha, detalles, asunto, usuario, departamento, tecnico, e1, e2, e3, e4 FROM reportes WHERE departamento='".$departamento."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $reportes = $statement->fetchAll();
    $statement->closeCursor();

}

?>