<?php

session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}

require 'db.php';
$message='';
if (!empty($_POST['usr']) && !empty($_POST['pass'])) {
  $records = $conn->prepare('SELECT id,usuario,contrasenia FROM usuarios WHERE usuario = :usr');
  $records->bindParam(':usr',$_POST['usr']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if (count($results)!=0 && ($_POST['pass'] == $results['contrasenia'])) {
    $_SESSION['user_id']=$results['id'];
    header('Location: index.php');
  }else{
    $message = 'La informacion ingresada no es valida';
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/stylus.css">
  </head>
  <body>
      <?php require 'partials/header.php' ?>
      <?php if (!empty($message)): ?>
      <p><?= $message ?></p>
      <?php endif; ?>

      <div class="login-box">
        <h1>BIENVENIDO</h1>
        <form class="" action="index.php" method="post">
        <label for="busr">Usuario</label>
        <input type="text" name="usr" placeholder="Ingrese su nombre de usuario" required>
        <label for="pasa">Contraseña</label>
        <input type="password" name="pass" placeholder="Ingrese su contraseña" required>
        <input type="submit" name="sbmt" value="Iniciar Sesion">
        <a href="index.php">INICIO</a>
        </form>
      </div>

  </body>
</html>
