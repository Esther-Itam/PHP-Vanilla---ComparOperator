<?php

include './db/db.php';

$location = $_GET['id'];

$displayDestinations = $pdo->prepare('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id WHERE location = ?');
$displayDestinations->execute([$_GET['id']]);
$destinations = $displayDestinations->fetchAll();
?>


<?php foreach ($destinations as $destination) { ?>

	<div class="col s12 m7">
		<h3 class="header">
			<font color="#114944"><?= $destination["name"] ?></font>
		</h3>
		<div class="card horizontal">
			<div class="card-image">
				<img src="<?= $destination["picture"] ?>" height='250px'>
			</div>
			<div class="card-stacked" class="destination">
				<div class="card-content">
					<p>
						<font color="#000" size="4pt"><?= $destination["comments"] ?></font>
					</p>
					<p>
						<font color="#000" size="5pt">Note: </font>
						<font color="#26a69a" size="5pt"><?= $destination["grade"] ?></font>
						<font size="5pt"> / 5</font>
					</p>
					<span class="itemPrice">
						<font color="#ff5733" size="7pt"><?= $destination["price"] ?></font>
						<font color="#000" size="5pt"> &euro;</font>
					</span>
				</div>


			</div>
		</div>
	</div>

<?php } ?>
<div class="col s12 m7">
	<ul class="collapsible">
		<?php include "comment.php"; ?>
	</ul>
</div>