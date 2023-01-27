<?php 
session_start();
include("info.php");
@$valider = $_POST["inscrire"];
$erreur = "";
if (isset($valider)) {
if (empty($nom)) $erreur = "Le chanmps nom est obligatoire!";
elseif (empty($prenom)) $erreur = "Le chanmps prénom est obligatoire!";
elseif (empty($pseudo)) $erreur = "Le chanmps Pseudo est obligatoire!";
elseif (empty($password)) $erreur = "Le chanmps mot de passe est obligatoire!";
elseif ($password != $passwordConf) $erreur = "Mots de passe differents!";
else {
include("connexion.php");
$verify_pseudo = $pdo->prepare("select id from users where pseudo=? limit 1");
$verify_pseudo->execute(array($pseudo));
$user_pseudo = $verify_pseudo->fetchAll();
if (count($user_pseudo) > 0)
$erreur = "Pseudo existe déjà!";
else {
$ins = $pdo->prepare("insert into utilisateurs(nom,prenom,pseudo,password) values(?,?,?,?)");
if ($ins->execute(array($nom, $prenom, $pseudo, md5($password))))
header("location:login.php");
     }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>inscription</title>
</head>
<body>
<header>
        <nav>
            <a href="./inscription.php">inscription</a>
            <a href="login.php">login</a>
            <a href="">github</a>
            <a href="">plesk</a>
        </nav>
    </header>
<div  class="erreur"><?php  echo  $erreur  ?></div>
<form  name="fo"  method="post"  action="">
<input  type="text"  name="nom"  placeholder="Nom"  value="<?=  $nom  ?>"  /><br  />
<input  type="text"  name="prenom"  placeholder="Prénom"  value="<?=  $prenom  ?>"  /><br  />
<input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  value="<?=  $pseudo  ?>"  /><br  />
<input  type="password"  name="password"  placeholder="Mot de passe"  /><br  />
<input  type="password"  name="passconf"  placeholder="Confirmer votre Mot de passe"  /><br  />
<input  type="submit"  name="inscrire"  value="S'inscrire"  />
<a  href="login.php">Deja un compte</a>

    </form>
    
</body>
</html>