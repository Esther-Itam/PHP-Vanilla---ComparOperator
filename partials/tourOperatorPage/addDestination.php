<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

$location= $_POST['location'];
$price= $_POST['price'];
$id_tour_operator =$_POST['id_tour_operator'];
$picture = $_POST['picture'];
$comments = $_POST['comments'];

$insertLocation = $pdo->prepare('INSERT INTO destinations(location, price, id_tour_operator, picture, comments)
                                 VALUES (?, ?, ?, ?, ?)');

$insertLocation->execute([
    $location,
    $price,
    $id_tour_operator,
    $picture,
    $comments
]);  

header('location: ../../tourOperator.php');