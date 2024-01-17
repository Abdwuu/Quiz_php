<?php
session_start(); // N'oubliez pas de démarrer la session
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
    <h1>BIENVENUE <span> <?php echo htmlspecialchars($_SESSION["user_id"], ENT_QUOTES, 'UTF-8'); ?></span></h1>
</section>
<div class="container">
    <h1>Choisissez un Quizz</h1>

    <form action="question.php" method="post">
        
        <label for="quiz">Sélectionnez un quizz :</label>
        <select id="quiz" name="quiz">
            <option value="quiz1">Choisissez une proposition</option>
            <!-- Ajoutez d'autres options pour différents quizz -->
            <?php
            foreach ($lesQuizz as $question) {
                echo $question->render();
            }
            ?>
        </select>

        <button type="submit">Commencer le Quizz</button>
    </form>
</div>
<div class="button-container container">
    <a href="creer_quiz.php" class="button">Créer un Quiz</a>
    <a href="modifier_quiz.php" class="button">Modifier un Quiz</a>
</div>
</body>
</html>
