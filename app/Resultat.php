<?php

require_once 'const.php';

session_start();

$points_gagner = 0;
$nbre_question = 0;
$dico = array();

$reponsesUtilisateur = array();

foreach ($_POST as $key => $value) {
    echo ' '.$key.' '.$value.' ';
    echo '<br>';

    // Vérifie si la clé commence par "question" (pour les questions à choix unique)
    if (strpos($key, 'question') === 0 && !is_array($value)) {
        // Récupère l'id de la question
        $idQuestion = substr($key, 8);
        echo $idQuestion . 'la question';
        // sauter une ligne 
        echo '<br>';
        // Stocke l'id de la réponse choisie dans le tableau
        $reponsesUtilisateur[$idQuestion] = $value;
    }

    // Vérifie si la clé est une question à choix multiple
    if (strpos($key, 'question') === 0 && is_array($value)) {
        // Récupère l'id de la question
        $idQuestion = substr($key, 8);
        // echo $idQuestion . ' la question';
        // echo '<br>';

        // Stocke les ids des réponses choisies dans le tableau
        // echo 'intVal' . intval($idQuestion) . '<br>';
        $reponsesUtilisateur[$idQuestion][] = $value;
        // foreach ($value as $key2 => $value2) {
        //     echo $key2 .' '.$value2. 'test';
        // }

    }
    $nbre_question++;
}

// echo '<br>';
// echo 'Voici le tableau des réponses de l\'utilisateur';
// echo '<br>';
// foreach ($reponsesUtilisateur as $key => $value) {
//     if (is_array($value)) {
//         foreach ($value as $key2 => $value2) {
//             echo $key2 .' '.$value2. ' im here';
//             echo '<br>';

//         }
//     }else{
//         echo $key .' '.$value. ' test';
//         echo '<br>';

//     }
// }

$liste = QUIZBD->calculerScoreEtFeedback($reponsesUtilisateur);


$points_gagner = $liste['scoreTotal'];
$feedback = $liste['feedback'];

// foreach ($feedback as $key => $value) {
//     echo $key . ' ' . $value . 'test';
// }

// Affiche le tableau des réponses de l'utilisateur



$meilleur_score = QUIZBD->getBestScores($_POST['quiz']);
if ($points_gagner > $meilleur_score){
     QUIZBD->addBestScore($_POST['quiz'], $points_gagner, $_SESSION['user_id']);
}


echo "<h1>Vous avez gagné $points_gagner points</h1>";


// if ($meilleur_score == $points_gagner){
//     echo "<h1>Vous avez le meilleur score</h1>";
// }



?>


<!DOCTYPE html>
<html lang="fr">
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

    echo "<div class='points'>Points : <span style='color: #dc3545;'>$points_gagner</span></div>";
    echo "<div class='emoji'>" . getEmoji($points_gagner,$nbre_question) . "</div>";
    echo "<div class='meilleur_score'>Meilleur score : <span style='color: #dc3545;'>$meilleur_score</span></div>";
    echo "<a class='retour' href='Acceuil.php'>Retour</a>";
    
    
    

// Affiche le feedback pour chaque question
foreach ($feedback as $nomQuestion => $feedbackQuestion) {
    echo "<div class='question'>";
    echo "<h2>{$feedbackQuestion['nomQuestion']}</h2>";
    echo "<div class='reponses'>";
    echo "<div class='reponsesUtilisateur'>";
    echo "<h3>Vos réponses :</h3>";
    
    if (is_array($feedbackQuestion['reponsesUtilisateur'])) {
        foreach ($feedbackQuestion['reponsesUtilisateur'] as $reponse => $value) {
            echo "<div class='reponse'>$value</div>";
        }
    } else {
        echo "<div class='reponse'>{$feedbackQuestion['reponsesUtilisateur']}</div>";
    }

    echo "</div>";



    // Affiche si la réponse est correcte ou non
    $feedbackText = $feedbackQuestion['correct'] ? "Correcte" : "Incorrecte";
    echo "<div class='feedbackText'>";
    echo "<h3>Réponse : $feedbackText</h3>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
}
echo "</div>";

        
    ?>




</div>

</body>
</html>