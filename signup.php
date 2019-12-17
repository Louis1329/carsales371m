<?php
require 'db.php';

$message='';

if (!empty($_POST['usr']) && !empty($_POST['pass'])) {
  $c1=$_POST['pass'];
  $c2=$_POST['conpass'];
  if ($c1==$c2) {
    $sql = "insert into usuarios (usuario,contrasenia) VALUES (:usr, :ps)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usr', $_POST['usr']);
    $stmt->bindParam(':ps', $_POST['pass']);

    if ($stmt->execute()) {
      $message = 'Usuario registrado exitosamente';
    }else {
      $message = 'Lo sentimos hubo un error';
    }
  }else {
    $message = 'Las contraseñas no coinciden';
  }


}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/strgstr.css">
  </head>
  <body>    

    <div class="rgstr">
      <?php if (!empty($message)): ?>
      <p><?= $message ?></p>
      <?php endif; ?>
          <form action="signup.php" method="post">
            <label for="usu">Nombre(s)</label>
            <input type="text" name="usr" required>
            <label for="pasa">Contraseña</label>
            <input type="password" name="pass" required>
            <label for="pasb">Confirmar Contraseña</label>
            <input type="password" name="conpass" required>
            <input type="submit" name="reg" value="Registrarse">
            <input type="reset" name="clin" value="Limpiar">
            <input type="button" name="cncl" value="Cancelar" onclick="window.location='index.php'">
            </form>
        </div>
  </body>
</html>
