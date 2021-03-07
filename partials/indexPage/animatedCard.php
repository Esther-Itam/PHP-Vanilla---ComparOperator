<?php include './db/db.php';

$getDestinations = $pdo->query('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id WHERE is_premium = 1');

$destinations = $getDestinations->fetchAll();

$modifyDestinations = $pdo->query('SELECT id_destination, location, price, picture, comments FROM destinations');

$modifications = $modifyDestinations->fetchAll();
?>

<?php foreach ($destinations as $destination) { ?>

    <div class="col s12 m4 l4">
        <div class="card card_animated">
            <div class="card__side card__side--front">
                <div class="card__picture card__picture">
                     <img class="img-responsive" src="<?= $destination["picture"] ?>" alt="" />
                </div>
                <h4 class="card__heading">
                    <span class="card__heading-span card__heading-span--1"><?= $destination["location"] ?></span>
                </h4>
                <div class="card__details">
                    <ul>
                        <li>
                            <font color="#ff5733"><?= $destination["name"] ?></font>
                        </li>
                        <li>Note: <font size="4pt" color="#ff5733"><?= $destination["grade"] ?> / 5</font>
                        </li>
                        <li><img src="assets/premium.png" alt="" width='110px' /></li>
                    </ul>
                </div>
            </div>
            <div class="card__side card__side--back card__side--back-1">
                <div class="card__cta">
                    <div class="card__price-box">
                        <p class="card__price-only">Seulement</p>
                        <p class="card__price-value"><?= $destination["price"] ?> &euro;</p>
                        <p><font size="5pt">/ semaine</font></p>
                    </div>
                    <form action="./destination.php" method="GET">
                        <input type="hidden" name="id" value="<?= $destination["location"] ?>">
                        <a class="btn btn--white" href="../../destination.php"><button class="btn btn--valid"><span class="glyphicon glyphicon-shopping-cart"></span>Book now</button></a>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>