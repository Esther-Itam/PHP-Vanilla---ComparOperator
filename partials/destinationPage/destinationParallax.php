<?php
include 'db/db.php';

/* *******************************Parallax display ********************** */
$location = $_GET['id'];

$displayDestinations = $pdo->prepare('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id 
								WHERE location = ?');

$displayDestinations->execute([$_GET['id']]);

$destinations = $displayDestinations->fetchAll();

?>


<div class="parallax-container valign-wrapper">
	<div class="section no-pad-bot">
		<div class="container">
			<div class="row center">
				<h1 class="header col s12 light"><?= $_GET['id'] ?></h1>
			</div>
		</div>
	</div>
	<?php foreach ($destinations as $destination) { ?>
		<div class="parallax"><img src="<?= $destination["picture"] ?>" alt="Unsplashed background img 2" height="800px"></div>
	<?php } ?>
</div>