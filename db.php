<?php
$server = 'bgz01jwjlyrhswk4jcee-mysql.services.clever-cloud.com:3306';
$user = 'uh5i0n7vx81ptmuu';
$password = 'SSTj5s28Kroe1jDETkBq';
$database = 'bgz01jwjlyrhswk4jcee';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;",$user,$password);
} catch (PDOException $error) {
  die('Conexion fallida: '.$error->getMessage());
}
 ?>
