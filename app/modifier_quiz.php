<?php

require_once 'const.php';


// Récupération du quiz
$quiz = QUIZBD->get_quiz_by_title($_POST['nomQuiz']);

if ($quiz == null) {
    header("Location: Acceuil.php?erreur=2");
    exit();
}


// Récupération des questions du quiz
$questions = QUESTIONBD->get_question($quiz->getIdQuiz());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="vue/CSS/accueil.css">
    <title>Modifier le Quiz</title>

</head>
<body>
    <form method="POST" action="modifier.php" class="container">
        <div class="quiz-details">
            <h2><?php echo $quiz->getTitre(); ?></h2>
            <p><?php echo $quiz->getDescription(); ?></p>
        </div>

        <h3>Questions du Quiz</h3>



        <?php foreach ($questions as $question) {
            
         echo $question->getLesReponsesForModif();
            
        }

        ?>

    


    <script>
        
        function ajout(idQuestion){
            var div = document.createElement("div");
            div.innerHTML = "<label> <input type='checkbox' name='question" + idQuestion + "' > : <input type='text' name='question" + idQuestion + "'> Case Cocher = Bonne reponse </label>";
        
            document.getElementById("ajout" + idQuestion).appendChild(div);
        }
    </script>

    <input type="submit" value="Modifier" name="modifier">
    </form>
</body>
</html>