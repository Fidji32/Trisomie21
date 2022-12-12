<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Consulter objectif</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
testConnexion();
?>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>

    <?php faireMenu();
    if (isset($_POST['valeurJetonsIdObjectif'])) {
        $valeur = explode(".", $_POST['valeurJetonsIdObjectif']);
    }
    ?>
    <form method="POST">

        <h1><?php
            if (isset($_POST['redirect'])) {
                echo afficherUnIntituleObjectif($_POST['redirect']) . "  " . nomPrenomEnfant($_SESSION['enfant']);
            } else {
                echo afficherUnIntituleObjectif($valeur[1]) . "  " . nomPrenomEnfant($_SESSION['enfant']);
            } ?></h1>
        <?php
        if (isset($_POST['valeurJetonsIdObjectif'])) {
            UpdateJetonsPlaces($valeur[0], $valeur[1]);
        }
        if (isset($_POST['redirect'])) {
            afficherObjectifsZoom($_POST['redirect']);
        } else {
            afficherObjectifsZoom($valeur[1]);
        }
        if (isset($_POST['redirect'])) {
            afficherRecompenseSelonObjectif($_POST['redirect']);
        } else {
            afficherRecompenseSelonObjectif($valeur[1]);
        }
        ?>
    </form>
</body>

</html>