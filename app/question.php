<?php

require 'BD/php/quizz.php';

$lequiz = Quiz::get_Quiz(intval($_POST['quiz']));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="/CSS/accueil.css">
    <?php
    echo "<title>Quizz : {$lequiz->getTitre()}</title>";
    ?>

</head>
<body>

<div class="container">
    <h1>Quizz : <?php echo $lequiz->getTitre() ?></h1>

    <form action="process_quiz.php" method="get">



        <?php

        $les_questions = $lequiz->getLesQuestions();
        foreach ($les_questions as $question) {
            echo $question->render();
        }

        // si le quiz n'est pas trouver on affiche un message d'erreur
        if($lequiz->getIdQuiz() == -1){
            echo "<a class='retour' href='Acceuil.php'>Retour</a>";
        }else{
            echo "<button type='submit'>Valider</button>";
        }

        ?>

        
    </form>
</div>

</body>
</html>
