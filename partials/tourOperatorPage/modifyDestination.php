<?php

/* ******************************************Modify destinations processing ****************************** */

$pdo = new PDO(
  'mysql:host=localhost;dbname=comparoperator;charset=utf8',
  'root',
  '',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$id_destination = $_POST['id_destination'];
$location = $_POST['location'];
$price = $_POST['price'];
$picture = $_POST['picture'];
$comments = $_POST['comments'];

$modify_destination = $pdo->prepare("UPDATE destinations 
                                     SET location = ?, price = ?, picture = ?, comments = ? 
                                     WHERE id_destination = ?");

$modify_destination->execute([
  $location,
  $price,
  $picture,
  $comments,
  $id_destination


]);

header('location: ../../tourOperator.php');
