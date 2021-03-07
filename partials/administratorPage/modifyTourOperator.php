<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

$id = $_POST['id'];
$name = $_POST['tourOperator'];
$grade = $_POST['grade'];
$link = $_POST['url'];
$is_premium = $_POST['premium'];


$modify_tourOperator = $pdo -> prepare("UPDATE tour_operators 
                                        SET name = ?, grade = ?, link = ?, is_premium = ? 
                                        WHERE id = ?");
                                     
$modify_tourOperator -> execute([
    $name,
    $grade,
    $link,
    $is_premium,
    $id
]);

header('location: ../../administrator.php');


