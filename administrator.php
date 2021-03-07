<?php

session_start();

if ($_SESSION["autoriser"] != "oui") {
  header("location:./partials/administratorPage/authentification/login.php");
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

/* ********************************Tour operator feature display ******************************* */

$getTourOperators = $pdo->query('SELECT id, name, grade, link, is_premium FROM tour_operators');

$tourOperators = $getTourOperators->fetchAll();

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
          <h1 class="header col s12 light"><?php echo $bienvenue ?></h1>
          <a href="./partials/administratorPage/authentification/logout.php">
            <font color="#26a69a" size="5pt">Se déconnecter</font>
          </a>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="./assets/background_administrator.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <!-- ------------------------------------------------Collaps--------------------------------------------------- -->

  <ul class="collapsible">

    <!-- ------------------------------------------ Listing un tour opérateur ----------------------------------------->

    <li class="active">
      <div class="collapsible-header"><i class="material-icons">unfold_more</i>Listing des Tours opérateurs</div>
      <div class="collapsible-body">
        <div class="container">
          <div class="section" id="locations">
            <div class="row">
              <div class="col s12 center">
                <h4>
                  <font color="#26a69a">Listing des Tours opérateurs</font>
                </h4>
                <?php foreach ($tourOperators as $tourOperator) { ?>
                  <h5 class="header col s4 light"><i class="material-icons">star</i>
                    <font color="#FFF"> <?= $tourOperator["name"] ?></font>
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
      <div class="collapsible-header"><i class="material-icons">unfold_more</i>Listing des destinations par Tour opérateur</div>
      <div class="collapsible-body">
        <div class="container">
          <div class="section" id="locations">
            <div class="row">
              <div class="col s12 center">
                <?php include "partials/administratorPage/administratorCard.php"; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li>

      <!-- ------------------------------------------ Ajouter un tour opérateur ----------------------------------------->
      <div class="collapsible-header"><i class="material-icons">unfold_more</i>Ajouter un tour opérateur</div>
      <div class="collapsible-body">
        <div class="container">
          <div class="section" id="locations">
            <div class="row">
              <div class="col s12 center">
                <form action="./partials/administratorPage/addTourOperator.php" method="post">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?= $tourOperator["id"] ?>">

                    <div class="input-field col s6">
                      <i class="material-icons prefix">flight</i>
                      <input class="form-control" aria-describedby="emailHelp" type="text" id="tourOperator" name="tourOperator" placeholder="Tour opérateur">
                      <label for="tourOperator">Tour opérateur</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">star</i>
                      <input class="form-control" aria-describedby="emailHelp" type="number" id="grade" name="grade" placeholder="Note / 5" min="1" max="5">
                      <label for="grade">Note</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">insert_link</i>
                      <input class="form-control" aria-describedby="emailHelp" type="url" id="url" name="url" placeholder="Lien du site">
                      <label for="url">Lien du site</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">favorite</i>
                      <input class="form-control" aria-describedby="emailHelp" type="number" id="premium" name="premium" placeholder="Premium" value="0" min="0" max="1">
                      <label for="premium">Premium</label>
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

    <!-- ------------------------------------------ Modifier un tour opérateur ----------------------------------------->

    <li>
      <div class="collapsible-header"><i class="material-icons">unfold_more</i>Modifier un tour opérateur</div>
      <div class="collapsible-body">
        <div class="container">
          <div class="section" id="locations">
            <div class="row">
              <?php foreach ($tourOperators as $tourOperator) { ?>

                <form class="col s12" action="./partials/administratorPage/modifyTourOperator.php" method="post">
                  <div class="row">
                    <input type="hidden" name="id" value="<?= $tourOperator["id"] ?>">

                    <h3><?= $tourOperator["name"] ?></h3>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">flight</i>
                      <input id="tourOperator" type="text" class="validate" name="tourOperator" value="<?= $tourOperator["name"] ?>">
                      <label for="tourOperator">Tour opérateur</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">star</i>
                      <input id="grade" type="number" class="validate" name="grade" value="<?= $tourOperator["grade"] ?>" min="1" max="5">
                      <label for="grade">Note</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">insert_link</i>
                      <input id="url" type="url" class="validate" name="url" value="<?= $tourOperator["link"] ?>">
                      <label for="url">Lien du site</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">favorite</i>
                      <input id="premium" type="number" class="validate" name="premium" value="<?= $tourOperator["is_premium"] ?>" min="0" max="1">
                      <label for="premium">Premium</label>
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

    <!-- ------------------------------------------ Supprimer un tour opérateur ----------------------------------------->

    <li>
      <div class="collapsible-header"><i class="material-icons">unfold_more</i>Supprimer un tour opérateur</div>
      <div class="collapsible-body">
        <div class="container">
          <div class="section" id="locations">
            <div class="row">
              <form action="./partials/administratorPage/deleteTourOperator.php" method="post">
                <div class="input-field col s6">
                  <select name="name" id="tour-operator">
                    <option value="" disabled selected>Sélectionnez le tour opérateur à supprimer</option>
                    <?php foreach ($tourOperators as $tourOperator) { ?>
                      <option value="<?= $tourOperator["name"] ?>"><?= $tourOperator["name"] ?></option>
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