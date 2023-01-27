<?php
 
session_start();
if ($_SESSION["connecter"] != "yes") {
header("location:login.php");
exit();
}
if (date("H") < 18)
$bienvenue = "Bonjour et bienvenue "  .
$_SESSION["prenom_nom"];
else
$bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["prenom_nom"];
?>

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="session.css">
    <title>Document</title>
</head>
    <body  onLoad="document.fo.login.focus()">
    <h2><?php  echo  $bienvenue  ?></h2>
    <a  href="deconnexion.php">Se déconnecter</a>

    </body>
</html>