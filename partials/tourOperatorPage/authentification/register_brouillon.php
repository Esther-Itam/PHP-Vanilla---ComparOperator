<?php

session_start();

@$username = $_POST["username"];
@$password = $_POST["password"];
@$repassword = $_POST["repassword"];
@$valider = $_POST["valider"];
$erreur = "";

if (isset($valider)) {
   if (empty($username)) $erreur = "L'utilisateur laissé vide!";
   elseif (empty($password)) $erreur = "Mot de passe laissé vide!";
   elseif ($password != $repassword) $erreur = "Mots de passe non identiques!";
   else {

      $pdo = new PDO(
         'mysql:host=localhost;dbname=comparoperator;charset=utf8',
         'root',
         '',
         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );

      $sel = $pdo->prepare("SELECT id FROM users WHERE username=? LIMIT 1");
      $sel->execute(array($username));
      $tab = $sel->fetchAll();

      if (count($tab) > 0)
         $erreur = "L'utilisateur existe déjà!";
      else {
         $ins = $pdo->prepare("INSERT INTO users(username, password) VALUES(?,?)");
         if ($ins->execute(array($username, md5($password))))
            header("location:login.php");
      }
   }
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

<body>

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
               <h1 class="header col s12 light">Bienvenue, veuillez vous enregistrer</h1>
            </div>
         </div>
      </div>
      <div class="parallax"><img src="../../../assets/background_authentification.jpg" alt="Unsplashed background img 2" height="850px"></div>
   </div>


   <!-- ------------------------------------------------Registration--------------------------------------------------- -->

   <div class="authentificationForm">
      <div class="section" id="locations">
         <div class="row">
            <div class="col s1 offset-s3"></div>
            <div class="col s4 center">
               <div class="erreur"><?php echo $erreur ?></div>
               <form name="fo" method="post" action="">
               
                  <h5>Les tours opérateurs entrés par l'administrateur et n'ayant pas de compte sont présents dans la liste</h5>
                  
                  <div class="input-field col s12">
                  <input id="password" type="password" class="validate" name="password" placeholder="Entrer le mot de passe">
                     <label>Les tours opérateurs enregistrés figurent dans la liste</label>
                  </div>
                  <div class="row">
                     <div class="input-field col s12">
                        <i class="material-icons prefix">
                           <font color="#26a69a">lock</font>
                        </i>
                        <input id="password" type="password" class="validate" name="password" placeholder="Entrer le mot de passe">
                        <label for="password">Entrer le mot de passe</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-field col s12">
                        <i class="material-icons prefix">
                           <font color="#26a69a">lock</font>
                        </i>
                        <input id="repassword" type="password" class="validate" name="repassword" placeholder="Confirmer le mot de passe">
                        <label for="repassword">Confirmer le mot de passe</label>
                     </div>
                  </div>
                  <p>
                     <font color="#26a69a">Veuillez contacter l'administrateur si vous ne figurez pas dans la liste.</font>
                  </p>
                  <button class="button btn-info center" class="favorite styled" name="valider" type="submit">Créer un compte</button>
                  <p>Déjà un compte, <a href="login.php" class="newAccount"><b><i>s'authentifier.</i></b></a></p>

               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- ------------------------------------------------Footer--------------------------------------------------- -->

   <?php include "../../footer.php" ?>


</body>

<!----------------------------------------------- Scripts------------------------------------------------------->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../../../js/materialize.js"></script>
<script src="../../../js/init.js"></script>


</html>