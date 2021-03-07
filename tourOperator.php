<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
	header("location:./partials/tourOperatorPage/authentification/login.php");
	exit();
}
if (date("H") < 18)
	$bienvenue = "Bonjour et bienvenue " .
		$_SESSION["username"] .
		" dans votre espace personnel";
else
	$bienvenue = "Bonsoir et bienvenue " .
		$_SESSION["username"] .
		" dans votre espace personnel";

include './db/db.php';

$getDestinations = $pdo->query("SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
								ON destinations.id_tour_operator = tour_operators.id
								WHERE tour_operators.name = '" . $_SESSION['username'] . "'");

$destinations = $getDestinations->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Interface administrateur</title>
	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>

<body>


	<!-- ------------------------------------------------Navbar--------------------------------------------------- -->

	<?php include "partials/navbar.php" ?>

	<!-- ------------------------------------------------Parallax --------------------------------------------------- -->

	<div class="parallax-container valign-wrapper">
		<div class="section no-pad-bot">
			<div class="container">
				<div class="row center">
					<h2><?php echo $bienvenue ?></h2>
					<a href="./partials/tourOperatorPage/authentification/logout.php">
						<font color="#26a69a" size="5pt">Se déconnecter</font>
					</a>
				</div>
			</div>
		</div>
		<div class="parallax"><img src="./assets/background_tourOperator.jpg" alt="Unsplashed background img 2" width="750px"></div>
	</div>

	<!-- ------------------------------------------------Collaps--------------------------------------------------- -->

	<ul class="collapsible">

		<!-- ------------------------------------------ Listing un tour opérateur ----------------------------------------->

		<li class="active">
			<div class="collapsible-header"><i class="material-icons">unfold_more</i>Listing des destinations</div>
			<div class="collapsible-body">
				<div class="container">
					<div class="section" id="locations">
						<div class="row">
							<div class="col s12 center">
								<h4>
									<font color="#26a69a">Listing des destinations</font>
								</h4>
								<?php foreach ($destinations as $destination) { ?>
									<h5 class="header col s4 light"><i class="material-icons">star</i>
										<font color="#FFF"> <?= $destination["location"] ?></font>
									</h5>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li>

			<!-- ------------------------------------------ Destinations par tours opérateurs ----------------------------------------->

		<li>
			<div class="collapsible-header"><i class="material-icons">unfold_more</i>Listing des prestations par destinations</div>
			<div class="collapsible-body">
				<div class="container">
					<div class="section" id="locations">
						<div class="row">
							<div class="col s12 center">
								<?php include "partials/tourOperatorPage/tourOperatorCard.php"; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li>

			<!-- ------------------------------------------ Ajouter une destination ----------------------------------------->
			<div class="collapsible-header"><i class="material-icons">unfold_more</i>Ajouter une destination</div>
			<div class="collapsible-body">
				<div class="container">
					<div class="section" id="locations">
						<div class="row">
							<div class="col s12 center">

								<form action="./partials/tourOperatorPage/addDestination.php" method="POST">
									<div class="form-group">
										<?php foreach ($destinations as $destination) { ?>
											<input type="hidden" name="id_tour_operator" value="<?= $destination["id_tour_operator"] ?>">
										<?php } ?>
										<div class="input-field col s12">
											<i class="material-icons prefix">flight</i>
											<input class="form-control" aria-describedby="emailHelp" type="text" id="location" name="location" placeholder="Destination">
											<label for="location">Destination</label>
										</div>

										<div class="input-field col s12">
											<i class="material-icons prefix">euro_symbol</i>
											<input class="form-control" aria-describedby="emailHelp" type="number" id="price" name="price" placeholder="Prix">
											<label for="price">Prix</label>
										</div>

										<div class="input-field col s12">
											<i class="material-icons prefix">format_align_center</i>
											<textarea id="comments" name="comments" class="materialize-textarea" data-length="100"></textarea>
											<label for="comments">Description de la destination</label>
										</div>

										<div class="file-field input-field col s12">
											<i class="material-icons prefix">insert_link</i>
											<input id="url" type="url" class="validate" name="picture">
											<label for="url">Lien de la photo</label>
										</div>

										<button class="btn btn-info center" class="favorite styled" type="submit">Ajouter</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>

		<!-- ------------------------------------------ Modifier une destination ----------------------------------------->

		<li>
			<div class="collapsible-header"><i class="material-icons">unfold_more</i>Modifier une destination</div>
			<div class="collapsible-body">
				<div class="container">
					<div class="section" id="locations">
						<div class="row">

							<?php foreach ($destinations as $destination) { ?>
								<form class="col s12" action="./partials/tourOperatorPage/modifyDestination.php" method="POST">
									<div class="row">
										<input type="hidden" name="id_destination" value="<?= $destination["id_destination"] ?>">

										<h3><?= $destination["location"] ?></h3>
										<div class="input-field col s12">
											<i class="material-icons prefix">flight</i>
											<input type="text" class="validate" id="location" name="location" value="<?= $destination["location"] ?>">
											<label for="location">Destination</label>
										</div>

										<div class="input-field col s12">
											<i class="material-icons prefix">euro_symbol</i>
											<input type="number" class="validate" id="price" name="price" value="<?= $destination["price"] ?>">
											<label for="price">Prix</label>
										</div>

										<div class="input-field col s12">
											<i class="material-icons prefix">format_align_center</i>
											<textarea id="comments" name="comments" class="materialize-textarea" data-length="100"><?= $destination["comments"] ?></textarea>
											<label for="comments">Description de la destination</label>
										</div>

										<div class="input-field col s12">
											<i class="material-icons prefix">insert_link</i>
											<input id="url" type="url" class="validate" name="picture" value="<?= $destination["picture"] ?>">
											<label for="url">Lien de la photo</label>
										</div>

										<button class="btn btn-info" class="favorite styled" type="submit">Modifier</button>
									</div>
								
								</form>
								<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</li>

		<!-- ------------------------------------------ Supprimer une destination ----------------------------------------->

		<li>
			<div class="collapsible-header"><i class="material-icons">unfold_more</i>Supprimer une destination</div>
			<div class="collapsible-body">
				<div class="container">
					<div class="section" id="locations">
						<div class="row">
							<form action="./partials/tourOperatorPage/deleteDestination.php" method="post">
								<div class="input-field col s6">
									<select name="id_destination" id="location">
										<option value="" disabled selected>Sélectionnez la destination à supprimer</option>
										<?php foreach ($destinations as $destination) { ?>
											<option value="<?= $destination["id_destination"] ?>"><?= $destination["location"] ?></option>
										<?php } ?>
									</select>
									<button class="btn btn-info" class="favorite styled" type="submit">Supprimer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>

	<!-- ------------------------------------------------Footer--------------------------------------------------- -->

	<?php include "partials/footer.php" ?>

</body>


<!----------------------------------------------- Scripts------------------------------------------------------->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>


</html>