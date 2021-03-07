<!------------------------------------------ toList Partial ----------------------------------------->
<?php include './db/db.php';

$getDestinations = $pdo->query('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id');

$destinations = $getDestinations->fetchAll();



?>
<?php foreach ($destinations as $destination) { ?>


    <div class="col s12 m3 l3"  >
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?= $destination["picture"] ?>">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">
                    <font color="#ff5733" size="6pt"><?= $destination["location"] ?><i class="material-icons right">more_vert</i></font>
                </span>
                <p>Prix: <font color="#ff5733" size="5.5pt"><?= $destination["price"] ?></font> &euro;</p>
                <p>Note: <font color="#ff5733" size="4pt"><?= $destination["grade"] ?> / 5</font></p>
                <p><font color="#ff5733" size="5.5pt"><?= $destination["name"] ?></font></p>
                <form action="./destination.php" method="GET">
                    <input type="hidden" name="id" value="<?= $destination["location"] ?>">
                    <p><button class="btn" href="../../destination.php">Voir l'offre</button></p>
                </form>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Description de la destination<i class="material-icons right">close</i></span>
            <p><?= $destination["comments"] ?></p>
        </div>
        </div>
    </div>
<?php } ?>