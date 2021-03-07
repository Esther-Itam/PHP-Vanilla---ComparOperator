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

      $sel = $pdo->prepare("select id from administrator where username=? limit 1");
      $sel->execute(array($username));
      $tab = $sel->fetchAll();
      if (count($tab) > 0)
         $erreur = "L'utilisateur existe déjà!";
      else {
         $ins = $pdo->prepare("insert into administrator(username,password) values(?,?)");
         if ($ins->execute(array($username, md5($password))))
            header("location:login.php");
      }
   }
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />

</head>

<body>
   <h1>Inscription</h1>
   <div class="erreur"><?php echo $erreur ?></div>
   <form name="fo" method="post" action="">
      <input type="text" name="username" placeholder="Utilisateur" value="<?php echo $login ?>" /><br />
      <input type="password" name="password" placeholder="Mot de passe" /><br />
      <input type="password" name="repassword" placeholder="Confirmer Mot de passe" /><br />
      <input type="submit" name="valider" value="S'authentifier" />
   </form>
</body>

</html>