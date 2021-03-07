<?php 

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

$name = $_POST['tourOperator'];
$grade = $_POST['grade'];
$link = $_POST['url'];
$is_premium = $_POST['premium'];

$insert_tourOperator =$pdo->prepare('INSERT INTO tour_operators(name, grade, link, is_premium)
                                     VALUES (?, ?, ?, ?)');

$insert_tourOperator-> execute ([
    $name,
    $grade,
    $link,
    $is_premium
]);

header('location: ../../administrator.php'); 