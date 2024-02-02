<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialiser un tableau pour stocker les valeurs cochées
    $valeursCochees = [];

    // Parcourir les données POST
    foreach ($_POST as $key => $value) {
        // Vérifier si la clé commence par "question" et si la valeur est égale à "1" (cochée)
        if (strpos($key, 'question') === 0 && $value == '1') {
            // Récupérer l'ID de la question
            $idQuestion = substr($key, 8);

            // Ajouter l'ID de la question au tableau
            $valeursCochees[] = $idQuestion;
        }
    }

    // Maintenant, $valeursCochees contient les ID des questions cochées
    var_dump($valeursCochees);
}


foreach ($_POST as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $val) {
            echo ' ' . $key . ' ' . $val . ' ';
        }
    } else {
        echo ' ' . $key . ' ' . $value . ' ';
        echo '<br>';
    }
}
