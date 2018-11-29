<?php if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
  
  include_once('info.php');
  $query = "SELECT pass FROM tecnicos WHERE tecnico='".$_COOKIE['usuario']."'";
  $statement = $db->prepare($query);
  $statement->execute();
  $usuario = $statement->fetch();
  $statement->closeCursor();

  $user=$_COOKIE['usuario'];

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
    
    $name=$_POST['nombre'];
    $passs=$_POST['contra'];

    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
    if(empty($name) || empty($passs)) {
echo    "<script>";
echo     "alert('no se agrego');";
echo     "window.location.href='admin.php';";
echo     "</script>";
    }else{
        $query = "INSERT INTO tecnicos(tecnico,pass) VALUES(:tecnico, :pass)";
        $statement = $db->prepare($query); 
    
        $statement->bindValue(':tecnico', $name);
        $statement->bindValue(':pass' , $passs);
    
        $statement->execute();
        $statement->closeCursor();

        echo    "<script>";
echo     "alert('se agrego');";
echo     "window.location.href='admin.php';";
echo     "</script>";
    
        }
    ?>
</head>
<body>
    
</body>
</html>

