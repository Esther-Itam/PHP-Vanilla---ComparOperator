<?php 
include './db/db.php';
//Afficher les caractéristiques des tours opérateurs
$getTourOperators = $pdo->query('SELECT id, name, grade, link, is_premium FROM tour_operators');

$tourOperators = $getTourOperators->fetchAll();

$getDestinations = $pdo->query("SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
								                ON destinations.id_tour_operator = tour_operators.id
								                WHERE tour_operators.name = '" .$_SESSION['username']. "'");
$destinations = $getDestinations->fetchAll();
?>

<?php foreach ($destinations as $destination) { ?>

  <div class="col s12 m3 l3">
    <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="<?= $destination["picture"] ?>">
      </div>
      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><font color="#26a69a"><?= $destination["location"] ?><i class="material-icons right">more_vert</i></font></span>
        <span class="itemPrice">
          <font color="#ff5733" size="5pt"><?= $destination["price"] ?></font>
          <font color="#000" size="4pt"> &euro;</font>
        </span>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Description de la destination<i class="material-icons right">close</i></span>
        <p><?= $destination["comments"] ?></p>
      </div>
    </div>
  </div>













<?php } ?>