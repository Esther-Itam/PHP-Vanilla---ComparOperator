<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

$name= $_POST['name'];

$delete_tourOperator = $pdo -> prepare('DELETE FROM tour_operators WHERE name = ?');
$delete_tourOperator -> execute([$name]);

header('location: ../../administrator.php'); 