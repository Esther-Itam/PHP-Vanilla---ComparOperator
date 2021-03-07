<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Comparoperator</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>

  <?php
  include "partials/navbar.php";
  include "partials/header.php";
  ?>

  <!-- ------------------------------------------------Animated card--------------------------------------------------- -->
  <div class="container">
    <div>
      <div class="row">
        <?php include "partials/indexPage/animatedCard.php"; ?>
      </div>
    </div>
  </div>

  <!-- ------------------------------------------------Parallax 1--------------------------------------------------- -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h4 class="header col s12 light"><q><strong>Le plus beau voyage, c'est celui qu'on n’a pas encore fait</strong></q>
            <p>Citation de Loïck Peyron</p>
          </h4>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="./assets/background_2.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <!-- ------------------------------------------------locations card--------------------------------------------------- -->

  <div class="container">
    <div class="section" id="locations">
      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>
            <font color="#26a69a">Choississez votre destination</font>
          </h4>
          <?php include "partials/indexPage/locationsCard.php"; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- ------------------------------------------------Parallax 2--------------------------------------------------- -->

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h4 class="header col s12 light"><q><strong>Voyage avec deux sacs, l'un pour donner, l'autre pour recevoir</strong></q>
            <p>Citation de Johann Wolfgang von Goethe</p>
          </h4>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="./assets/background_3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <!-- ------------------------------------------------Footer--------------------------------------------------- -->

  <?php include "partials/footer.php" ?>

  <!----------------------------------------------- Scripts------------------------------------------------------->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>


</body>

</html>