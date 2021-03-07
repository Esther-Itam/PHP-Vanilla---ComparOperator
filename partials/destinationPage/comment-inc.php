<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

        $author = $_POST['author'];
        $message = $_POST['message'];
        $id_location = $_POST['id_location'];
        $created_at = date('Y-m-d H:i:s');

$insertLocation = $pdo->prepare('INSERT INTO reviews( message, author, id_location, created_at)
                                 VALUES (?, ?, ?, ?)');


$insertLocation->execute([
    $message,
    $author, 
    $id_location,
    $created_at

]);

header('Location: ../../index.php');
