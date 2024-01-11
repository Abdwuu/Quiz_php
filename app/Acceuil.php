<?php

require '../BD/php/quizz.php';
$questions = get_questions();

$list_questions = [];

foreach ($questions as $question) {
    $list_questions[] = new Option($question['question']);
}

$select = new Select('question', 'Choisissez une question', $list_questions);

// creation du formulaire
$form = new Form();
foreach ($questions as $question) {
    $form->addSelect(new Select("1", $question['question'], $list_questions));
}


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

    <?php
    echo $form->render();
    ?>
    


</div>

</body>
</html>
