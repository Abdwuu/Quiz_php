<?php

require 'index.php';

$lequiz = $QuizBD->get_quiz($_GET['idQuiz']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="vue/CSS/accueil.css">
    <?php
    echo "<title>Quizz : {$lequiz->getTitre()}</title>";
    ?>

</head>
<body>

<div class="container">
    <h1>Quizz : <?php echo $lequiz->getTitre() ?></h1>

    <form action="Resultat.php" method="POST">


    <input type="hidden" name="quiz" value="<?php echo $lequiz->getIdQuiz(); ?>">

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
