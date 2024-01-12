<?php

require 'BD/php/quizz.php';


$lesQuizz = Quiz::get_all_quiz();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/accueil.css">
    <title>Choix du Quizz</title>   
    
</head>
<body>
<section>
    <h1>BIENVENUE</h1>
</section>
<div class="container">
    <h1>Choisissez un Quizz</h1>

    <form action="question.php" method="post">
        <input type="text" name="nom" id="nom" placeholder="Veuillez entrer votre nom" required>
        <label for="quiz">Sélectionnez un quizz :</label>
        <select id="quiz" name="quiz">
            <option value="quiz1">Choisissez une propositions</option>
            <!-- Ajoutez d'autres options pour différents quizz -->
            <?php
            
            foreach ( $lesQuizz as $question) {
                echo $question->render();
            }

            ?>
        </select>

        <button type="submit">Commencer le Quizz</button>
    </form>




</div>

</body>
</html>
