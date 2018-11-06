<?php
if (isset($_POST['usuario']) && isset($_POST['password'])){
$usuario = $_POST['usuario'];
$password = $_POST['password'];
setcookie('usuario', $usuario, time()+5);
setcookie('password', $password, time()+5);
}else {
    header('Location: reportes.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_COOKIE['usuario'])): ?>
    <?php echo 'jai' ?>
    <?php else : ?>
    <?php header('Location: prueba1.php'); ?>
    <?php endif ?>
</body>
</html>