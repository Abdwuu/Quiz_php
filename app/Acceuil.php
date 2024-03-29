<?php

require_once 'const.php';

session_start();

$lesQuizz = $QUIZBD->get_all_quiz();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/CSS/accueil.css">
    <title>Choix du Quizz</title>   
</head>
<body>
<section>
    <h1>BIENVENUE <span> <?php if (isset($_SESSION["user_id"])) {echo htmlspecialchars($_SESSION["user_id"], ENT_QUOTES, 'UTF-8');} ?></span></h1>
</section>
<div class="container">
    <h1>Choisissez un Quizz</h1>

    <form action="question.php" method="post">
        
        <label for="quiz">Sélectionnez un quizz :</label>
        <select id="quiz" name="quiz">
            <option value="quiz1">Choisissez une proposition</option>
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
    <a onclick="afficher()" class="button">Modifier un Quiz</a>
</div>

<?php
    if (isset($_GET['erreur'])) {
        if ($_GET['erreur'] == '2') {
            echo "<p class='erreur' style='color:red'  >Le quiz n'existe pas.</p>";
        }
    }
?>

<form id="formQuiz" action="modifier_quiz.php" method="POST" class="button-container container" style="display:none">
    <input type="text" name="nomQuiz" id="nomQuiz">
    <button type="submit">Modifier un Quiz</button>
</form>


<script>
    function afficher(){
        document.getElementById("formQuiz").style.display = "block";
    }
</script>

</body>
</html>
