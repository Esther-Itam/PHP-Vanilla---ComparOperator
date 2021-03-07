<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

$location= $_POST['id_destination'];

$delete_destination = $pdo -> prepare('DELETE FROM destinations WHERE id_destination = ?');
$delete_destination -> execute([$location]);

header('location: ../../tourOperator.php');