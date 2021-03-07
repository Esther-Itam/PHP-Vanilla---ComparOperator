<?php include './db/db.php';

//Afficher les caractéristiques des tours opérateurs
$getTourOperators = $pdo->query('SELECT id, name, grade, link, is_premium FROM tour_operators');

$tourOperators = $getTourOperators->fetchAll();

$getDestinations = $pdo->query('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id ORDER BY tour_operators.name');

$destinations = $getDestinations->fetchAll();
?>


<?php foreach ($destinations as $destination) { ?>

<div class="col s12 m3 l3">
  <div class="card">
    <div class="card-image">
      <img src="<?= $destination["picture"] ?>">
      <h1 class="card-title administratorCard">
        <font color="#FFF"><?= $destination["location"] ?></font>
      </h1>
    </div>
    <div class="card-content">
      <span class="card-title"><?= $destination["name"] ?></span>
      <span class="itemPrice">
        <font color="#ff5733" size="5pt"><?= $destination["price"] ?></font>
        <font color="#000" size="4pt"> &euro;</font>
      </span>
      <p>
        <font color="#000" size="4pt">Note: </font>
        <font color="#26a69a" size="4pt"><?= $destination["grade"] ?></font>
        <font size="4pt"> / 5</font>
      </p>
      <p>
        <font color="#000" size="4pt">Premium: <?= $destination["is_premium"] ?></font>
      </p>
    </div>
    <div class="card-action">
      <a href="<?= $destination["link"] ?>"><button class="administratorLink">
          <font size="3pt">Lien vers le site</font>
        </button></a>
    </div>
  </div>
  
</div>
<?php } ?> 