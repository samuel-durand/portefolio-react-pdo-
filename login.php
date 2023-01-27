<?php
 
session_start();
include("info.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
include("connexion.php");
$verify = $pdo->prepare("select * from  utilisateurs where pseudo=? and password=? limit 1");
$verify->execute(array($pseudo, $pass_crypt));
$user = $verify->fetchAll();
if (count($user) > 0) {
$_SESSION["prenom_nom"] = ucfirst(strtolower($user[0]["prenom"])) .
" "  .  strtoupper($user[0]["nom"]);
$_SESSION["connecter"] = "yes";
header("location:session.php");
} else
$erreur = "Mauvais login ou mot de passe!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body onLoad="document.fo.login.focus()">
    <header>
        <nav>
            <a href="./inscription.php">inscription</a>
            <a href="login.php">login</a>
            <a href="">github</a>
            <a href="">plesk</a>
        </nav>
    </header>
        <div  class="erreur"><?php  echo  $erreur  ?></div>
        <form  name="form"  method="post"  action="">
        <input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  /><br  />
        <input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
        <input  type="submit"  name="valider"  value="S'authentifier"  />
<a  href="inscription.php">Créer votre Compte</a>
</form>
    
</body>
</html>