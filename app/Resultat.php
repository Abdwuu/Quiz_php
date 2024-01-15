<?php

$points_gagner = 0;
$nbre_question = 0;

foreach ($_POST as $key => $value) {
    echo $key . " => " . $value . "<br>";
}

echo "<h1>Vous avez gagné $points_gagner points</h1>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="/CSS/page_reponse.css">
    <title>Résultats des Points</title>
</head>
<body>
<div class="container">
    <h1>Résultats des Points</h1>

    <?php
    // Supposez que vous avez la variable $points définie dans votre code PHP

    // Fonction pour obtenir l'emoji en fonction des points
    function getEmoji($points, $nbre_question) {

        $les_emojie = array("😭", "😕", "😐", "🙂", "😀", "😍");
        $pourcentageReussite = ($points / $nbre_question) * 100;


        if ($pourcentageReussite < 20) {
            return $les_emojie[0];
        } else if ($pourcentageReussite < 40) {
            return $les_emojie[1];
        } else if ($pourcentageReussite < 60) {
            return $les_emojie[2];
        } else if ($pourcentageReussite < 80) {
            return $les_emojie[3];
        } else if ($pourcentageReussite < 97) {
            return $les_emojie[4];
        } else {
            return $les_emojie[5];
        }
    
    }

    // Affichage des points et de l'emoji
    echo "<div class='points'>Points: <span style='color: #dc3545;'>$points_gagner</span></div>";
    echo "<div class='emoji'>" . getEmoji($points_gagner,$nbre_question) . "</div>";
    ?>

</div>

</body>
</html>