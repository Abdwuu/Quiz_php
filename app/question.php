<?php

require 'BD/php/quizz.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="/CSS/accueil.css">
    <title>Quizz sur les Dessins Animés</title>

</head>
<body>

<div class="container">
    <h1>Quizz sur les Dessins Animés</h1>

    <form action="process_quiz.php" method="get">



        <?php

        foreach ($_POST as $key => $value) {
            echo $key . ' : ' . $value . '<br>';

        }

        $les_questions = get_question_quizz($_POST['quiz']);
        foreach ($les_questions as $question) {

        }

        ?>

        <button type="submit">Soumettre</button>
    </form>
</div>

</body>
</html>
