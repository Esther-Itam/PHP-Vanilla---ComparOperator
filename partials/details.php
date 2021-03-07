<?php include './db/db.php';

$location = $_GET['id'];

$displayDestinations = $pdo->prepare('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id 
                                WHERE location = ?');

$displayDestinations->execute([$_GET['id']]);

$destinations = $displayDestinations->fetchAll();

?>

<?php
include "partials/navbar.php";
include "partials/header.php"
?>

<h1><?= $_GET['id'] ?></h1>