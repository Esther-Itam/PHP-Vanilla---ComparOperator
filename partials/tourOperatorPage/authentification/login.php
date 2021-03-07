<?php
session_start();

include '../../../db/db.php';

/* **************************************Select button *********************************** */

$allUsername = $pdo->query('SELECT username FROM users');
$selectButtons = $allUsername->fetchAll();

/* **************************************Authentification********************************** */

@$username = $_POST["username"];
@$password = md5($_POST["password"]);
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {

   $pdo = new PDO(
      'mysql:host=localhost;dbname=comparoperator;charset=utf8',
      'root',
      '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   $sel = $pdo->prepare("SELECT * from users where username=? and password=? limit 1");
   $sel->execute(array($username, $password));
   $tab = $sel->fetchAll();
   if (count($tab) > 0) {
      $_SESSION["username"] = ucfirst($tab[0]["username"]);
      $_SESSION["autoriser"] = "oui";
      header("location:../../../tourOperator.php");
   } else
      $erreur = "Mauvais login ou mot de passe!";
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Interface tour opérateur</title>

   <!-- CSS  -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="../../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
   <link href="../../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>

<body onLoad="document.fo.login.focus()">

   <!-- ------------------------------------------------Navbar--------------------------------------------------- -->

   <nav class="white" role="navigation">
      <div class="nav-wrapper container">
         <a id="logo-container" href="../../../index.php" class="brand-logo"><img class="logo" src="../../../assets/logo.png" alt="logo" width="100"></a>
         <ul class="right hide-on-med-and-down">
            <li><a href="../../../index.php">Accueil</a></li>
            <li><a href="../../administratorPage/authentification/login.php">Administrateur</a></li>
            <li><a href="">Tour Opérateur</a></li>
         </ul>

         <ul id="nav-mobile" class="sidenav">
            <li><a href="../../../index.php">Accueil</a></li>
            <li><a href="../../administratorPage/authentification/login.php">Administrateur</a></li>
            <li><a href="">Tour Opérateur</a></li>
         </ul>
         <a href="../../../index.php" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
   </nav>

   <!-- ------------------------------------------------Parallax --------------------------------------------------- -->

   <div class="parallax-container valign-wrapper" class="parallaxAuthentification">
      <div class="section no-pad-bot">
         <div class="container">
            <div class="row center">
               <h1 class="header col s12 light">Bienvenue, veuillez vous authentifier</h1>
            </div>
         </div>
      </div>
      <div class="parallax"><img src="../../../assets/background_authentification.jpg" alt="Unsplashed background img 2" height="850px"></div>
   </div>


   <!-- ------------------------------------------------Authentification--------------------------------------------------- -->

   <div class="authentificationForm">
      <div class="section" id="locations">
         <div class="row">
            <div class="col s1 offset-s2"></div>
            <div class="col s6 center">
               <div class="erreur"><?php echo $erreur ?></div>
               <form name="fo" method="post" action="">

                  <div class="input-field col s6">
                     <select name="username">
                        <option value="" disabled selected>Choississez votre identifiant</option>
                        <?php foreach ($selectButtons as $selectButton) { ?>
                           <option value="<?= $selectButton["username"] ?>"><?= $selectButton["username"] ?></option>
                        <?php } ?>
                     </select>

                     <label>Les tours opérateurs possédant un compte figurent dans la liste</label>
                  </div>
                  <div class="row">
                     <div class="input-field col s6">
                        <i class="material-icons prefix">
                           <font color="#26a69a">lock_open</font>
                        </i>
                        <input id="password" type="password" class="validate" name="password" placeholder="Mot de passe">
                        <label for="password">Entrer le mot de passe</label>
                     </div>
                     <p><font color="#b5b9b9">Le compte FRAM existe déjà, connectez-vous avec pour tester! (Id:FRAM Pwd:FRAM)</font></p>

                  </div>
                  <p>Vous ne possédez pas encore de compte? <a href="register.php" class="newAccount"><b><i>Créer un compte</i></b></a></p>
                  <button class="button btn-info center" class="favorite styled" name="valider" type="submit">S'authentifier</button>

               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- ------------------------------------------------Footer--------------------------------------------------- -->

   <footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">ComparOperator</h5>
        <p class="grey-text text-lighten-4">Comparateur d'agence de voyage depuis 2005.</p>
      </div>

      <div class="col l3 s12">
        <h5 class="white-text">Connect</h5>
        <ul>
          <li><a class="white-text" href="../../administratorPage/authentification/login.php"><font color="#114944"><i>Administrateur</i></font></a></li>
          <li><a class="white-text" href=""><font color="#114944"><i>Tour Opérateur</i></font></a></li>
        </ul>
      </div>

      <div class="col l3 s12">
        <h5 class="white-text">Lien GitHub du site</h5>
          <a href="https://github.com/Esther-Itam/PHP-Vanilla---ComparOperator" target="_blank" width="50px" >
          <svg  viewBox="0 0 17 16"><title>Lien GitHub du site</title><g><path  d="M8,0.2c-4.4,0-8,3.6-8,8c0,3.5,2.3,6.5,5.5,7.6 C5.9,15.9,6,15.6,6,15.4c0-0.2,0-0.7,0-1.4C3.8,14.5,3.3,13,3.3,13c-0.4-0.9-0.9-1.2-0.9-1.2c-0.7-0.5,0.1-0.5,0.1-0.5 c0.8,0.1,1.2,0.8,1.2,0.8C4.4,13.4,5.6,13,6,12.8c0.1-0.5,0.3-0.9,0.5-1.1c-1.8-0.2-3.6-0.9-3.6-4c0-0.9,0.3-1.6,0.8-2.1 c-0.1-0.2-0.4-1,0.1-2.1c0,0,0.7-0.2,2.2,0.8c0.6-0.2,1.3-0.3,2-0.3c0.7,0,1.4,0.1,2,0.3c1.5-1,2.2-0.8,2.2-0.8 c0.4,1.1,0.2,1.9,0.1,2.1c0.5,0.6,0.8,1.3,0.8,2.1c0,3.1-1.9,3.7-3.7,3.9C9.7,12,10,12.5,10,13.2c0,1.1,0,1.9,0,2.2 c0,0.2,0.1,0.5,0.6,0.4c3.2-1.1,5.5-4.1,5.5-7.6C16,3.8,12.4,0.2,8,0.2z"></path></g></svg>
        </a>
      </div>
    </div>

  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2021 Copyright - Made by <a class="brown-text text-lighten-3" href="http://esther-itam.fr/" target="_blank">Esther Itam</a>
    </div>
  </div>
</footer>


</body>

<!----------------------------------------------- Scripts------------------------------------------------------->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../../../js/materialize.js"></script>
<script src="../../../js/init.js"></script>


</html>