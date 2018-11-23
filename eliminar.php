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

$u=$_POST['user'];
$p=$_POST['pass'];

$query="DELETE FROM tecnicos WHERE tecnico ='".$u."' AND pass ='".$p."'";
    $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
  
  header("Location:admin.php")
?>