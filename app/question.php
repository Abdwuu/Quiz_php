<?php

require_once 'const.php';


$lequiz = $QUIZBD->get_quiz($_POST['quiz']);
$lequiz->setLesQuestions(  $QUESTIONBD->get_question($lequiz->getIdQuiz()) )
?>

<!DOCTYPE html>
<html lang="fr">
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
    <h2>Description : <?php echo $lequiz->getDescription() ?></h2>

    <form action="Resultat.php" method="POST">


    <input type="hidden" name="quiz" value="<?php echo $lequiz->getIdQuiz(); ?>">

        <?php

        $les_questions = $lequiz->getLesQuestions();
        foreach ($les_questions as $question) {
            echo $question->render();
        }
        if($lequiz->getIdQuiz() == -1){
            echo "<a class='retour' href='Acceuil.php'>Retour</a>";
        }else{
            echo "<button type='submit'>Valider</button>";
        }

        ?>
    <h2 id="timer">Temps restant : 00:00</h2>
    </form>
    <button onclick='afficherResultats()'>jes suis la</button>
</div>
<script>
var timeLeft = <?php echo $lequiz->getTempsLimite(); ?> * 60;
var timerElement = document.getElementById('timer');

function updateTimer() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;
    timerElement.textContent = 'Temps restant : ' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

    timeLeft--;
    if (timeLeft < 0) {
        document.querySelector('form').submit();
    }
}

function afficherResultats() {
    var resultatsListe = document.createElement('ul');

    // Parcourir toutes les questions
    document.querySelectorAll('.question').forEach(function(question) {
        var questionText = question.querySelector('h2').textContent;
        var reponsesSelectionnees = [];

        // Parcourir toutes les options de la question
        question.querySelectorAll('input:checked').forEach(function(reponse) {
            reponsesSelectionnees.push(reponse.parentNode.textContent.trim());
        });

        // Ajouter la question et les réponses sélectionnées à la liste
        var resultatItem = document.createElement('li');
        resultatItem.textContent = `${questionText}: ${reponsesSelectionnees.join(', ')}`;
        resultatsListe.appendChild(resultatItem);
    });

    // Afficher la liste des résultats
    document.body.appendChild(resultatsListe);
}

setInterval(updateTimer, 1000);
</script>
</body>
</html>
