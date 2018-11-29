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

$pass=$_POST['pass'];
$user=$_POST['user'];
$pass1=$_POST['pass1'];
$user1=$_POST['user1'];

$query = "UPDATE tecnicos
    SET pass= :pass, tecnico = :user WHERE tecnico LIKE :user1 AND pass LIKE :pass1"; 
    $statement = $db->prepare($query); 
    $statement -> bindValue(":user", $user);
    $statement -> bindValue(":user1", $user1);
    $statement -> bindValue(":pass", $pass);
    $statement -> bindValue(":pass1", $pass1);
    $statement->execute();
    $statement->closeCursor();
    header("Location:admin.php")
?>