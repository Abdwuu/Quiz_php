<?php

require_once 'index.php';

session_start();

$points_gagner = 0;
$nbre_question = 0;
$dico = array();

foreach ($_POST as $key => $value) {
    // si key comment par question alors c'est une question
    if (substr($key, 0, 8) == "question") {
        $nbre_question++;
        // on recupere la valeur de la question
        $points_gagner += intval($value);
        $dico[$key] = $value;
    }
}

$QUIZBD->addBestScore($_POST['quiz'], $points_gagner, $_SESSION['user_id']);

echo "<h1>Vous avez gagné $points_gagner points</h1>";

$meilleur_score = $QUIZBD->getBestScores($_POST['quiz']);

if ($meilleur_score == 0){
    echo "<h1>Vous avez le meilleur score</h1>";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="vue/CSS/page_reponse.css">
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
    echo "<div class='points'>Points : <span style='color: #dc3545;'>$points_gagner</span></div>";
    echo "<div class='emoji'>" . getEmoji($points_gagner,$nbre_question) . "</div>";
    echo "<div class='meilleur_score'>Meilleur score : <span style='color: #dc3545;'>$meilleur_score</span></div>";
    ?>

</div>

</body>
</html>